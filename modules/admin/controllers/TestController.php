<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use app\modules\UserInfo;

use app\models\Test;
use app\models\TestCategory;
use app\models\TestForm;
use app\models\TestSearch;

use yii\data\Pagination;

class TestController extends \yii\web\Controller
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
        
        $searchModel = new TestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionCreate()
    {
        $model = new TestForm();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->validate()){
                $trx = Yii::$app->db->beginTransaction();
                
                $test = new Test();
                $test->name = $model->name;
                $test->passing_point = $model->passing_point;
                $success = $test->save();
                
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Категория тестов  "'.$test->name.'" успешно добавлена');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при добавлении категории');
                }
            }
        }
    
        return $this->render('create',[
            'model' => $model
        ]);
    }
    
    public function actionUpdate($id)
    {
        $model = new TestForm();
        $test = Test::find()->where(['id'=>$id])->one(); 
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->validate()){
                $trx = Yii::$app->db->beginTransaction();
                $test->name = $model->name;
                $test->passing_point = $model->passing_point;
                $success = $test->save();
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Категория тестов "'.$model->name.'" успешно обновлена');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при обновлении категории');
                }
            }
        }
        
        $model->name = $test->name;
        $model->passing_point = $test->passing_point;
        return $this->render('update',[
            'model' => $model
        ]);
    }
    
    
    public function actionDelete($id)
    {
        $test = Test::findOne($id);
        $name = $test->name;
        $test->delete();
        Yii::$app->session->setFlash('success','Тест "'.$name.'" был удален');
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
