<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Test;
?>
    <?php $form = ActiveForm::begin();
        $test=Test::find()->all();
        $listTest=ArrayHelper::map($test,'id','name');
    ?>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'test_id')->dropDownList($listTest,['prompt'=>'Select...']) ?>
            </div>           
            <div class="col-md-12">
                <?=$form->field($model, 'name')->textInput(['rows' => '2'])?>
            </div>       
            <div class="col-md-12">
                <?=$form->field($model, 'description')->textarea(['rows' => '6'])?>
            </div>           
        </div>

        <div class="form-group text-right">
            <?=Html::submitButton(($action == 'create') ? 'Добавить' : 'Обновить', ['class' => 'btn'])?>
        </div>
    <?php ActiveForm::end();?>