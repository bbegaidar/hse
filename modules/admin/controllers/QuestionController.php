<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use app\modules\UserInfo;

use app\base\Model;
use app\models\Test;
use app\models\TestQuestion;
use app\models\TestAnswer;
use app\models\TestQuestionForm;
use app\models\TestQuestionSearch;

use yii\data\Pagination;

class QuestionController extends \yii\web\Controller
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
        
        $searchModel = new TestQuestionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $test = Test::find()->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'test' => $test
        ]);
    }
    
    public function actionCreate()
    {
        $model = new TestQuestionForm();
       
        $answers = [new TestAnswer];
        if (Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $answers = Model::createMultiple(TestAnswer::classname());
            Model::loadMultiple($answers, Yii::$app->request->post());
            
            $trx = Yii::$app->db->beginTransaction();
            $question = new TestQuestion();
            $question->question = $model->question;
            $question->test = $model->test;
            $question->type = $model->type;
            if ($question->validate()) {
                $success = $question->save()&&$this->createQuestion($question, $answers);
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Вопрос  "'.$question->question.'" успешно добавлен');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при добавлении вопроса');
                }
            }
        }
        
        $tests = Test::find()->all();
        
        return $this->render('create',[
            'model' => $model,
            'modelsAnswer' => $answers,
            'tests' => $tests
        ]);
    }
    
    private function createQuestion($question, $answers)
    {
        $success = true;
        foreach ($answers as $answer) {
            $answer->question = $question->id;
            $success = $success&&$answer->save(); 
        }
        return $success;
    }
    
    public function actionUpdate($id)
    {
        $model = new TestQuestionForm();
        $question = TestQuestion::find()->where(['id'=>$id])->one(); 
        $answers = TestAnswer::find()->where(['question'=>$question->id])->all();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            Model::loadMultiple($answers, Yii::$app->request->post());
            if ($model->validate()){
                $trx = Yii::$app->db->beginTransaction();
                $question->question = $model->question;
                $question->test = $model->test;
                $question->type = $model->type;
                $success = $question->save();
                foreach ($answers as $answer) {
                    $success = $success&&$answer->save();
                }
                if ($success) {
                    $trx->commit();
                    Yii::$app->session->setFlash('success','Вопрос "'.$model->question.'" успешно обновлен');
                    return $this->redirect('index');
                } else {
                    $trx->rollBack();
                    Yii::$app->session->setFlash('error','Ошибка при обновлении вопроса');
                }
            }
        }
        
        $model->question = $question->question;
        $model->type = $question->type;
        $model->test = $question->test;
         $tests = Test::find()->all();
        return $this->render('update',[
            'model' => $model,
            'modelsAnswer' => $answers,
            'tests' => $tests
        ]);
    }
    
    
    public function actionDelete($id)
    {
        $test = TestQuestion::findOne($id);
        $name = $test->question;
        $test->delete();
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
