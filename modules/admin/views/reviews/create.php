<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Добавление отзыва';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12" id="reviewsTable">
        <h3><?= $this->title ?></h3>
        <p><a href="<?= Url::toRoute('reviews/') ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Назад к отзывам</a></p>
        <?php echo $this->render('_reviewsform', ['model' => $model, 'category' => $category, 'action' => 'create']);?>
    </div>
</div>

<?php 

$script = <<< JS

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>