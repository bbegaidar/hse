<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use app\modules\UserInfo;
use yii\helpers\Url;

use app\models\Pages;
use app\models\PagesContent;
use app\models\PagesForm;
use app\models\PagesSearch;

use app\models\TestQuestion;
use app\models\TestAnswer;
use yii\web\UploadedFile;

use yii\data\Pagination;

class PagesController extends \yii\web\Controller
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
        
        $searchModel = new PagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionCreate()
    {
        $model = new PagesForm();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->validate()){
                $model->photos = UploadedFile::getInstances($model, 'photos');
                if ($model->photos && !$model->saveImg()) {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }   
                $trx = Yii::$app->db->beginTransaction();
                $success = true;
                
                $pages = new Pages();
                $pages->name = $model->name;
                $pages->url = $model->url;
                $pages->images = $model->images;
                
                if ($pages->save()) {
                    
                    $pagesEn = new PagesContent();
                    $pagesEn->title = $model->titleEn;
                    $pagesEn->subtitle = $model->subtitleEn;
                    $pagesEn->description = $model->descriptionEn;
                    $pagesEn->pages = $pages->id;
                    $pagesEn->lang = 1;
                    
                    $pagesRu = new PagesContent();
                    $pagesRu->title = $model->titleRu;
                    $pagesRu->subtitle = $model->subtitleRu;
                    $pagesRu->description = $model->descriptionRu;
                    $pagesRu->pages = $pages->id;
                    $pagesRu->lang = 2;
                    
                    $pagesKz = new PagesContent();
                    $pagesKz->title = $model->titleKz;
                    $pagesKz->subtitle = $model->subtitleKz;
                    $pagesKz->description = $model->descriptionKz;
                    $pagesKz->pages = $pages->id;
                    $pagesKz->lang = 3;
                        
                    $success = $pagesRu->save()&&$pagesKz->save()&&$pagesEn->save();
                    if ($model->photos && !$model->upload()) {
                        return $this->render('create', [
                            'model' => $model,
                        ]);
                    }
                } else {
                    $success = false;
                }
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Страница "'.$pages->name.'" успешно добавлена');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при добавлении страницы');
                }
            }
        }
    
        return $this->render('create',[
            'model' => $model
        ]);
    }
    
    public function actionUpdate($id)
    {
        $model = new PagesForm();
        $pages = Pages::find()->where(['id'=>$id])->one(); 
        $old_photos = json_decode($pages->images);
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            
            if ($model->validate()){
                $model->photos = UploadedFile::getInstances($model, 'photos');
                if ($model->photos && !$model->saveImg()) {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
                $trx = Yii::$app->db->beginTransaction();
                $success = true;
                
                
                foreach ($pages->pagesContents as $info) {
                    if ($info->lang == 1) {
                        $info->title = $model->titleEn;
                        $info->subtitle = $model->subtitleEn;
                        $info->description = $model->descriptionEn;
                        $success_1 = $info->save();
                    } else if ($info->lang == 2){
                        $info->title = $model->titleRu;
                        $info->subtitle = $model->subtitleRu;
                        $info->description = $model->descriptionRu;
                        $success_2 = $info->save();
                    } else if ($info->lang == 3){
                        $info->title = $model->titleKz;
                        $info->subtitle = $model->subtitleKz;
                        $info->description = $model->descriptionKz;
                        $success_3 = $info->save();
                    }
                    
                }
                
                $pages->name = $model->name;
                $pages->url = $model->url;
                $pages->images = $model->images;
                $success_4 = $pages->save();
                
                $success = $success_1&&$success_2&&$success_3&&$success_4;
                if ($success_4) {
                    if ($model->photos && !$model->upload()) {
                        return $this->render('create', [
                            'model' => $model,
                        ]);
                    }

                    if (!empty($old_photos)) {                        
                        foreach ($old_photos as $file) {
                            if (!empty($file) && file_exists($file)) {
                                unlink($file);
                            }
                        }
                    }  
                }
                
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Страница "'.$model->titleRu.'" успешно обновлена');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при обновлении страницы');
                }
            }
        }
        
        foreach ($pages->pagesContents as $info) {
            if ($info->lang == 1) {
                $model->titleEn = $info->title;
                $model->subtitleEn = $info->subtitle;
                $model->descriptionEn = $info->description;
            } else if ($info->lang == 2){
                $model->titleRu = $info->title;
                $model->subtitleRu = $info->subtitle;
                $model->descriptionRu = $info->description;
            } else if ($info->lang == 3){
                $model->titleKz = $info->title;
                $model->subtitleKz = $info->subtitle;
                $model->descriptionKz = $info->description;
            }
        }
        
        $model->name = $pages->name;
        $model->url = $pages->url;
        
        return $this->render('update',[
            'model' => $model
        ]);
    }
    
    
    public function actionDelete($id)
    {
        $pages = Pages::findOne($id);
        $name = $pages->name;
        $old_photos = json_decode($pages->images);
        if (!empty($old_photos)) {            
            foreach ($old_photos as $file) {
                if (!empty($file) && file_exists($file)) {
                    unlink($file);
                }
            }
        }
        $pages->delete();
        Yii::$app->session->setFlash('success','Страница "'.$name.'" была удалена');
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
