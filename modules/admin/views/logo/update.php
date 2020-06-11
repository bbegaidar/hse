<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Редактирование фото';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12" id="newsTable">
        <h3><?= $this->title ?></h3>
        <p><a href="<?= Url::toRoute('logo/') ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Назад к фотогалерее</a></p>
        <?php echo $this->render('_form', ['model' => $model,  'action'=>'update', 'imgUrl' => $imgUrl]);?>
    </div>
</div>

