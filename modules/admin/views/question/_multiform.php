<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title").each(function(index) {
        jQuery(this).html("Ответ: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title").each(function(index) {
        jQuery(this).html("Ответ: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>


<div class="create-question-form">
   
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    
    <?= $form->field($model, 'test')->dropDownList(ArrayHelper::map($tests, 'id', 'name')) ;?>
    <?= $form->field($model, 'question')->textInput() ?>
    <?= $form->field($model, 'type')->checkbox([ 'value' => '1']) ?>
    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', 
        'widgetBody' => '.container-items', 
        'widgetItem' => '.item', 
        'limit' => 5, 
        'min' => 2, 
        'insertButton' => '.add-item' , 
        'deleteButton' => '.remove-item' , 
        'model' => $modelsAnswer[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'weight',
            'volume',
            'type',
            'count',
            'cost',
            'recipient_name',
            'recipient_email',
            'recipient_address',
            'recipient_phone',
        ],
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
                <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Добавить вариант ответа</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($modelsAnswer as $index => $modelAnswer): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title">Ответ: <?= ($index + 1) ?></span>
                        <?php if (!Yii::$app->user->isGuest) { ?>
                            <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        <?php }  ?>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (!$modelAnswer->isNewRecord) {
                                echo Html::activeHiddenInput($modelAnswer, "[{$index}]id");
                            }
                        ?>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-10">
                                        <?= $form->field($modelAnswer, "[{$index}]answer")->textInput()->label(false) ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?= $form->field($modelAnswer, "[{$index}]result")->checkbox([ 'value' => '1']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>

    <div class="form-group  text-right">
        <?= Html::submitButton( ($action == 'create') ? 'Добавить' : 'Обновить', ['class' => 'btn']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>