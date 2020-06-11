<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use app\modules\UserInfo;

use app\models\Videos;
use app\models\VideosSearch;

use yii\web\UploadedFile;

use yii\data\Pagination;

class VideosController extends \yii\web\Controller
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
        
        $searchModel = new VideosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionCreate()
    {
        $model = new Videos();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());            
            if ($model->validate()){                                               
                $success = $model->save();                                
                if ($success) {
                    Yii::$app->session->setFlash('success','Видео "'.$model->name.'" успешно добавлен');
                    return $this->redirect('index');
                } else {
                    Yii::$app->session->setFlash('error','Ошибка при добавлении видео');
                }
            }
        }            
        return $this->render('create',[
            'model' => $model,
        ]);
    }
    
    public function actionUpdate($id)
    {                
        $model = Videos::find()->where(['id'=>$id])->one(); 
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->validate()){                                                
                $success = $model->save();                                                
                if ($success) {
                    Yii::$app->session->setFlash('success','Видео "'.$model->name.'" успешно обновлен');
                    return $this->redirect('index');
                } else {
                    Yii::$app->session->setFlash('error','Ошибка при обновлении видео');
                }
            }
        }                                        
        return $this->render('update',[
            'model' => $model,
        ]);
    }
    
    
    public function actionDelete($id)
    {
        $model = Videos::findOne($id);
        $title = $model->name;
        $model->delete();
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
