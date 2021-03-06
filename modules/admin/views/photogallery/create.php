<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Добавление новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12" id="newsTable">
        <h3><?= $this->title ?></h3>
        <p><a href="<?= Url::toRoute('photogallery/') ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Назад к фотогалерее</a></p>
        <?php echo $this->render('_photogalleryform', ['model' => $model,'action' => 'create', 'listCategory' => $listCategory]);?>
    </div>
</div>

<?php 

$script = <<< JS

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>