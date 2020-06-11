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
                            'content' => $form->field($model, 'title')->textInput().$form->field($model, 'description_rus')->textarea(['rows' => '6', 'class' => 'tinymce_plugin']),
                            'active' => true
                        ],
                        [
                            'label' => 'Казахский',
                            'content' => $form->field($model, 'title_kaz')->textInput().$form->field($model, 'description_kaz')->textarea(['rows' => '6', 'class' => 'tinymce_plugin'])
           
                        ],
                        [
                            'label' => 'Английский',
                            'content' => $form->field($model, 'title_eng')->textInput().$form->field($model, 'description_eng')->textarea(['rows' => '6', 'class' => 'tinymce_plugin'])
                        ],
                ]]);?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'date')->input('date', ['value' => $model->date]) ?>            
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map($listCategory, 'id', 'name')) ;?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'photos[]')->fileInput(['multiple' => true, 'accept' => 'image/*', 'id' => 'imgLoadButton']) ?>
            </div>
           
            <?php if ($action == 'update' && gettype($action) == 'array') { ?>            
                <?php foreach ($imgUrl as $img): ?>
                    <!-- <div class="col-md-4" style="display: flex;">
                        <?= Html::img('@web/'.$img, ['alt' => $model->title, 'class' => 'img-responsive', 'id'=> 'imgForLoad']) ?>
                    </div> -->
                <?php endforeach; ?>                            
            <?php } ?>
        </div>
      
        <div class="form-group text-right">
            <?= Html::submitButton( ($action == 'create') ? 'Добавить' : 'Обновить', ['class' => 'btn']) ?>
        </div>
    <?php ActiveForm::end(); ?>

<style>
.dropdown-menu {
    background-color: #ccc;
}
</style>

<script>
tinymce.init({
    selector: '.tinymce_plugin',
    plugins: [
        'preview', 'code'
    ],
    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | preview code'
});
</script>  