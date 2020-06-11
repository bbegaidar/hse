<?php

use yii\helpers\Html;

?>
<div class="upcoming-events">
    <div class="item-top">
        <ul>
            <li>
                <p><?php if ( $video->name != null ) { echo Yii::t('static','Video Lesson topic'); } ?></p>
                <p><?= $video->name ?></p>
            </li>
            <li>
                <p><?=  Yii::t('static','Description') ?></p>
                <?php if ($video->description != null) { echo substr($video->description, 0, 80) . '...'; } else { echo ''; }?>
            </li>
        </ul>
    </div>
    <div class="item-bottom">
<?php 

if (in_array( $video->id, $entries)) {
    echo Html::tag('span', Yii::t('static', 'You are already recorded'));
} else {
    echo Html::a(Yii::t('static', 'Submit your application'), ['account/record','id' => $video->id], ['data'=>['method' => 'post']]);
}
?>
    </div>
</div>