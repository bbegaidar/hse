<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="row">
            
            <div class="col-md-6">
                <?= $form->field($model, 'images')->fileInput(['accept' => 'image/*', 'id' => 'imgLoadButton']) ?>                
            </div>

            <div class="col-md-12">
                <?= $form->field($model, 'is_active')->checkbox(['id' => 'is_active'])?> 
            </div>
           
            <?php if ($action == 'update') { ?>
            <div class="col-md-3">
                <?= Html::img('@web/'.$imgUrl, ['alt' => $model->img_name, 'class' => 'img-responsive', 'id'=> 'imgForLoad']) ?>
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
    