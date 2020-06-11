<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */

$this->title = 'Фотогалерея';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12" id="teamTable">
        <h3><?= $this->title ?></h3>
        <p><a href="<?= Url::toRoute('logo/create') ?>" class="btn btn-sm btn-success">Добавить фото</a></p>
        <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],                   
                    [
                        'label' => 'Изображение',
                        'format' => 'raw',
                        'value' => function($data) {                            
                            return Html::img('/'.$data->img,[
                                        'style' => 'height:75px;'
                                    ]);;
                        },
                    ],
                    [
                        'label' => 'Статус',
                        'attribute' => 'is_active',
                        'value' => function ($data) {
                           return ($data->is_active == 1) ? "Активна" : "Неактивна";
                        },
                        'filter'=>['1'=>'Активна', '0'=>'Неактивна'],
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{status} {update} {delete}',
                        'buttons' => [
                            'status' => function ($url,$model) {
                                return Html::a(
                                    '<span class="glyphicon '.($model->is_active == 1 ? 'glyphicon-ok-sign' : 'glyphicon-minus-sign').'"></span>', 
                                $url,['data' => ['pajx' => 0, 'method' => 'post'], 'aria' => ['label' => 'Изменить статус']]);
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