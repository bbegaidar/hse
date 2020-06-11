<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use app\modules\UserInfo;

use app\models\Answers;
use app\models\AnswersContent;
use app\models\AnswersForm;
use app\models\AnswersSearch;

use yii\data\Pagination;

class AnswersController extends \yii\web\Controller
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
        
        $searchModel = new AnswersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }
    
    public function actionCreate()
    {
        $model = new AnswersForm();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
           
            if ($model->validate()){
                
                
                $trx = Yii::$app->db->beginTransaction();
                $success = true;
                
                $answer = new Answers();
                $answer->type = 1;
                
                if ($answer->save()) {
                    
                    $answerEn = new AnswersContent();
                    $answerEn->question = $model->questionEn;
                    $answerEn->answer = $model->answerEn;
                    $answerEn->answers = $answer->id;
                    $answerEn->lang = 1;
                    
                    $answerRu = new AnswersContent();
                    $answerRu->question = $model->questionRu;
                    $answerRu->answer = $model->answerRu;
                    $answerRu->answers = $answer->id;
                    $answerRu->lang = 2;
                    
                    $answerKz = new AnswersContent();
                    $answerKz->question = $model->questionKz;
                    $answerKz->answer = $model->answerKz;
                    $answerKz->answers = $answer->id;
                    $answerKz->lang = 3;
                    
                    $success = $answerRu->save()&&$answerKz->save()&&$answerEn->save();
                    
                } else {
                    $success = false;
                }
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Вопрос-ответ "'.$answerRu->question.'" успешно добавлена');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при добавлении записи');
                }
            }
        }
    
        return $this->render('create',[
            'model' => $model
        ]);
    }
    
    public function actionUpdate($id)
    {
        $model = new AnswersForm();
        $answer = Answers::find()->where(['id'=>$id])->one();  
        
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->validate()){
                
                $trx = Yii::$app->db->beginTransaction();
                
                $success = true;
                
                foreach ($answer->answersContents as $info) {
                    if ($info->lang == 1) {
                        $info->question = $model->questionEn;
                        $info->answer = $model->answerEn;
                        $success_1 = $info->save();
                    } else if ($info->lang == 2){
                        $info->question = $model->questionRu;
                        $info->answer = $model->answerRu;
                        $success_2 = $info->save();
                    } else if ($info->lang == 3){
                        $info->question = $model->questionKz;
                        $info->answer = $model->answerKz;
                        $success_3 = $info->save();
                    }
                }
                
                $success = $success_1&&$success_2&&$success_3;
                
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Вопрос-ответ "'.$model->questionRu.'" успешно обновлен');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при обновлении записи');
                }
            }
        }
        
        foreach ($answer->answersContents as $info) {
            if ($info->lang == 1) {
                $model->questionEn = $info->question;
                $model->answerEn = $info->answer;
            } else if ($info->lang == 2){
                $model->questionRu = $info->question;
                $model->answerRu = $info->answer;
            } else if ($info->lang == 3){
                $model->questionKz = $info->question;
                $model->answerKz = $info->answer;
            }
        }
        
        return $this->render('update',[
            'model' => $model
        ]);
    }
    
    
    public function actionDelete($id)
    {
        $answer = Answers::findOne($id);
        $name = $answer->ruContent->answer;
        $answer->delete();
        Yii::$app->session->setFlash('success','Вопрос "'.$name.'" был удален');
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
