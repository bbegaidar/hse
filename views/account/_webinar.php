<?php

use yii\helpers\Html;

?>
<div class="upcoming-events swiper-slide">
    <div class="item-top">
        <ul>
            <li>
                <p><?= Yii::t('static','Webinar topic') ?></p>
                <p><?= $training->title ?></p>
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
        <ul>
            <li>
                <p><?=  Yii::t('static','Event date') ?></p>
                <p><?= date('d.m.Y', strtotime($training->startDate)) ?></p>
            </li>

<?php 
        date_default_timezone_set('Asia/Almaty');
        $date = new DateTime(date('Y-m-d')) ;
        $date2 = new DateTime($training->startDate);
        $interval = $date->diff($date2);
        $days = $interval->format('%R%a');
?>

<li><p><?php 
    if ($days > 0) { 
        echo Yii::t('static','Days to start').': '.substr($days,1);
    } else if ($days == 0) {
        $time = new DateTime(date('H:i')) ;
        $time2 = new DateTime($training->startTime);
        $interval = $time->diff($time2);
        $hours = $interval->format('%R%h');
        $minutes = $interval->format('%R%i');
        
        if ($hours >= 3) {
            echo Yii::t('static','Today');
        } else if (($hours < 3)&&( $minutes > 0 )) {
            echo Yii::t('static','Coming soon');
        } else if (($hours <= 0)&&( $minutes <= 0 )) {
            $time = new DateTime(date('H:i')) ;
            $time2 = new DateTime($training->endTime);
            $interval = $time->diff($time2);
            $hours = $interval->format('%R%h');
            $minutes = $interval->format('%R%i');
            if(($hours >= 0)&&( $minutes > 0 )) {
                echo Yii::t('static','Passes at the moment');
            } else {
                echo Yii::t('static','Passed'); 
            }
        }
    } else { 
        echo Yii::t('static','Passed'); 
    }  ?></p>
            </li>
        </ul>
    </div>
</div>

