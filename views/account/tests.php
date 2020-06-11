<?php 
    include 'header.php';
    use yii\grid\GridView;
    use app\widgets\Alert;
    use yii\widgets\Pjax;
    use app\models\Trainings;
    use yii\helpers\Html;
    use app\models\VideosCategory;
    use app\models\Test;
    
$this->title = Yii::$app->name.' - '.Yii::t('static','My tests');
$this->params['breadcrumbs'][] = Yii::t('static','My tests');
?>

<style>
    body {
        padding-top: 0;
    }
    .item-wrap {
        margin-top: 3em;
    }

    td {
        font-family: unset;
        font-size: unset;
    }

    .item-wrap {
        margin-top: 5em;
    }

</style>

<?php // echo $this->render('_header.php',['pageName'=> Yii::t('static','My tests')]) ?>
<main class="main d-flex">
<?php echo $this->render('_side_menu.php') ?>
<div class="main-content d-flex">
<div class="item-wrap d-flex">
<?= Alert::widget() ?>
<div class="my-wrap">
<?php Pjax::begin(); ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [   
            'label' => Yii::t('static','Training'),
            'attribute' => 'training',
            'value' => function($model) {
                $title = Trainings::find()->select('title')->where(['id'=>$model->training])->one()->title;
                $test = Test::find()->where(['id' => $model->test])->one();
                if (!$title) {
                    $title = VideosCategory::find()->select('name')->where(['id'=>$model->videos_category_id])->one()->name;
                }
                return Html::tag('span',$title,['class'=> $model->rating >= $test->passing_point ? 'download' : false ]);
            },
            'format' => 'raw'
        ],
        [   
            'label' => Yii::t('static','Rating'),
            'attribute' => 'rating',
            'value' => function($model){
                $test = Test::find()->where(['id' => $model->test])->one();
                return Html::tag('span',$model->rating.' баллов',['class'=> $model->rating >= $test->passing_point ? 'download' : false ]);
            },
            'format' => 'raw'
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{tests}',
            'buttons' => [
                'tests' => function ($url,$model) {
                    $test = Test::find()->where(['id' => $model->test])->one();
                    if ($model->rating >= $test->passing_point) {
                        return Html::a('Скачать сертификат', ['certificate', 'id'=>$model->id],['class'=>'download', 'data' => ['method' => 'post', 'pajx' => 0, 'confirm' => 'Вы действительно хотите скачать сертификат?']]);
                    } else if ($model->rating > 0) {
                        return Html::a('Пересдать', $url,['data' => [ 'pajx' => 0]]);
                    } else {
                        return Html::a('Сдать', $url,['data' => [ 'pajx' => 0]]);
                    }
                    
                }
            ],
        ],
    ]
]);?>
<?php Pjax::end(); ?>
</div>
</div>
</div>
</main>