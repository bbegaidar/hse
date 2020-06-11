<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12" id="teamTable">
        <h3><?= $this->title ?></h3>
        <p><a href="<?= Url::toRoute('news/create') ?>" class="btn btn-sm btn-success">Добавить новость</a></p>
        <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [   
                        'label' => 'Название',
                        'attribute' => 'newsTitle',
                        'value' => 'ruContent.title',
                    ],
                    [
                        'label' => 'Категория',
                        'attribute' => 'category',
                        'value' => 'categoryData.descriptionRu',
                        'filter'=>ArrayHelper::map($categories, 'id', 'descriptionRu'),
                    ],
                     [
                        'label' => 'Дата публикации',
                        // 'value' => 'date',
                        'filter' => \yii\jui\DatePicker::widget(['model' => $searchModel, 'attribute' => 'date', 'options' => ['class' => 'form-control', 'autocomplete' => 'off'],'language' => 'ru', 'dateFormat' => 'yyyy-MM-dd'])
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{site/news} {update} {delete}',
                        'buttons' => [
                            'site/news' => function ($url,$model) {
                                return Html::a(
                                    '<span class="glyphicon glyphicon-eye-open"></span>', 
                                $url);
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