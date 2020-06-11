<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Lang;
?>
    <?php $form = ActiveForm::begin();
        $lang=Lang::find()->all();
        $list_Lang=ArrayHelper::map($lang,'id','name');
    ?>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'lang_id')->dropDownList($list_Lang,['prompt'=>'Select...']) ?>
            </div>           
            <div class="col-md-12">
                <?=$form->field($model, 'video')->fileInput()?>
            </div>       
            <div class="col-md-12">
                <?= $form->field($model, 'is_active')->checkbox(['id' => 'is_active'])?> 
            </div>           
        </div>

        <div class="form-group text-right">
            <?=Html::submitButton(($action == 'create') ? 'Добавить' : 'Обновить', ['class' => 'btn'])?>
        </div>
    <?php ActiveForm::end();?>