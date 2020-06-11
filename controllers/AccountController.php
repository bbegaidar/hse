<?php

namespace app\controllers;

use Yii;

use yii\db\Expression;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\web\UploadedFile;

use app\models\User;
use app\models\UserPermit;
use app\models\UserTests;
use app\models\Trainings;
use app\models\Password;
use app\models\TestQuestion;
use app\models\TestAnswer;
use app\models\Entry;
use app\models\VideosCategory;
use app\models\Videos;
use app\models\RecordVideoLesson;
use app\models\UserVideoViewed;
use app\models\UserVideoPermit;
use app\models\UploadVideo;
use app\models\Test;

use app\modules\UserInfo;

use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;

use app\services\GenerateCertificate;


error_reporting(E_ALL & ~E_NOTICE);


class AccountController extends Controller
{
    
    public $layout = '@app/views/layouts/account';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'certificate' => ['post'],
                    'entry' => ['post'],
                    'webinar' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = User::find()->where(['id' => UserInfo::getId()])->one();
        $password = new Password();
        if (Yii::$app->request->isAjax) {
            $password->load(Yii::$app->request->post());
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($password);
        }
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $password->load(Yii::$app->request->post());
            if (!empty($password->password)) {
                $model->password = Yii::$app->security->generatePasswordHash($password->password);
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success','Информация о пользователе была изменена');
            }
            
        }
        return $this->render('index',[
            'model' => $model,
            'password' => $password
        ]);
    }
    
    
    public function actionTests($id = null){
        
        if ((Yii::$app->request->isAjax)&&(Yii::$app->request->post('id'))) {
                $trx = Yii::$app->db->beginTransaction();
                
                $userTest = UserTests::findOne(['id'=>Yii::$app->request->post('id')]);
                $userPermit = UserPermit::findOne(['id' => $userTest->permit]);
                $titleCourse = Trainings::find()->where(['id' => $userPermit->training])->one()->title;
                if (!$titleCourse) {
                    $titleCourse = VideosCategory::find()->where(['id' => $userPermit->videos_category_id])->one()->name;
                }
                
                $video = new UploadVideo();
                $video->file = UploadedFile::getInstanceByName('video');
                $folder_user = User::find()->where(['id' => $userTest->permitData->user])->one();                
                $test = Test::find()->where(['id' => $userPermit->test])->one();   
                $folder_test = 'TestName:'.$test->name;
                $fileUrl = $video->fileUrl($folder_user,$folder_test);
                
                $questions = json_decode( $userTest->questions);
                $answers = json_decode( Yii::$app->request->post('answers'));
                $rightAnswers = 0;
                
                for ($i = 0; $i < count($questions); $i++) {
                    $answer = TestAnswer::find()->where(['question' => $questions[$i]])->andWhere(['id'=>$answers[$i]])->one();
                    if ($answer->result == 1) { ++$rightAnswers;}
                }
               
                $rating = round($rightAnswers/count($questions)*100,0);
                
                $userTest->video = $fileUrl;
                $userTest->answers = Yii::$app->request->post('answers');
                $userTest->rating = $rating;
                $userPermit->rating = $rating;
                
                $success = $userTest->save()&&$userPermit->save();
                
                if ($success){
                   $success = $video->uploadFile($fileUrl);
                }
                
                $message = "Вы сдали тест на тему '$titleCourse' с результатом $rating. ";
                if ($rating >= $test->passing_point) {
                    $url = Html::a('Скачать сертификат?',['account/certificate','id' => $userPermit->id],[ 'data'=>['method'=>'post']]);
                } else {
                    $url = Html::a('Хотите пересдать?',['account/tests', 'id' => $userPermit->id]);
                }
                
                if ($success){
                    $trx->commit();
                    Yii::$app->session->setFlash('success', $message.$url);
                    return true;
                } else {
                    Yii::$app->session->setFlash('error', 'Произошла ошибка при сохранении тестирования');
                    $trx->rollBack();
                    $userTest->answers = Yii::$app->request->post('answers');
                    $userTest->rating = $rating;
                    $userTest->save();
                    return false;
                }
        }
        
        if ($id == null) {                        
            $dataProvider = new ActiveDataProvider([
                'query' => UserPermit::find()->where(['user' => UserInfo::getId()]),
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);           
            return $this->render('tests',[
                'dataProvider' => $dataProvider
            ]);
        } else {
            $userPermit = UserPermit::find()->where(['user' => UserInfo::getId()])->andWhere(['id'=>$id])->one();
            $test = Test::find()->where(['id' => $userPermit->test])->one();
            if ($userPermit->rating >= $test->passing_point) { return $this->redirect(['account/tests']);} 
            
            $training = Trainings::find()->where(['id' => $userPermit->training])->one()->title;
            $video_cat = VideosCategory::find()->where(['id' => $userPermit->videos_category_id])->one()->name;
            $questions = TestQuestion::find()->where(['test' => $userPermit->test])->orderBy(new Expression('rand()'))->limit(50)->all();
           
            $questionsArray = [];
            
            foreach ($questions as $question) {
                array_push($questionsArray, $question->id);
            }
            
           
            
            $userTest = new UserTests();
            $userTest->permit = $userPermit->id;
            $userTest->questions = json_encode($questionsArray);
            $userTest->answers = '[]';
            $userTest->video = 'url-video';
            $userTest->rating = 0;
            $userTest->save();            
            
            return $this->render('test',
            [
                'training' => $training,
                'video_cat' => $video_cat,
                'userTest' => $userTest,
                'questions' => $questions
            ]);
        }
    }
    
    public function actionCertificate($id) {
        
        /*$documents = Documents::findOne($id);
        $path=Yii::getAlias('@webroot').'/'.$documents->file;
        if (file_exists($path)) {
            if (Yii::$app->response->sendFile($path)->send()) {
                Yii::$app->session->setFlash('success','Файл '.$documents->name.' ('.$documents->file.') был скачан');
            }
        } else {
           Yii::$app->session->setFlash('error','Файл '.$documents->name.' ('.$documents->file.') не найден');
        }*/        
        if (Yii::$app->request->isPost) {
            $user_permit = UserPermit::find()->where(['user' => UserInfo::getId()])->andWhere(['id' => $id])->one();
            $user_info = User::find()->andWhere(['id' => $user_permit->user])->one();
            if ($user_permit && $user_info) {
                if ($user_permit->training > 0) {
                    $title = Trainings::find()->select('title')->andWhere(['id' => $user_permit->training])->one()->title;
                }
                else if ($user_permit->videos_category_id > 0) {
                    $title = VideosCategory::find()->select('name')->andWhere(['id' => $user_permit->videos_category_id])->one()->name;
                }
                else {
                    Yii::$app->session->setFlash('error','произошла ошибка попробуйте позже');
                    return $this->redirect('tests');
                }

                if (!$title) {
                    Yii::$app->session->setFlash('error','произошла ошибка попробуйте позже');
                    return $this->redirect('tests');
                }
                $date = date('d.m.yy');
                $pdf_name = $user_info->name.'_'.$title;
                $fio = '<p style="font-size: 26px; text-align: center;">'.$user_info->name .' '.$user_info->surname.'</p>';
                $title = '<p style="width: 200px; margin: 200px auto; font-size: 26px; text-align: center;">'.$title.'</p>';
                $ball = '<p style="font-size: 26px; text-align: center;">'.$user_permit->rating.' баллов.</p>';
                $date = '<p style="font-size: 12px; text-align: center;">'.$date.' г</p>';
                $fio_lenth = strlen($user_info->name .' '.$user_info->surname);
                $title_lenth = strlen($title);                
                GenerateCertificate::generate($fio, $title, $ball, $date, $fio_lenth, $title_lenth, $pdf_name);
                return $this->redirect('tests');
            }
        }        
        Yii::$app->session->setFlash('error','произошла ошибка попробуйте позже');    
        return $this->redirect('tests');
    }
    
    public function actionOnline(){
        
        date_default_timezone_set('Asia/Almaty');
        $date = date('Y-m-d') ;
        $time = date('H:i');
        $entries = Entry::find()->select('training')->where(['user' => UserInfo::getId()])->andWhere(['confirm' => 1])->column();
        $trainings = Trainings::find()->where(['>=','startDate',$date])->andWhere(['id' => $entries])->andWhere(['category' => 1])->orderBy(['startDate' => SORT_ASC,'startTime' => SORT_ASC])->all();
        
        return $this->render('online',[
            'trainings' => $trainings,
            'entries' => $entries,
        ]);
    }
    
    public function actionWebinar($id){
        $training = Trainings::find()->where(['id' => $id])->one();
        $entry = Entry::find()->where(['user' => UserInfo::getId()])->andWhere(['training' => $id])->one();
        if ($entry->visited == 0) {
            $entry->visited = 1;
            $entry->save();
        }
        return $this->redirect($training->place, 301);
    }
    
    public function actionEvents(){
        date_default_timezone_set('Asia/Almaty');
        $date = date('Y-m-d') ;
        $time = date('H:i');
        $trainings = Trainings::find()->where(['>=','startDate',$date])->all();
        $entries = Entry::find()->select('training')->where(['user' => UserInfo::getId()])->column();
        $video_cat = VideosCategory::find()->all();
        $record_video = RecordVideoLesson::find()->select('video_category_id')->where(['user_id' => UserInfo::getId()])->column();
        return $this->render('events',[
            'trainings' => $trainings,
            'entries' => $entries,
            'video_cat' => $video_cat,
            'record_video' => $record_video
        ]);
    }
    
    public function actionEntry($id){
        
        $entry = Entry::find()->where(['user' => UserInfo::getId()])->andWhere(['training' => $id])->one();
        if ($entry) {
            Yii::$app->session->setFlash('success','Вы уже записаны на данное мероприятие');
        } else {
            $entry = new Entry();
            $entry->user = UserInfo::getId();
            $entry->training = $id;
            $entry->confirm = 0;
            $entry->visited = 0;
            $entry->save();
            Yii::$app->session->setFlash('success','Вы записались на участие в мероприятие. Наш менеджер свяжется с вами в ближайшее время');
        }
        
       
        return $this->redirect('events');
    }

    public function actionRecord($id) {
        
        $entry = RecordVideoLesson::find()->where(['user_id' => UserInfo::getId()])->andWhere(['video_category_id' => $id])->one();
        if ($entry) {
            Yii::$app->session->setFlash('success','Вы уже записаны на данное мероприятие');
        } else {
            $entry = new RecordVideoLesson();
            $entry->user_id = UserInfo::getId();
            $entry->video_category_id = $id;
            $entry->confirm = 0;
            $entry->viewed = 0;
            $entry->save();
            Yii::$app->session->setFlash('success','Вы записались на участие в мероприятие. Наш менеджер свяжется с вами в ближайшее время');
        }
        
       
        return $this->redirect('events');
    }

    public function actionVideos() {
        
        if ((Yii::$app->request->isAjax)&&(Yii::$app->request->post('id'))) {
            $trx = Yii::$app->db->beginTransaction();
            
            $userTest = UserVideoViewed::find()->where(['user_id' => UserInfo::getId()])->andWhere(['video_id'=>Yii::$app->request->post('id')])->one();            
            
            $video = new UploadVideo();
            $video->file = UploadedFile::getInstanceByName('video');            
            $folder_user = User::find()->where(['id' => UserInfo::getId()])->one();
            $folder_video = Videos::find(['id' => Yii::$app->request->post('id')])->one();
            $folder_video = 'VideoCategory:'.$folder_video->category->name.'Video:'.$folder_video->name;
            $fileUrl = $video->fileUrl($folder_user, $folder_video);            
            if ($userTest) {                
                $userTest->video_url = $fileUrl;
                $success = $userTest->save();
            }             
            else {
                $userTest = new UserVideoViewed();
                $userTest->user_id = UserInfo::getId();
                $userTest->video_id = Yii::$app->request->post('id');
                $userTest->video_url = $fileUrl;
                $success = $userTest->save();
            } 
                                              
            if ($success) {
                $success = $video->uploadFile($fileUrl);
            }
                        
            if ($success) {
                $trx->commit();
                Yii::$app->session->setFlash('success', 'Видео запись успешно записан');
                return true;
            } else {
                Yii::$app->session->setFlash('error', 'Произошла ошибка при сохранении видео');
                $trx->rollBack();
                return false;
            }
        }

        $entry = RecordVideoLesson::find()->select('video_category_id')->where(['user_id' => UserInfo::getId()])->andWhere(['confirm' => 1])->column();                
        $video_cat = VideosCategory::find()->andWhere(['id'=>$entry])->all();        
        return $this->render('videos', [
            'video_cat' => $video_cat
        ]);
    }
    
    
    /*Проверка роли*/
    
    public function beforeAction($action)
    {
        if (!Yii::$app->user->isGuest) {
            return parent::beforeAction($action);
        } else {
            return $this->goHome();
        }
    }

   
}
