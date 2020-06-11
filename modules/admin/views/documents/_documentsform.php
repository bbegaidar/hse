<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="row">
             <div class="col-md-6">
                <?= $form->field($model, 'name')->textInput() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'alias')->textInput() ?>
            </div>
        
            <div class="col-md-12">
                <?= $form->field($model, 'file')->fileInput() ?>
            </div>
        </div>
      
        <div class="form-group text-right">
            <?= Html::submitButton( ($action == 'create') ? 'Добавить' : 'Обновить', ['class' => 'btn']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    