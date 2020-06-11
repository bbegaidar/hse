<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use app\modules\UserInfo;

use app\models\News;
use app\models\NewsCategory;
use app\models\NewsContent;
use app\models\NewsForm;
use app\models\NewsSearch;

use yii\web\UploadedFile;

use yii\data\Pagination;

class NewsController extends \yii\web\Controller
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
        
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $categories = NewsCategory::find()->all();
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'categories' => $categories
        ]);
    }
    
    public function actionCreate()
    {
        $model = new NewsForm();
        $category = NewsCategory::find()->all();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->photo = UploadedFile::getInstance($model, 'photo');
            if ($model->validate()){
                $imgUrl = $model->photoUrl();
                
                $trx = Yii::$app->db->beginTransaction();
                $success = true;
                
                $news = new News();
                $news->date = date('Y-m-d');
                $news->category = $model->category;
                $news->photo = $imgUrl;
                
                if ($news->save()) {
                    
                    $newsEn = new NewsContent();
                    $newsEn->title = $model->titleEn;
                    $newsEn->excerpt = $model->excerptEn;
                    $newsEn->description = $model->descriptionEn;
                    $newsEn->news = $news->id;
                    $newsEn->lang = 1;
                    
                    $newsRu = new NewsContent();
                    $newsRu->title = $model->titleRu;
                    $newsRu->excerpt = $model->excerptRu;
                    $newsRu->description = $model->descriptionRu;
                    $newsRu->news = $news->id;
                    $newsRu->lang = 2;
                    
                    $newsKz = new NewsContent();
                    $newsKz->title = $model->titleKz;
                    $newsKz->excerpt = $model->excerptKz;
                    $newsKz->description = $model->descriptionKz;
                    $newsKz->news = $news->id;
                    $newsKz->lang = 3;
                        
                    $success = $newsRu->save()&&$newsKz->save()&&$newsEn->save();
                        
                    if ($success) {
                        $success = $model->uploadPhoto($imgUrl);
                    }
                        
                } else {
                    $success = false;
                }
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Новость "'.$newsRu->title.'" успешно добавлена');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при добавлении новости');
                }
            }
        }
    
        return $this->render('create',[
            'model' => $model,
            'category' => $category
        ]);
    }
    
    public function actionUpdate($id)
    {
        $model = new NewsForm();
        $news = News::find()->where(['id'=>$id])->one();  
        $category = NewsCategory::find()->all();
        
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->photo = UploadedFile::getInstance($model, 'photo');
            
            if ($model->validate()){
                $imgUrl = $news->photo;
                
                $trx = Yii::$app->db->beginTransaction();
                
                $success = true;
                
                
                foreach ($news->newsContents as $info) {
                    if ($info->lang == 1) {
                        $info->title = $model->titleEn;
                        $info->excerpt = $model->excerptEn;
                        $info->description = $model->descriptionEn;
                        $success_1 = $info->save();
                    } else if ($info->lang == 2){
                        $info->title = $model->titleRu;
                        $info->excerpt = $model->excerptRu;
                        $info->description = $model->descriptionRu;
                        $success_2 = $info->save();
                    } else if ($info->lang == 3){
                        $info->title = $model->titleKz;
                        $info->excerpt = $model->excerptKz;
                        $info->description = $model->descriptionKz;
                        $success_3 = $info->save();
                    }
                    
                }
                
                $news->category = $model->category;
                
                $success_4 = $news->save();
                
                $success = $success_1&&$success_2&&$success_3&&$success_4;
                
                
                if ((!empty($model->photo))&&$success) {
                    $success = $model->uploadPhoto($imgUrl);
                }
                
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Новость "'.$model->titleRu.'" успешно обновлена');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при обновлении новости');
                }
            }
        }
        
        foreach ($news->newsContents as $info) {
            if ($info->lang == 1) {
                $model->titleEn = $info->title;
                $model->excerptEn = $info->excerpt;
                $model->descriptionEn = $info->description;
            } else if ($info->lang == 2){
                $model->titleRu = $info->title;
                $model->excerptRu = $info->excerpt;
                $model->descriptionRu = $info->description;
            } else if ($info->lang == 3){
                $model->titleKz = $info->title;
                $model->excerptKz = $info->excerpt;
                $model->descriptionKz = $info->description;
            }
        }
        
        $model->category = $news->category;
        
        $imgUrl = $news->photo;
        
        return $this->render('update',[
            'model' => $model,
            'imgUrl' => $imgUrl,
            'category' => $category
        ]);
    }
    
    
    public function actionDelete($id)
    {
        $news = News::findOne($id);
        $name = $news->ruContent->title;
        unlink($news->photo);
        $news->delete();
        Yii::$app->session->setFlash('success','Новость "'.$name.'" была удалена');
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
