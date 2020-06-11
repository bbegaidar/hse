<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Tabs;
?>
<script src="/js1/tinymce/tinymce.min.js"></script>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="row">
            <div class="col-md-12">
                <?= Tabs::widget([
                    'items' => [
                        [
                            'label' => 'Русский',
                            'content' => $form->field($model, 'titleRu')->textInput().$form->field($model, 'subtitleRu')->textarea(['rows' => '2', 'class' => 'tinymce_plugin']).$form->field($model, 'descriptionRu')->textarea(['rows' => '5', 'class' => 'tinymce_plugin']),
                            'active' => true
                        ],
                        [
                            'label' => 'Казахский',
                            'content' => $form->field($model, 'titleKz')->textInput().$form->field($model, 'subtitleKz')->textarea(['rows' => '2', 'class' => 'tinymce_plugin']).$form->field($model, 'descriptionKz')->textarea(['rows' => '5', 'class' => 'tinymce_plugin'])
           
                        ],
                        [
                            'label' => 'Английский',
                            'content' => $form->field($model, 'titleEn')->textInput().$form->field($model, 'subtitleEn')->textarea(['rows' => '2', 'class' => 'tinymce_plugin']).$form->field($model, 'descriptionEn')->textarea(['rows' => '5', 'class' => 'tinymce_plugin'])
                        ],
                ]]);?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'name')->textInput();?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'url')->textInput();?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'photos[]')->fileInput(['multiple' => true, 'accept' => 'image/*','onchange' => 'readUrls(this);']) ?>    
            </div>
        </div>
      
        <div class="form-group text-right">
            <?= Html::submitButton( ($action == 'create') ? 'Добавить' : 'Обновить', ['class' => 'btn']) ?>
        </div>
    <?php ActiveForm::end(); ?>

<script>
tinymce.init({
    selector: '.tinymce_plugin',
    plugins: [
        'preview', 'code'
    ],
    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | preview code'
});
</script>    