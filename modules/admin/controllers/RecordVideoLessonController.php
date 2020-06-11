<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use app\modules\UserInfo;

use app\models\VideosCategory;

use app\models\RecordVideoLesson;
use app\models\RecordVideoLessonSearch;

use app\models\UserVideoPermit;
use app\models\UserPermit;
use app\models\UserTests;

use yii\data\Pagination;

class RecordVideoLessonController extends \yii\web\Controller
{
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    
    public function actionIndex()
    {
        
        $searchModel = new RecordVideoLessonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $videosCategory = VideosCategory::find()->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'videosCategory' => $videosCategory
        ]);
    }
    
    public function actionConfirm($id)
    {
        $record = RecordVideoLesson::findOne($id);
        $name = $record->user->username;
        $videoCategory = $record->videoCategory->name;
        if ($record->confirm == 0) {
            $record->confirm = 1;
            Yii::$app->session->setFlash('success','Вы подтвердили право на участие "'.$name.'" в "'.$videoCategory.'"');
        } else if (($record->confirm == 1)&&($record->viewed == 0)){
            $record->confirm = 0;
            Yii::$app->session->setFlash('success','Вы отменили право на участие "'.$name.'" в "'.$videoCategory.'"');
        }
        $record->save();
        return $this->redirect(['index']);
    }
    
    public function actionViewed($id)
    {
        $record = RecordVideoLesson::findOne($id);
        $name = $record->user->username;
        $videoCategory = $record->videoCategory->name;
        if (($record->viewed == 0)&&($record->confirm == 1)) {
            $record->viewed = 1;
            $userVideoPermit = new UserVideoPermit();
            $userVideoPermit->user_id = $record->user->id;
            $userVideoPermit->video_cat_id = $record->videoCategory->id;
            $userVideoPermit->test_id = $record->videoCategory->test->id;
            $userVideoPermit->record_id = $record->id;
            $userVideoPermit->rating = 0;
            $userVideoPermit->save();
            // Костыль
            $userPermit = new UserPermit();
            $userPermit->user = $record->user->id;
            $userPermit->videos_category_id = $record->videoCategory->id;
            $userPermit->test = $record->videoCategory->test->id;
            $userPermit->record_id = $record->id;
            $userPermit->rating = 0;
            if (!$userPermit->save()) {
                var_dump($userPermit->getErrors());die;
            }
            Yii::$app->session->setFlash('success','Вы подтвердили, что "'.$name.'"  принял участие в "'.$videoCategory.'"');
        } else if (($record->viewed == 1)&&($record->confirm == 1)){
            $userPermit = UserPermit::find()->where(['user' => $record->user])->andWhere(['record_id' => $record->id])->one();        
            if ($userPermit) {
                $userTests = UserTests::find()->where(['permit'=>$userPermit->id])->count();
                if ($userTests == 0) {
                    $userPermit->delete();
                    $record->viewed = 0;
                    Yii::$app->session->setFlash('success','Вы отметили, что "'.$name.'" не принял участие в "'.$videoCategory.'"');
                } else {
                    Yii::$app->session->setFlash('error','Вы не можете отметить, что "'.$name.'" не принял участие в "'.$videoCategory.'", так как у пользователя в наличии сданные тесты по теме');
                }
            }
        } else if (($record->viewed == 0)&&($record->confirm == 0)) {
            Yii::$app->session->setFlash('error','Вы не можете подтвердить посещение "'.$name.'" "'.$videoCategory.'", так как не нодтвреждено право на участие в данном мероприятии');
        }
        $record->save();
        return $this->redirect(['index']);
    }
    
    public function actionDelete($id)
    {
        $record = RecordVideoLesson::findOne($id);
        $name = $record->user->username;
        $videoCategory = $record->videoCategory->name;
        if (($record->viewed == 1)||($record->confirm == 1)) {
            Yii::$app->session->setFlash('error','Вы не можете удалить заявку "'.$name.'", так как подтверждено право на участие или пользователь уже посетил "'.$videoCategory.'"');
        } else {
            $record->delete();
            Yii::$app->session->setFlash('success','Заявка "'.$name.'" на участие в "'.$videoCategory.'" была удалена');
        }
        return $this->redirect(['index']);
    }
    
    /*Проверка роли*/
    
    public function beforeAction($action)
    {
        $userRole = UserInfo::getRole();
        if ($userRole == 4) {
            return parent::beforeAction($action);
        } else {
            return $this->goHome();
        }
    }
    
   

}
