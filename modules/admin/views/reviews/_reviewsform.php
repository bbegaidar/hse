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
                            'content' => $form->field($model, 'reviewerRu')->textInput().$form->field($model, 'companyRu')->textInput().$form->field($model, 'reviewRu')->textarea(['rows' => '2']),
                            'active' => true
                        ],
                        [
                            'label' => 'Казахский',
                            'content' => $form->field($model, 'reviewerKz')->textInput().$form->field($model, 'companyKz')->textInput().$form->field($model, 'reviewKz')->textarea(['rows' => '2'])
           
                        ],
                        [
                            'label' => 'Английский',
                            'content' => $form->field($model, 'reviewerEn')->textInput().$form->field($model, 'companyEn')->textInput().$form->field($model, 'reviewEn')->textarea(['rows' => '2'])
                        ],
                ]]);?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'category')->dropDownList(ArrayHelper::map($category, 'id', 'descriptionRu')) ;?>
            </div>
        </div>
      
        <div class="form-group text-right">
            <?= Html::submitButton( ($action == 'create') ? 'Добавить' : 'Обновить', ['class' => 'btn']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    