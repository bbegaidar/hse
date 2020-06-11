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
                            'content' => $form->field($model, 'questionRu')->textarea(['rows' => '2']).$form->field($model, 'answerRu')->textarea(['rows' => '2']),
                            'active' => true
                        ],
                        [
                            'label' => 'Казахский',
                            'content' => $form->field($model, 'questionKz')->textarea(['rows' => '2']).$form->field($model, 'answerKz')->textarea(['rows' => '2'])
           
                        ],
                        [
                            'label' => 'Английский',
                            'content' => $form->field($model, 'questionEn')->textarea(['rows' => '2']).$form->field($model, 'answerEn')->textarea(['rows' => '2'])
                        ],
                ]]);?>
            </div>
        </div>
        <div class="form-group text-right">
            <?= Html::submitButton( ($action == 'create') ? 'Добавить' : 'Обновить', ['class' => 'btn']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    