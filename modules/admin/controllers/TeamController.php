<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use app\modules\UserInfo;

use app\models\Team;
use app\models\TeamInfo;
use app\models\TeamForm;
use app\models\TeamSearch;

use yii\web\UploadedFile;

use yii\data\Pagination;

class TeamController extends \yii\web\Controller
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
        $searchModel = new TeamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }
    
    public function actionCreate()
    {
        $model = new TeamForm();
            
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->photo = UploadedFile::getInstance($model, 'photo');
            if ($model->validate()){
                $imgUrl = $model->photoUrl();
                
                $trx = Yii::$app->db->beginTransaction();
                $success = true;
                
                $member = new Team();
                $member->photo = $imgUrl;
                $member->phone = $model->phone;
                $member->email = $model->email;
                $member->mob_phone = $model->mob_phone;
                if ($member->save()) {
                    
                    $memberEn = new TeamInfo();
                    $memberEn->name = $model->nameEn;
                    $memberEn->description = $model->descriptionEn;
                    $memberEn->team = $member->id;
                    $memberEn->lang = 1;
                    $memberEn->save();
                    
                    $memberRu = new TeamInfo();
                    $memberRu->name = $model->nameRu;
                    $memberRu->description = $model->descriptionRu;
                    $memberRu->team = $member->id;
                    $memberRu->lang = 2;
                    $memberRu->save();
                    
                    $memberKz = new TeamInfo();
                    $memberKz->name = $model->nameKz;
                    $memberKz->description = $model->descriptionKz;
                    $memberKz->team = $member->id;
                    $memberKz->lang = 3;
                    $memberKz->save();
                    
                    $success = $memberRu->save()&&$memberKz->save()&&$memberEn->save();
                        
                    if ($success) {
                        $success = $model->uploadPhoto($imgUrl);
                    }
                    
                } else {
                    $success = false;
                }
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Специалист "'.$memberRu->name.'" успешно добавлен');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при добавлении специалиста');
                }
            }
        }
        
        return $this->render('create',[
            'model' => $model
        ]);
    }
    
    public function actionUpdate($id)
    {
        $model = new TeamForm();
        $team = Team::find()->where(['id'=>$id])->one();  
        $teamInfo = TeamInfo::find()->where(['team'=>$id])->all();
        
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->photo = UploadedFile::getInstance($model, 'photo');
            
            if ($model->validate()){
                $imgUrl = $model->photoUrl();
                
                $trx = Yii::$app->db->beginTransaction();
                
                $success = true;
                $team->photo = $imgUrl;
                $team->phone = $model->phone;
                $team->email = $model->email;
                $team->mob_phone = $model->mob_phone;
                if ($team->save()) {
                    foreach ($teamInfo as $info) {
                        if ($info->lang == 1) {
                            $info->name = $model->nameEn;
                            $info->description = $model->descriptionEn;
                            $success_1 = $info->save();
                        } else if ($info->lang == 2){
                            $info->name = $model->nameRu;
                            $info->description = $model->descriptionRu;
                            $success_2 = $info->save();
                        } else if ($info->lang == 3){
                            $info->name = $model->nameKz;
                            $info->description = $model->descriptionKz;
                            $success_3 = $info->save();
                        }                        
                    }
                }
                
                $success = $success_1&&$success_2&&$success_3;
                
                
                if ((!empty($model->photo))&&$success) {
                    $success = $model->uploadPhoto($imgUrl);
                }
                
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Специалист "'.$model->nameRu.'" успешно обновлен');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при обновлении специалиста');
                }
            }
        }
        
        foreach ($teamInfo as $info) {
            if ($info->lang == 1) {
                $model->nameEn = $info->name;
                $model->descriptionEn = $info->description;
            } else if ($info->lang == 2){
                $model->nameRu = $info->name;
                $model->descriptionRu = $info->description;
            } else if ($info->lang == 3){
                $model->nameKz = $info->name;
                $model->descriptionKz = $info->description;
            }
        }
        
        $imgUrl = $team->photo;
        $model->email = $team->email;
        $model->phone = $team->phone;
        $model->mob_phone = $team->mob_phone;
        
        return $this->render('update',[
            'model' => $model,
            'imgUrl' => $imgUrl
        ]);
    }
    
    
    
    public function actionDelete($id)
    {
        $team = Team::findOne($id);
        $name = $team->ruContent->name;
        unlink($team->photo);
        $team->delete();
        Yii::$app->session->setFlash('success','Специалист "'.$name.'" был удалена');
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
