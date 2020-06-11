<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Tabs;
?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="row">
            <div class="col-md-12">
                <?= Tabs::widget([
                    'items' => [
                        [
                            'label' => 'Русский',
                            'content' => $form->field($model, 'nameRu')->textInput().$form->field($model, 'descriptionRu')->textarea(['rows' => '3']),
                            'active' => true
                        ],
                        [
                            'label' => 'Казахский',
                            'content' => $form->field($model, 'nameKz')->textInput().$form->field($model, 'descriptionKz')->textarea(['rows' => '3'])
           
                        ],
                        [
                            'label' => 'Английский',
                            'content' => $form->field($model, 'nameEn')->textInput().$form->field($model, 'descriptionEn')->textarea(['rows' => '3'])
                        ],
                ]]);?>
            </div>
            <?php if ($action == 'update') { ?>
            <div class="col-md-3">
                <?= Html::img('@web/'.$imgUrl, ['alt' => $model->nameRu, 'class' => 'img-responsive', 'id'=> 'imgForLoad']) ?>
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
            <div class="col-md-12">
                <?=$form->field($model, 'email')->textInput()?>
            </div>
            <div class="col-md-12">
                <?=$form->field($model, 'phone')->textInput()?>
            </div>
            <div class="col-md-12">
                <?=$form->field($model, 'mob_phone')->textInput()?>
            </div>
            
            <div class="col-md-12">
                <?= $form->field($model, 'photo')->fileInput(['id'=> 'imgLoadButton']) ?>
            </div>
        </div>
        <?php ($action == 'create') ? $btnTitle = 'Добавить' : ($action == 'update') ? $btnTitle = 'Обновить' : $btnTitle = 'Null'; ?>
        <div class="form-group text-right">
            <?= Html::submitButton( $btnTitle, ['class' => 'btn']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    
   
    
    
    