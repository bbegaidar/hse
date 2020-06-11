<?php
use yii\helpers\Html;
?>

<div class="item item-6">
    <ul class="lang-wrap d-flex">
        <li class="lang active"><?= $current->cutName;?></li>
        <?php foreach ($langs as $lang):?>
            <li class="lang">
                <?= Html::a($lang->cutName, '/'.$lang->url.Yii::$app->getRequest()->getLangUrl()) ?>
            </li>
        <?php endforeach;?>
    </ul>
</div>