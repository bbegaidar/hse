<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use app\modules\UserInfo;

use app\models\Photogallery;
use app\models\PhotogalleryForm;
use app\models\PhotogallerySearch;

use yii\web\UploadedFile;

use yii\data\Pagination;

class PhotogalleryController extends \yii\web\Controller
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
        
        $searchModel = new PhotogallerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $listCategory = [['id' => '1', 'name' => 'Семинары'], ['id' => '2', 'name' => 'Курсы']];
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'listCategory' => $listCategory
        ]);
    }
    
    public function actionCreate()
    {
        $model = new PhotogalleryForm();
        $listCategory = [['id' => '1', 'name' => 'Семинары'], ['id' => '2', 'name' => 'Курсы']];
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->photos = UploadedFile::getInstances($model, 'photos');
            if ($model->validate()){
                $imgUrl = $model->saveImg();
                
                $trx = Yii::$app->db->beginTransaction();
                
                $model->date = strtotime($model->date);

                $photogallery = new Photogallery();
                $photogallery->title = $model->title;
                $photogallery->title_kaz = $model->title_kaz;
                $photogallery->title_eng = $model->title_eng;
                $photogallery->description_eng = $model->description_eng;
                $photogallery->description_rus = $model->description_rus;
                $photogallery->description_kaz = $model->description_kaz;
                $photogallery->photo = $imgUrl;
                $photogallery->date = $model->date;
                $photogallery->year = date("Y", $model->date);
                $photogallery->month = date("m", $model->date);
                $photogallery->category_id = $model->category_id;
                $photogallery->active = 1;
                
                $success = $photogallery->save();  
                if ($success) {
                    $success = $model->upload();
                }
                               
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Фото "'.$photogallery->title.'" успешно добавлено');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при добавлении фото');
                }
            }                   
        }
        
        $model->date = date('Y-m-d',$model->date);
        return $this->render('create',[
            'model' => $model,
            'listCategory' => $listCategory
        ]);
    }
    
    public function actionUpdate($id)
    {
        $model = new PhotogalleryForm();
        $listCategory = [['id' => '1', 'name' => 'Семинары'], ['id' => '2', 'name' => 'Курсы']];
        $photogallery = Photogallery::find()->where(['id'=>$id])->one(); 
        $old_imgUrl = json_decode($photogallery->photo);
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->photos = UploadedFile::getInstances($model, 'photos');            
            if ($model->validate()) {                
                $imgUrl = $model->saveImg();
                $trx = Yii::$app->db->beginTransaction();
                $model->date = strtotime($model->date);
                
                $photogallery->title = $model->title;
                $photogallery->title_kaz = $model->title_kaz;
                $photogallery->title_eng = $model->title_eng;
                $photogallery->description_eng = $model->description_eng;
                $photogallery->description_rus = $model->description_rus;
                $photogallery->description_kaz = $model->description_kaz;
                $photogallery->photo = $imgUrl;
                $photogallery->date = $model->date;
                $photogallery->year = date("Y", $model->date);
                $photogallery->month = date("m", $model->date);
                $photogallery->category_id = $model->category_id;
                $photogallery->active = 1;
                
                $success = $photogallery->save();                  
                if ((!empty($model->photos))&&$success) {
                    $success = $model->upload();
                }

                if (!empty($old_imgUrl)) {                        
                    foreach ($old_imgUrl as $file) {
                        if (!empty($file) && file_exists($file)) {
                            unlink($file);
                        }
                    }
                }  
                
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Фото "'.$model->title.'" успешно обновлено');
                    return $this->redirect('index');
                } else {                            
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при обновлении фото');
                }
            }             
        }

        $model->date = date('Y-m-d',$photogallery->date);
        
        $model->title = $photogallery->title;
        $model->title_kaz = $photogallery->title_kaz;
        $model->title_eng = $photogallery->title_eng;
        $model->description_eng = $photogallery->description_eng;
        $model->description_rus = $photogallery->description_rus;
        $model->description_kaz = $photogallery->description_kaz;

        
        $imgUrl = json_decode($photogallery->photo);
        
        return $this->render('update',[
            'model' => $model,
            'imgUrl' => $imgUrl,
            'listCategory' => $listCategory
        ]);
    }
    
    
    public function actionDelete($id)
    {
        $photogallery = Photogallery::findOne($id);
        $name = $photogallery->title;
        if (!empty($photogallery->photos)) {                        
            foreach ($photogallery->photos as $file) {
                if (!empty($file) && file_exists($file)) {
                    unlink($file);
                }
            }
        }
        // unlink($photogallery->photos);
        $photogallery->delete();
        Yii::$app->session->setFlash('success','Фото "'.$name.'" было удалено');
        return $this->redirect(['index']);
    }
    
    
    public function actionStatus($id)
    {
        $photogallery = Photogallery::findOne($id);
        $name = $photogallery->title;
        if ($photogallery->active == 1) {
            $photogallery->active = 0;
        } else {
            $photogallery->active = 1;
        }
        $photogallery->save();
        Yii::$app->session->setFlash('success','Статус "'.$name.'" был изменен');
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
