<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Редактирование специалиста';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12" id="teamTable">
        <h3><?= $this->title ?></h3>
        <p><a href="<?= Url::toRoute('team/') ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Назад к команде</a></p>
        <?php echo $this->render('_teamform', ['model' => $model, 'action'=>'update', 'imgUrl' => $imgUrl]);?>
    </div>
</div>

