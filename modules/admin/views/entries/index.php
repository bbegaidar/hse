<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */

$this->title = 'Записи на тренинги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12" id="teamTable">
        <h3><?= $this->title ?></h3>
        <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'label' => 'Тренинг',
                        'attribute' => 'training',
                        'value' => 'trainingData.title',
                        'filter'=>ArrayHelper::map($trainings, 'id', 'title'),
                    ],
                    [   
                        'label' => 'Участник',
                        'attribute' => 'username',
                        'value' => 'userData.username',
                    ],
                     
                     [
                        'label' => 'Участие',
                        'attribute' => 'confirm',
                        'value' => function ($data) {
                           return ($data->confirm == 1) ? "Подтверждено" : "Не подтверждено";
                        },
                        'filter'=>['1'=>'Подтверждено', '0'=>'Не подтверждено'],
                    ],
                    [
                        'label' => 'Посещение',
                        'attribute' => 'visited',
                        'value' => function ($data) {
                           return ($data->visited == 1) ? "Подтверждено" : "Не подтверждено";
                        },
                        'filter'=>['1'=>'Подтверждено', '0'=>'Не подтверждено'],
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{confirm} {visited} {delete}',
                        'buttons' => [
                            'confirm' => function ($url,$model) {
                                return Html::a(
                                    '<span class="glyphicon '.($model->confirm == 1 ? 'glyphicon-ok-sign' : 'glyphicon-minus-sign').'"></span>', 
                                $url,['data' => ['pajx' => 0, 'method' => 'post'], 'title' => 'Изменить участие', 'aria' => ['label' => 'Изменить участие']]);
                             },
                             'visited' => function ($url,$model) {
                                return Html::a(
                                    '<span class="glyphicon '.($model->visited == 1 ? 'glyphicon-ok-sign' : 'glyphicon-minus-sign').'"></span>', 
                                $url,['data' => ['pajx' => 0, 'method' => 'post'], 'title' => 'Изменить посещение', 'aria' => ['label' => 'Изменить посещение']]);
                             }
                        ],
                    ],
                ],
            ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>

<?php 

$script = <<< JS

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>