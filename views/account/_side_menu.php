<?php use yii\widgets\Menu; ?>

<aside class="d-flex">
<div class="text-wrap pc">
<?= Menu::widget([
    'items' => [
        ['label' => Yii::t('static', 'My profile'), 'url' => ['account/index'], 'options'=>['class' => 'acc-item acc-item-1']],
        ['label' => Yii::t('static', 'My tests'), 'url' => ['account/tests'], 'options'=>['class' => 'acc-item acc-item-2']],
        ['label' => Yii::t('static', 'Online training'), 'url' => ['account/online'], 'options'=>['class' => 'acc-item acc-item-3']],
        ['label' => Yii::t('static', 'Video lessons'), 'url' => ['account/videos'], 'options'=>['class' => 'acc-item acc-item-4']],
        ['label' => Yii::t('static', 'Upcoming events'), 'url' => ['account/events'], 'options'=>['class' => 'acc-item acc-item-4']],        
    ],
    'activeCssClass' => 'active',
    'encodeLabels' =>'false',
]);?>
</div>
</aside>

