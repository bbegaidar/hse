<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\VideosCategory;
?>
    <?php $form = ActiveForm::begin();
        $category=VideosCategory::find()->all();
        $listCategory=ArrayHelper::map($category,'id','name');
    ?>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'category_id')->dropDownList($listCategory,['prompt'=>'Select...']) ?>
            </div>           
            <div class="col-md-12">
                <?=$form->field($model, 'name')->textInput(['rows' => '2'])?>
            </div>           
            <div class="col-md-12">
                <?=$form->field($model, 'url')->textInput(['rows' => '2'])?>
            </div>                      
        </div>

        <div class="form-group text-right">
            <?=Html::submitButton(($action == 'create') ? 'Добавить' : 'Обновить', ['class' => 'btn'])?>
        </div>
    <?php ActiveForm::end();?>