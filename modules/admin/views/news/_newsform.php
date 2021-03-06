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
                            'content' => $form->field($model, 'titleRu')->textInput().$form->field($model, 'excerptRu')->textarea(['rows' => '2']).$form->field($model, 'descriptionRu')->textarea(['rows' => '5']),
                            'active' => true
                        ],
                        [
                            'label' => 'Казахский',
                            'content' => $form->field($model, 'titleKz')->textInput().$form->field($model, 'excerptKz')->textarea(['rows' => '2']).$form->field($model, 'descriptionKz')->textarea(['rows' => '5'])
           
                        ],
                        [
                            'label' => 'Английский',
                            'content' => $form->field($model, 'titleEn')->textInput().$form->field($model, 'excerptEn')->textarea(['rows' => '2']).$form->field($model, 'descriptionEn')->textarea(['rows' => '5'])
                        ],
                ]]);?>
            </div>
             
        
            <div class="col-md-6">
                <?= $form->field($model, 'photo')->fileInput(['id' => 'imgLoadButton']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'category')->dropDownList(ArrayHelper::map($category, 'id', 'descriptionRu')) ;?>
            </div>
            <?php if ($action == 'update') { ?>
            <div class="col-md-3">
                <?= Html::img('@web/'.$imgUrl, ['alt' => $model->titleRu, 'class' => 'img-responsive', 'id'=> 'imgForLoad']) ?>
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
    