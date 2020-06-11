<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12" id="reviewsTable">
        <h3><?= $this->title ?></h3>
        <p><a href="<?= Url::toRoute('reviews/create') ?>" class="btn btn-sm btn-success">Добавить отзыв</a></p>
        <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [   
                        'label' => 'ФИО',
                        'attribute' => 'reviewerName',
                        'value' => 'ruContent.reviewer',
                    ],
                    [   
                        'label' => 'Отзыв',
                        'attribute' => 'reviewContent',
                        'value' => 'ruContent.review',
                    ],
                    [
                        'label' => 'Категория',
                        'attribute' => 'category',
                        'value' => 'categoryData.descriptionRu',
                        'filter'=>ArrayHelper::map($categories, 'id', 'descriptionRu'),
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

<?php 

$script = <<< JS

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>