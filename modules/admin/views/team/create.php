<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Добавление специалиста';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12" id="teamTable">
        <h3><?= $this->title ?></h3>
        <p><a href="<?= Url::toRoute('team/') ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Назад к команде</a></p>
        <?php echo $this->render('_teamform', ['model' => $model, 'action'=>'create']);?>
    </div>
</div>

<?php 

$script = <<< JS

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>