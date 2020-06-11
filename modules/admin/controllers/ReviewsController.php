<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use app\modules\UserInfo;

use app\models\Reviews;
use app\models\ReviewsCategory;
use app\models\ReviewsContent;
use app\models\ReviewsForm;
use app\models\ReviewsSearch;

use yii\web\UploadedFile;

use yii\data\Pagination;

class ReviewsController extends \yii\web\Controller
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
        
        $searchModel = new ReviewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $categories = ReviewsCategory::find()->all();
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'categories' => $categories
        ]);
    }
    
    public function actionCreate()
    {
        $model = new ReviewsForm();
        $category = ReviewsCategory::find()->all();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->validate()){
                
                $trx = Yii::$app->db->beginTransaction();
                $success = true;
                
                $reviews = new Reviews();
                $reviews->category = $model->category;
               
                
                if ($reviews->save()) {
                    
                    $reviewsEn = new ReviewsContent();
                    $reviewsEn->reviewer = $model->reviewerEn;
                    $reviewsEn->review = $model->reviewEn;
                    $reviewsEn->company = $model->companyEn;
                    $reviewsEn->reviews = $reviews->id;
                    $reviewsEn->lang = 1;
                    
                    $reviewsRu = new ReviewsContent();
                    $reviewsRu->reviewer = $model->reviewerRu;
                    $reviewsRu->review = $model->reviewRu;
                    $reviewsRu->company = $model->companyRu;
                    $reviewsRu->reviews = $reviews->id;
                    $reviewsRu->lang = 2;
                    
                    $reviewsKz = new ReviewsContent();
                    $reviewsKz->reviewer = $model->reviewerKz;
                    $reviewsKz->review = $model->reviewKz;
                    $reviewsKz->company = $model->companyKz;
                    $reviewsKz->reviews = $reviews->id;
                    $reviewsKz->lang = 3;
                        
                    $success = $reviewsRu->save()&&$reviewsKz->save()&&$reviewsEn->save();
                        
                } else {
                    $success = false;
                }
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Отзыв от "'.$reviewsRu->reviewer.'" успешно добавлен');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при добавлении записи');
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
        $model = new ReviewsForm();
        $reviews = Reviews::find()->where(['id'=>$id])->one();  
        $category = ReviewsCategory::find()->all();
        
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            
            if ($model->validate()){
                
                $trx = Yii::$app->db->beginTransaction();
                
                $success = true;
                
                
                foreach ($reviews->reviewsContents as $info) {
                    if ($info->lang == 1) {
                        $info->reviewer = $model->reviewerEn;
                        $info->review = $model->reviewEn;
                        $info->company = $model->companyEn;
                        $success_1 = $info->save();
                    } else if ($info->lang == 2){
                        $info->reviewer = $model->reviewerRu;
                        $info->review = $model->reviewRu;
                        $info->company = $model->companyRu;
                        $success_2 = $info->save();
                    } else if ($info->lang == 3){
                        $info->reviewer = $model->reviewerKz;
                        $info->review = $model->reviewKz;
                        $info->company = $model->companyKz;
                        $success_3 = $info->save();
                    }
                    
                }
                
                $reviews->category = $model->category;
                
                $success_4 = $reviews->save();
                
                $success = $success_1&&$success_2&&$success_3&&$success_4;
                
                
                if ((!empty($model->photo))&&$success) {
                    $success = $model->uploadPhoto($imgUrl);
                }
                
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Новость "'.$model->reviewerRu.'" успешно обновлена');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при обновлении новости');
                }
            }
        }
        
        foreach ($reviews->reviewsContents as $info) {
            if ($info->lang == 1) {
                $model->reviewerEn = $info->reviewer;
                $model->reviewEn = $info->review;
                $model->companyEn = $info->company;
            } else if ($info->lang == 2){
                $model->reviewerRu = $info->reviewer;
                $model->reviewRu = $info->review;
                $model->companyRu = $info->company;
            } else if ($info->lang == 3){
                $model->reviewerKz = $info->reviewer;
                $model->reviewKz = $info->review;
                 $model->companyKz = $info->company;
            }
        }
        
        $model->category = $reviews->category;
        
        return $this->render('update',[
            'model' => $model,
            'category' => $category
        ]);
    }
    
    
    public function actionDelete($id)
    {
        $reviews = Reviews::findOne($id);
        $name = $reviews->ruContent->reviewer;
        $reviews->delete();
        Yii::$app->session->setFlash('success','Отзыв от "'.$name.'" был удален');
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
