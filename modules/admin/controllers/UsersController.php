<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\filters\VerbFilter;
use app\modules\UserInfo;

use app\models\User;
use app\models\UserPermit;
use app\models\UserTests;
use app\models\Test;
use app\models\TestQuestion;
use app\models\TestAnswer;
use app\models\UserSearch;


class UsersController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'permit' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {

        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }


    public function actionView($id)
    {
        $model = User::findOne($id);
        if ($model) {
            return $this->render('view', [
                'model' => $model,
            ]);
        }
        Yii::$app->session->setFlash('error', 'Ошибка пользователь не найден');
        return $this->redirect(['index']);
    }

    public function actionPermit()
    {
        $request = Yii::$app->request;
        if ($request->isPost && $request->post('action') == 'view' && $request->post('id')) {
            $id = $request->post('id');
            $permit = UserPermit::findOne($id);
            $user = User::findOne($permit->user);
            $test = Test::findOne($permit->test);
            if ($permit && $user && $test) {
                $lastTest = UserTests::find()->where(['permit' =>  $permit->id])->andWhere(['rating' => $permit->rating])->orderBy(['id' => SORT_DESC])->one();
                if ($lastTest && count(json_decode($lastTest->questions)) > 0 && count(json_decode($lastTest->answers)) > 0 && count(json_decode($lastTest->questions)) == count(json_decode($lastTest->answers))) {
                    $questions = json_decode($lastTest->questions);
                    $answers = json_decode($lastTest->answers);
                    $result = '<h4>Результаты тестирования</h4>';
                    $result .= '<p><strong>Логин: </strong>' . $user->email . '</p>';
                    $result .= '<p><strong>ФИО: </strong>' . $user->name . ' ' . $user->surname . ' ' . $user->patronymic . '</p>';
                    $result .= '<p><strong>Компания: </strong>' . $user->organization . '</p>';
                    $result .= '<p><strong>Название теста: </strong>' . $test->name . '</p>';
                    $result .= '<p><strong>Суммарный балл: </strong>' . $permit->rating . '</p>';
                    $result .= '<p><strong>Дата: </strong>' . $lastTest->update . '</p>';

                    $result .= '<table border="1" cellspacing="0" cellpadding="0" style="border:solid windowtext 1.0pt;border-collapse:collapse;" class="table table-sm table-bordered table-striped"><thead>';
                    $result .= '<tr><td style="padding:5.65pt 5.65pt 5.65pt 5.65pt;">#</td><td style="padding:5.65pt 5.65pt 5.65pt 5.65pt;">Вопрос</td><td style="padding:5.65pt 5.65pt 5.65pt 5.65pt;">Ответ</td><td style="padding:5.65pt 5.65pt 5.65pt 5.65pt;"></td></tr></thead><tbody>';
                    for ($i = 0; $i < count($questions); $i++) {
                        $question = TestQuestion::findOne($questions[$i]);
                        if ($question) {
                            $answer = TestAnswer::find()->where(['question' => $questions[$i]])->andWhere(['id' => $answers[$i]])->one();
                            if ($answer) {
                                $result .= '<tr><td style="padding:5.65pt 5.65pt 5.65pt 5.65pt;">' . ($i + 1) . '</td>';
                                $result .= '<td style="padding:5.65pt 5.65pt 5.65pt 5.65pt;">' . $question->question . '</td>';
                                $result .= '<td style="padding:5.65pt 5.65pt 5.65pt 5.65pt;">' . $answer->answer . '</td>';
                                $result .= '<td style="padding:5.65pt 5.65pt 5.65pt 5.65pt;">' . ($answer->result == 1 ? 'Верно' : 'Неверно') . '</td>';
                            }
                        }
                    }

                    $result .= '<table><tbody>';
                    return $result;
                }
            }
        }
        return false;
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
