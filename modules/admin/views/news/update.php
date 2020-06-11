<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Редактирование новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12" id="newsTable">
        <h3><?= $this->title ?></h3>
        <p><a href="<?= Url::toRoute('news/') ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Назад к новостям</a></p>
        <?php echo $this->render('_newsform', ['model' => $model,  'category' => $category, 'action'=>'update', 'imgUrl' => $imgUrl]);?>
    </div>
</div>

