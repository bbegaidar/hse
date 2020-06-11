<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Редактирование видео (о компаний)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12" id="newsTable">
        <h3><?= $this->title ?></h3>
        <p><a href="<?= Url::toRoute('video-about-company/') ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Назад к видео (о компаний)</a></p>
        <?php echo $this->render('_form', ['model' => $model,'action'=>'update']);?>
    </div>
</div>

