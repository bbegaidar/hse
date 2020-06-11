<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use app\modules\UserInfo;

use app\models\Test;
use app\models\Trainings;
use app\models\TrainingsCategory;
use app\models\TrainingsForm;
use app\models\TrainingsSearch;

use yii\web\UploadedFile;

use yii\data\Pagination;

class TrainingsController extends \yii\web\Controller
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
        
        $searchModel = new TrainingsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         $category = TrainingsCategory::find()->all();
        $test = Test::find()->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'category' => $category,
            'test' => $test
        ]);
    }
    
    public function actionCreate()
    {
        $model = new TrainingsForm();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->photo = UploadedFile::getInstance($model, 'photo');
            if ($model->validate()){
                $imgUrl = null;
                if ($model->photo) {
                    $imgUrl = $model->photoUrl();
                }                
                $trx = Yii::$app->db->beginTransaction();
                
                $training = new Trainings();
                $training->title = $model->title;
                $training->lecturer = $model->lecturer;
                $training->description = $model->description != null ? $model->description : '';
                $training->startDate = $model->startDate;
                $training->endDate = $model->endDate;
                $training->startTime = $model->startTime != null ? $model->startTime : date('H:i', 28800);
                $training->endTime = $model->endTime != null ? $model->endTime : date('H:i', 28800);
                $training->duration = $model->duration != null ? $model->duration : 0;
                $training->city = $model->city;
                $training->place = $model->place;
                $training->category = $model->category;
                $training->test = $model->test;
                $training->photo = $imgUrl;
                $success = $training->save();
                if ($success) {
                    if ($model->photo) {
                        $success = $model->uploadPhoto($imgUrl);
                    }                    
                }
                
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Тренинг "'.$training->title.'" успешно добавлен');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при добавлении тренинга');
                }
            }
        }
        
        $category = TrainingsCategory::find()->all();
        $test = Test::find()->all();
        
        return $this->render('create',[
            'model' => $model,
            'category' => $category,
            'test' => $test
        ]);
    }
    
    public function actionUpdate($id)
    {
        $model = new TrainingsForm();
        
        $training = Trainings::find()->where(['id'=>$id])->one(); 
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->photo = UploadedFile::getInstance($model, 'photo');
            if ($model->validate()){
                $imgUrl = $training->photo;
                $trx = Yii::$app->db->beginTransaction();
                
                $training->title = $model->title;
                $training->lecturer = $model->lecturer;
                $training->description = $model->description != null ? $model->description : '';
                $training->startDate = $model->startDate;
                $training->endDate = $model->endDate;
                $training->startTime = $model->startTime != null ? $model->startTime : date('H:i', 28800);
                $training->endTime = $model->endTime != null ? $model->endTime : date('H:i', 28800);
                $training->duration = $model->duration != null ? $model->duration : 0;
                $training->city = $model->city;
                $training->place = $model->place;
                $training->category = $model->category;
                $training->test = $model->test;
                
                
                $success = $training->save();
                
                if ((!empty($model->photo))&&$success) {
                    $success = $model->uploadPhoto($imgUrl);
                }
                
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Тренинг "'.$model->title.'" успешно обновлен');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при обновлении тренинга');
                }
            }
        }
        
        $model->title = $training->title;
        $model->lecturer = $training->lecturer;
        $model->description = $training->description;
        $model->startDate = $training->startDate;
        $model->endDate = $training->endDate;
        $model->startTime = $training->startTime;
        $model->endTime = $training->endTime;
        $model->duration = $training->duration;
        $model->city = $training->city;
        $model->place = $training->place;
        $model->category = $training->category;
        $model->test = $training->test;
        
        $category = TrainingsCategory::find()->all();
        $test = Test::find()->all();
        
        $imgUrl = $training->photo;
        
        return $this->render('update',[
            'model' => $model,
            'category' => $category,
            'test' => $test,
            'imgUrl' => $imgUrl
        ]);
    }
    
    
    public function actionDelete($id)
    {
        $training = Trainings::findOne($id);
        $title = $training->title;
        $training->delete();
        Yii::$app->session->setFlash('success','Тренинг "'.$title.'" был удален');
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
