<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UploadForm;
use app\models\Photogallery;
use app\models\Documents;
use app\models\Trainings;
use app\models\TrainingsCategory;
use app\models\Pages;
use app\models\Team;
use app\models\Answers;
use app\models\Reviews;
use yii\web\UploadedFile;

use app\models\User;
use app\models\RegistrationForm;

use app\models\News;
use app\models\NewsCategory;

class SiteController extends Controller
{
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
                    'logout' => ['GET'],
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
    
    // public function beforeAction($action) 
    // {  
    //     $this->layout = false;
    //     return parent::beforeAction($action);

    // }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $gallery = Photogallery::find()->where(['active' => 1])->all();
        $quality = Documents::findOne(['alias'=>'quality'])->file;
        $anticorruption = Documents::findOne(['alias'=>'anticorruption'])->file;
        $privacy = Documents::findOne(['alias'=>'privacy'])->file;
        $training = Trainings::find()->where(['>=', 'startDate', date('Y-m-d')])->orderBy(['startDate' => SORT_ASC])->one();
        $trainings = Trainings::find()->where(['>=', 'startDate', date('Y-m-d')])->orderBy(['startDate' => SORT_ASC])->limit(4)->all();
        return $this->render('index',[
            'gallery'=>$gallery,
            'quality' => $quality,
            'anticorruption' => $anticorruption,
            'privacy' => $privacy,
            'training' => $training,
            'trainings' => $trainings
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {            
            return $this->goHome();
        }

        $modelLogin = new LoginForm();
        
        if ($modelLogin->load(Yii::$app->request->post()) && $modelLogin->login()) {
            return $this->goBack();
        }
        
        $modelReg = new RegistrationForm();

        if (Yii::$app->request->isPost) {
            $modelReg->load(Yii::$app->request->post());
            $modelReg->idCard = UploadedFile::getInstance($modelReg, 'idCard');
            if ($modelReg->validate()){                
                $user = new User();
                $user->name = $modelReg->name;
                $user->surname = $modelReg->surname;
                $user->patronymic = $modelReg->patronymic;
                $user->organization = $modelReg->organization;
                $user->email = $modelReg->email;
                $user->phone = $modelReg->phone;
                $email = explode('@', $modelReg->email);
                $user->username = $email[0];
                $imgUrl = $modelReg->uploadCard();
                $user->idCard = $imgUrl;
                $user->password = Yii::$app->security->generatePasswordHash($modelReg->password);
                $user->role = 1; 
                if($user->validate()&&$user->save()){
                    return $this->goHome();
                }
            }           
        }

        $modelLogin->password = '';
        return $this->render('login', [
            'modelLogin' => $modelLogin,
            'modelReg' => $modelReg,
        ]);
    }
    
    
    /*public function actionRegistration()
    {
        if (Yii::$app->user->isGuest) {
            $model = new RegistrationForm();

            if (Yii::$app->request->isPost) {
                $model->load(Yii::$app->request->post());
                $model->idCard = UploadedFile::getInstance($model, 'idCard');
                if ($model->validate()){
                    $user = new User();
                    $user->name = $model->name;
                    $user->surname = $model->surname;
                    $user->patronymic = $model->patronymic;
                    $user->organization = $model->organization;
                    $user->email = $model->email;
                    $user->phone = $model->phone;
                    $email = explode('@', $model->email);
                    $user->username = $email[0];
                    $imgUrl = $model->uploadCard();
                    $user->idCard = $imgUrl;
                    $user->password = Yii::$app->security->generatePasswordHash($model->password);
                    $user->role = 1; 
                    if($user->validate()&&$user->save()){
                        return $this->goHome();
                    }
                }
            }

            return $this->render('registration', [
                'model' => $model,
            ]);
        }
        
        return $this->goHome();
    }*/

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    
    /**
     * Displays news page.
     *
     * @return string
     */
    public function actionNews($id = null)
    {
        $request = Yii::$app->request;
        if ($id != null){
            $content = News::find()->where(['id' => $id])->one();
            return $this->render('single_news',[
                'content' => $content
            ]);
        } else {
            $categories = NewsCategory::find()->all();
            if ($request->isGet&&$request->get('category')){
                $news = News::find()->where(['category' => $request->get('category')])->orderBy(['date' => SORT_ASC])->limit(16)->all();
            } else {
                $news = News::find()->orderBy(['date' => SORT_ASC])->limit(16)->all();
            }
            return $this->render('news',[
                'news' => $news,
                'categories' => $categories
            ]);
        }
        
    }
    

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $page = Pages::findOne(['url' => $this->action->id]);
        $team = Team::find()->all();
        $answers = Answers::find()->all();
        
        return $this->render('about',[
            'page' => $page,
            'team' => $team,
            'answers' => $answers
        ]);
    }
    
    
    public function actionOnline()
    {
        $page = Pages::findOne(['url' => $this->action->id]);
        $reviews = Reviews::find()->where(['category' => 1])->all();
        $filelist = Documents::findOne(['alias'=>'filelist'])->file;
        return $this->render('online',[
            'page' => $page,
            'reviews' => $reviews,
            'filelist' => $filelist
        ]);
    }
    
    public function actionTraining()
    {
        $page = Pages::findOne(['url' => $this->action->id]);
        $reviews = Reviews::find()->where(['category' => 2])->all();
        return $this->render('training',[
            'page' => $page,
            'reviews' => $reviews
        ]);
    }
    
    
     public function actionExpertise()
    {
        $page = Pages::findOne(['url' => $this->action->id]);
        $reviews = Reviews::find()->where(['category' => 4])->all();
        $filelist = Documents::findOne(['alias'=>'filelist2'])->file;
        $file = Documents::findOne(['alias'=>'file'])->file;
        return $this->render('expertise',[
            'page' => $page,
            'reviews' => $reviews,
            'filelist' => $filelist,
            'file' => $file
        ]);
    }
    
    
    
    public function actionFormCallback()
    {
		$request = Yii::$app->request;
	
		if($request->isPjax){
		    $name = $request->post('sender-name');
			$phone = $request->post('sender-phone');
		    $subject = 'Без темы';
            if ($request->post('type') == 1){
                $subject = 'Заявка на проведение экспертизы';
            } else if ($request->post('type') == 2) {
                $subject = 'Хочу стать партнером';
                $company = $request->post('sender-company');
            } else if ($request->post('type') == 3) {
                $subject = 'Хочу заказать услугу';
            } else if ($request->post('type') == 4) {
                $subject = 'Заявка на заключение контракта';
                $company = $request->post('sender-company');
            } else if ($request->post('type') == 5) {
                $subject = 'Заявка на';
            } else if ($request->post('type') == 6) {
                $subject = 'Запрос обратного звонка на обучение';
            } else if ($request->post('type') == 7) {
                $subject = 'Хочу получить консультацию';
            } else if ($request->post('type') == 8) {
                $subject = 'Хочу получить консультацию по промышленной безопасности';
            } else if ($request->post('type') == 9) {
                $subject = 'Заявка на обучение';
            }		
		
			$message = '<p>Пожалуйста перезвоните мне</p>';
			$message .= '<p>Меня зовут: '.$name.'</p>';
			$message .= '<p>Мой номер телефона: '.$phone.'</p>';
            $company != '' ? $message .= '<p>Название комании: '.$company.'</p>' : false;
            // mail@osvald.kz
			Yii::$app->mailer->compose()
		    	->setTo('leoscar21@mail.ru')
            	->setFrom('rahatsadykov784@gmail.com')
            	->setSubject($subject)
            	->setHtmlBody($message)
            	->send();
			return '<div class="text-center">Ваше сообщение отправлено.</br>Наш менеджер свяжется с Вами в ближайшее время.</div>';
		} else {
			return $this->goHome();
		}
    }
		
    
    
}
