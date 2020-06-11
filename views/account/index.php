<?php
include 'header.php';

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\widgets\Alert;

/* @var $this yii\web\View */

$this->title = Yii::$app->name.' - '.Yii::t('static','My profile');
$this->params['breadcrumbs'][] = Yii::t('static','My profile');
?>

<style>
    body {
        padding-top: 0;
    }

</style>

            
            
            <main class="main d-flex">
            <?php echo $this->render('_side_menu.php') ?>
            <div class="main-content d-flex">
            <div class="prof-wrap item-wrap-pc pc">
            
            <?= Alert::widget() ?>
                        
            <div class="reg-wrap">
                            <?php $form = ActiveForm::begin(['enableAjaxValidation' => true,'options' => ['enctype' => 'multipart/form-data','class'=>'form-wrap d-flex']]); ?>
                            
                                <div class="p-r-l">
                                    <?= $form->field($model, 'name',['options'=>['class'=>'form-group  input-wrap'],'labelOptions' => [ 'class' => 'input-title']])->textInput() ?>
                                    <?= $form->field($model, 'surname',['options'=>['class'=>'form-group  input-wrap'],'labelOptions' => [ 'class' => 'input-title']])->textInput() ?>
                                    <?= $form->field($model, 'patronymic',['options'=>['class'=>'form-group  input-wrap'],'labelOptions' => [ 'class' => 'input-title']])->textInput() ?>
                                    <?= $form->field($model, 'email',['options'=>['class'=>'form-group  input-wrap'],'labelOptions' => [ 'class' => 'input-title']])->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'email']])->textInput() ?>
                                </div>
                                <div class="p-r-l">
                                    <?= $form->field($model, 'phone',['options'=>['class'=>'form-group  input-wrap'],'labelOptions' => [ 'class' => 'input-title']])->widget(\yii\widgets\MaskedInput::className(), ['mask' => '+ 9 ( 999 ) 999 - 9999'])->textInput() ?>
                                    <?= $form->field($model, 'organization',['options'=>['class'=>'form-group  input-wrap'],'labelOptions' => [ 'class' => 'input-title']])->textInput() ?>
                                    <?= $form->field($password, 'password',['options'=>['class'=>'form-group  input-wrap'],'labelOptions' => [ 'class' => 'input-title']])->passwordInput(['autocomplete'=>'off'])->label(Yii::t('static', 'New password')) ?>
                                    <?= $form->field($password, 'confirmpassword',['options'=>['class'=>'form-group  input-wrap'],'labelOptions' => [ 'class' => 'input-title']])->passwordInput(['autocomplete'=>'off']) ?>
                                </div>
                            
                            <div class="p-r-2">
                                <?= Html::submitButton(Yii::t('static','Update'), ['class' => 'btn','disabled'=>'disabled', 'id' =>'updateBtn']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
            </div>


</div>
</div>
</div>
</main>




<?php 

$script = <<< JS

$('input').on('input', function(){
    $('#updateBtn').removeAttr('disabled');
})
   
JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>