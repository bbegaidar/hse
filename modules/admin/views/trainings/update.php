<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Редактирование тренинга';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12" id="newsTable">
        <h3><?= $this->title ?></h3>
        <p><a href="<?= Url::toRoute('trainings/') ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Назад к тренингам</a></p>
        <?php echo $this->render('_trainingsform', ['model' => $model,'category'=> $category, 'imgUrl' => $imgUrl, 'test'=>$test,'action'=>'update']);?>
    </div>
</div>

