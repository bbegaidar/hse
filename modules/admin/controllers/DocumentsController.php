<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use app\modules\UserInfo;

use app\models\Documents;
use app\models\DocumentsForm;
use app\models\DocumentsSearch;

use yii\web\UploadedFile;

use yii\data\Pagination;

class DocumentsController extends \yii\web\Controller
{
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'download' => ['POST'],
                ],
            ],
        ];
    }
    
    public function actionIndex()
    {
        
        $searchModel = new DocumentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionCreate()
    {
        $model = new DocumentsForm();
       
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->validate()){
                $imgUrl = $model->fileUrl();
                
                $trx = Yii::$app->db->beginTransaction();
               
                
                $documents = new Documents();
                $documents->name = $model->name;
                $documents->alias = $model->alias;
                $documents->file = $imgUrl;
                
                $success = $documents->save();
                
                if ($success) {
                        $success = $model->uploadFile($imgUrl);
                    }
                    
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Документ "'.$documents->name.'" успешно добавлен');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при добавлении документа');
                }
            }
        }
    
        return $this->render('create',[
            'model' => $model
        ]);
    }
    
    public function actionDownload($id)
    {
        $documents = Documents::findOne($id);
        $path=Yii::getAlias('@webroot').'/'.$documents->file;
        if (file_exists($path)) {
            if (Yii::$app->response->sendFile($path)->send()) {
                Yii::$app->session->setFlash('success','Файл '.$documents->name.' ('.$documents->file.') был скачан');
            }
        } else {
           Yii::$app->session->setFlash('error','Файл '.$documents->name.' ('.$documents->file.') не найден');
        }
        return $this->redirect('index');
    }
    
    public function actionUpdate($id)
    {
        $model = new DocumentsForm();
        $documents = Documents::find()->where(['id'=>$id])->one();  
       
        
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->file = UploadedFile::getInstance($model, 'file');
            
            if ($model->validate()){
                $imgUrl = $documents->file;
                
                
                $trx = Yii::$app->db->beginTransaction();
                
                $documents->name = $model->name;
                $documents->alias = $model->alias;
                
                $success = $documents->save();
                
                
                if ((!empty($model->file))&&$success) {
                    $success = $model->uploadFile($imgUrl);
                }
                
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Документ "'.$model->name.'" успешно обновлен');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при обновлении документа');
                }
            }
        }
        
        $model->name = $documents->name;
        $model->alias = $documents->alias;
        
        $imgUrl = $documents->file;
        
        return $this->render('update',[
            'model' => $model
        ]);
    }
    
    
    public function actionDelete($id)
    {
        $documents = Documents::findOne($id);
        $name = $documents->name;
        unlink($documents->file);
        $documents->delete();
        Yii::$app->session->setFlash('success','Документ "'.$name.'" был удален');
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
