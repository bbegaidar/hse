<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */

$this->title = 'Документы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12" id="teamTable">
        <h3><?= $this->title ?></h3>
        <p><!--a href="<?= Url::toRoute('documents/create') ?>" class="btn btn-sm btn-success">Добавить документ</a--></p>
        <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [   
                        'label' => 'Название',
                        'attribute' => 'name',
                        'value' => 'name',
                    ],
                    [
                        'label' => 'Алиас',
                        'attribute' => 'alias',
                        'value' => 'alias'
                    ],
                    /*[
                        'label' => 'Файл',
                        'attribute' => 'file',
                        'value' => 'file'
                    ],*/
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{download} {update} {delete}',
                        'buttons' => [
                            'download' => function ($url,$model) {
                                return Html::a(
                                    '<span class="glyphicon glyphicon-download-alt"></span>', 
                                $url, ['data'=>['pajx'=>0,'method'=>'post']]);
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