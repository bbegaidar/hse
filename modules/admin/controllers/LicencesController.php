<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use app\modules\UserInfo;

use app\models\Licences;

use yii\web\UploadedFile;

use yii\data\Pagination;
use yii\data\ActiveDataProvider;

class LicencesController extends \yii\web\Controller
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
        
        $dataProvider = new ActiveDataProvider([
            'query' => Licences::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);          
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
    
    public function actionCreate()
    {
        $model = new Licences();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->images = UploadedFile::getInstance($model, 'images');
            if ($model->validate()){
                if (!empty($model->images)) {
                  $model->img_name = $model->images->baseName;
                  $model->img_size = strval($model->images->size);
                  $model->img_mime = $model->images->type;
                  $model->img_type = $model->images->extension;
                  $time = strtotime(date('Y-m-d H:i:s'));
                  $model->img = 'uploads/' . $model->images->baseName . '_' . $time . '.' . $model->images->extension;
                }    
                $trx = Yii::$app->db->beginTransaction();                                
                $success = $model->save();                
                if ($success && $model->images) {
                    $success = $model->images->saveAs($model->img);
                }
                                             
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Фото успешно добавлено');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при добавлении фото');
                }
            }
        }
    
        return $this->render('create',[
            'model' => $model
        ]);
    }
    
    public function actionUpdate($id)
    {
        $model = Licences::find()->where(['id'=>$id])->one();  
        $arrPath = $model->img;      
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->images = UploadedFile::getInstance($model, 'images');
            
            if ($model->validate()){
              if (!empty($model->images)) {
                $model->img_name = $model->images->baseName;
                $model->img_size = strval($model->images->size);
                $model->img_mime = $model->images->type;
                $model->img_type = $model->images->extension;
                $time = strtotime(date('Y-m-d H:i:s'));
                $model->img = 'uploads/' . $model->images->baseName . '_' . $time . '.' . $model->images->extension;
              }                  
              $trx = Yii::$app->db->beginTransaction();                          
              $success = $model->save();
              
              if ((!empty($model->images))&&$success) {                
                $success = $model->images->saveAs($model->img);
                if (!empty($arrPath) && file_exists($arrPath)) {
                  unlink($arrPath);
                }                 
              }
              
              if ($success) {
                $trx->commit();
                Yii::$app->session->setFlash('success','Фото успешно обновлено');
                return $this->redirect('index');
              } else {
                $trx->rollBack();
                Yii::$app->session->setFlash('error','Ошибка при обновлении фото');
              }
            }
        }
                        
        $imgUrl = $model->img;
        
        return $this->render('update',[
            'model' => $model,
            'imgUrl' => $imgUrl
        ]);
    }
    
    
    public function actionDelete($id)
    {
        $Licences = Licences::findOne($id);
        $arrPath = $Licences->img;        
        if (!empty($arrPath) && file_exists($arrPath)) {
          unlink($arrPath);
        }
        $Licences->delete();
        Yii::$app->session->setFlash('success','Фото было удалено');
        return $this->redirect(['index']);
    }
    
    
    public function actionStatus($id)
    {
        $Licences = Licences::findOne($id);
        if ($Licences->is_active == 1) {
            $Licences->is_active = 0;
        } else {
            $Licences->is_active = 1;
        }
        $Licences->save();
        Yii::$app->session->setFlash('success','Статус был изменен');
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
