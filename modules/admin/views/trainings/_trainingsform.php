<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'title')->textInput();?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'lecturer')->textInput();?>
            </div>
            <div class="col-md-12">
                <?= $form->field($model, 'description')->textarea(['rows' => '2']) ?>
            </div>
            <?php $date = date('Y-m-d'); ?>
            <div class="col-md-3">
                <?= $form->field($model, 'startDate')->input('date') ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'startTime')->input('time',['min' => '08:00', 'max'=>'18:00']) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'endDate')->input('date') ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'endTime')->input('time',['min' => '08:00', 'max'=>'18:00']) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'duration')->textInput() ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'city')->textInput() ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'place')->textInput() ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'category')->dropDownList(ArrayHelper::map($category, 'id', 'description')) ;?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'test')->dropDownList(ArrayHelper::map($test, 'id', 'name')) ;?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'photo')->fileInput(['id' => 'imgLoadButton']) ?>
            </div>
            <?php if ($action == 'update') { ?>
            <div class="col-md-3">
                <?= Html::img('@web/'.$imgUrl, ['alt' => $model->title, 'class' => 'img-responsive', 'id'=> 'imgForLoad']) ?>
                <?php 
                    $script = <<< JS
                    $("#imgLoadButton").on('input', function (e) {
                        var files = this.files
                        for (var i = 0, f; f = files[i]; i++) {
                            if (!f.type.match('image.*')) continue;
                            var fr = new FileReader()
                            fr.onload = (function (theFile) {
                                return function (e) {
                                    $("#imgForLoad").attr("src", this.result)
                                }
                        })(f)
                        fr.readAsDataURL(f)    }
                    });

JS;

                    $this->registerJs($script, yii\web\View::POS_READY);

                ?> 
            </div>
            <?php } ?>
        </div>
      
        <div class="form-group text-right">
            <?= Html::submitButton( ($action == 'create') ? 'Добавить' : 'Обновить', ['class' => 'btn']) ?>
        </div>
    <?php ActiveForm::end(); ?>