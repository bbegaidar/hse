<?php

use yii\helpers\Html;

?>
<div class="upcoming-events">
    <div class="item-top">
        <ul>
            <li>
                <p><?php if ( $training->category == 1 ) { echo Yii::t('static','Webinar topic'); } else if  ( $training->category == 2 ) { echo Yii::t('static','Seminar topic'); } else { echo Yii::t('static','Course topic'); } ?></p>
                <p><?= $training->title ?></p>
            </li>
            <li>
                <p><?=  Yii::t('static','Event date') ?></p>
                <?php if ( $training->category == 3 ) { echo date('d', strtotime($training->startDate)).' - '.date('d.m.Y', strtotime($training->endDate));} else { echo date('d.m.Y', strtotime($training->startDate)); } ?>
            </li>
            <li>
                <p><?=  Yii::t('static','Start time') ?></p>
                <p><?= date('H:i', strtotime($training->startTime)) ?></p>
            </li>
            <li>
                <p><?=  Yii::t('static','End time') ?></p>
                <p><?= date('H:i', strtotime($training->endTime)) ?></p>
            </li>
            <li>
                <p><?=  Yii::t('static','Teacher') ?></p>
                <p><?= $training->lecturer ?></p>
            </li>
        </ul>
    </div>
    <div class="item-bottom">
<?php 

if (in_array( $training->id, $entries)) {
    echo Html::tag('span', Yii::t('static', 'You are already recorded'));
} else {
    echo Html::a(Yii::t('static', 'Submit your application'), ['account/entry','id' => $training->id], ['data'=>['method' => 'post']]);
}
?>
    </div>
</div>