<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use app\modules\UserInfo;

use app\models\VideoAboutCompany;

use yii\web\UploadedFile;

use yii\data\Pagination;
use yii\data\ActiveDataProvider;

class VideoAboutCompanyController extends \yii\web\Controller
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
            'query' => VideoAboutCompany::find(),
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
        $model = new VideoAboutCompany();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->video = UploadedFile::getInstance($model, 'video');
            if ($model->validate()){     
                $model->video_path = $model->videoUrl();
                $success = $model->save();                                
                if ($success) {
                    $model->uploadVideo($model->video_path);
                    Yii::$app->session->setFlash('success','Видео  успешно добавлен');
                    return $this->redirect('index');
                } else {
                    Yii::$app->session->setFlash('error','Ошибка при добавлении Видео');
                }
            }
        }            
        return $this->render('create',[
            'model' => $model,
        ]);
    }
    
    public function actionUpdate($id)
    {                
        $model = VideoAboutCompany::find()->where(['id'=>$id])->one();
        $old_video = $model->video_path;
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->validate()) {
                $model->video = UploadedFile::getInstance($model, 'video');
                $model->video_path = $model->videoUrl();
                $success = $model->save();
                if ($success) {
                    $model->uploadVideo($model->video_path);
                    unlink($old_video);
                    Yii::$app->session->setFlash('success','Видео о компаний успешно обновлен');
                    return $this->redirect('index');
                } else {
                    Yii::$app->session->setFlash('error','Ошибка при обновлении Видео');
                }
            }
        }                                        
        return $this->render('update',[
            'model' => $model,
        ]);
    }
    
    
    public function actionDelete($id)
    {
        $model = VideoAboutCompany::findOne($id);
        unlink($model->video_path);
        $model->delete();
        Yii::$app->session->setFlash('success','Видео о компаний был удален');
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
