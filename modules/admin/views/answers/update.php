<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Редактирование вопроса';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12" id="answersTable">
        <h3><?= $this->title ?></h3>
        <p><a href="<?= Url::toRoute('answers/') ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Назад к вопросам</a></p>
        <?php echo $this->render('_answersform', ['model' => $model, 'action' => 'update']);?>
    </div>
</div>

