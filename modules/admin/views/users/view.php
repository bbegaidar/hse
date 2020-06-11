<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\UserPermit;
use yii\grid\GridView;
use yii\widgets\DetailView;

use yii\bootstrap\Modal;

/* @var $this yii\web\View */

$this->title = 'Просмотр пользователя ID: ' . $model->id;
?>
<div class="row">
    <div class="col-md-12" id="teamTable">
        <h3><?= $this->title ?></h3>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'email',
                'name',
                'surname',
                'patronymic',
                'organization'
            ]
        ]); ?>

        <?php $dataProvider = new ActiveDataProvider([
            'query' => UserPermit::find()->where(['user' => $model->id]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'label' => 'Тип',
                    'value' => function ($data) {
                        if ($data->training != 0) {
                            return $data->training_title->categoryData->description;
                        } else {
                            return 'Видео урок';
                        }
                    }
                ],
                [
                    'label' => 'Название',
                    'value' => function ($data) {
                        if ($data->training != 0) {
                            return $data->training_title['title'];
                        } else {
                            return $data->video_cat_name['name'];
                        }
                    }
                ],
                [
                    'label' => 'Баллы',
                    'attribute' => 'rating'
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}',
                    'buttons' => [
                        'view' => function ($url, $permit) {
                            return Html::a(
                                '<span class="glyphicon glyphicon-eye-open"></span>',
                                'javascript:void(0);',
                                [
                                    'title' => 'Просмотреть',
                                    'onclick' => 'viewResult(event,' . $permit->id . ')'
                                ]
                            );
                        },
                    ],
                    'headerOptions' => ['style' => 'width: 60px; max-width: 60px;'],
                    'contentOptions' => ['style' => 'width: 60px; max-width: 60px;', 'class' => 'text-center'],
                ],
            ]
        ]); ?>

        <?php
        Modal::begin([
            'header' => '<h4 class="modal-title">Просмотр результатов тестирования</h4>',
            'id' => 'modalResults',
            'size' => 'modal-lg'

        ]); ?>
        <button id="downloadResult" class="btn btn-success">Скачать</button>
        <div class="content">
            <div class="inner"></div>
        </div>
        <?php
        Modal::end();
        ?>


        <?php
        $url = Url::toRoute('users/permit');

        $script = <<< JS
$('#downloadResult').on('click', function(){
       $('#modalResults .content').wordExport('Результаты');
   })
window.viewResult = function(event, id){
    event.stopPropagation()    
    $.ajax({
        method: "POST",
        url: '$url',
        data: { action: "view", id: id }
    })
    .done(function( response ) {
        if (response != false) {
            $('#modalResults .inner').html(response);
        $('#modalResults').modal('show');
        }
        
    })
}

JS;

        $this->registerJs($script, yii\web\View::POS_READY);

        ?>