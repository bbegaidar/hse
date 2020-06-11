<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use app\modules\UserInfo;

use app\models\Trainings;

use app\models\Entry;
use app\models\EntrySearch;

use app\models\UserPermit;
use app\models\UserTests;

use yii\data\Pagination;

class EntriesController extends \yii\web\Controller
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
        
        $searchModel = new EntrySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $trainings = Trainings::find()->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'trainings' => $trainings
        ]);
    }
    
    public function actionConfirm($id)
    {
        $entry = Entry::findOne($id);
        $name = $entry->userData->username;
        $training = $entry->trainingData->title;
        if ($entry->confirm == 0) {
            $entry->confirm = 1;
            Yii::$app->session->setFlash('success','Вы подтвердили право на участие "'.$name.'" в "'.$training.'"');
        } else if (($entry->confirm == 1)&&($entry->visited == 0)){
            $entry->confirm = 0;
            Yii::$app->session->setFlash('success','Вы отменили право на участие "'.$name.'" в "'.$training.'"');
        }
        $entry->save();
        return $this->redirect(['index']);
    }
    
    public function actionVisited($id)
    {
        $entry = Entry::findOne($id);
        $name = $entry->userData->username;
        $training = $entry->trainingData->title;
        if (($entry->visited == 0)&&($entry->confirm == 1)) {
            $entry->visited = 1;
            $userPermit = new UserPermit();
            $userPermit->user = $entry->user;
            $userPermit->training = $entry->training;
            $userPermit->test = $entry->trainingData->test;
            $userPermit->entry = $entry->id;
            $userPermit->rating = 0;
            $userPermit->save();
            Yii::$app->session->setFlash('success','Вы подтвердили, что "'.$name.'"  принял участие в "'.$training.'"');
        } else if (($entry->visited == 1)&&($entry->confirm == 1)){
            $userPermit = UserPermit::find()->where(['user' => $entry->user])->andWhere(['entry' => $entry->id])->one();
            if ($userPermit){
                $userTests = UserTests::find()->where(['permit'=>$userPermit->id])->count();
                if ($userTests == 0) {
                    $userPermit->delete();
                    $entry->visited = 0;
                    Yii::$app->session->setFlash('success','Вы отметили, что "'.$name.'" не принял участие в "'.$training.'"');
                } else {
                    Yii::$app->session->setFlash('error','Вы не можете отметить, что "'.$name.'" не принял участие в "'.$training.'", так как у пользователя в наличии сданные тесты по теме');
                }
            }
        } else if (($entry->visited == 0)&&($entry->confirm == 0)){
            Yii::$app->session->setFlash('error','Вы не можете подтвердить посещение "'.$name.'" "'.$training.'", так как не нодтвреждено право на участие в данном мероприятии');
        }
        $entry->save();
        return $this->redirect(['index']);
    }
    
    public function actionDelete($id)
    {
        $entry = Entry::findOne($id);
        $name = $entry->userData->username;
        $training = $entry->trainingData->title;
        if (($entry->visited == 1)||($entry->confirm == 1)) {
            Yii::$app->session->setFlash('error','Вы не можете удалить заявку "'.$name.'", так как подтверждено право на участие или пользователь уже посетил "'.$training.'"');
        } else {
            $entry->delete();
            Yii::$app->session->setFlash('success','Заявка "'.$name.'" на участие в "'.$training.'" была удалена');
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
