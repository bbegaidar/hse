<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */

$this->title = 'Тренинги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12" id="teamTable">
        <h3><?= $this->title ?></h3>
        <p><a href="<?= Url::toRoute('trainings/create') ?>" class="btn btn-sm btn-success">Добавить тренинг</a></p>
        <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [   
                        'label' => 'Название',
                        'attribute' => 'title'
                    ],
                    [   
                        'label' => 'Дата проведения',
                        'attribute' => 'startDate',
                        'filter' => \yii\jui\DatePicker::widget(['model' => $searchModel, 'attribute' => 'startDate', 'options' => ['class' => 'form-control', 'autocomplete' => 'off'],'language' => 'ru', 'dateFormat' => 'yyyy-MM-dd'])
                    ],
                    [   
                        'label' => 'Тип тренинга',
                        'attribute' => 'trainingCategory',
                        'value' => 'categoryData.description',
                        'filter'=>ArrayHelper::map($category, 'id', 'description'),
                    ],
                    [   
                        'label' => 'Тема тестирования',
                        'attribute' => 'trainingTest',
                        'value' => 'testData.name',
                        'filter'=>ArrayHelper::map($test, 'id', 'name'),
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update} {delete}'
                    ],
                ],
            ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
<style>
.dropdown-menu {
    background-color: #ccc;
}
</style>
<?php 

$script = <<< JS

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>