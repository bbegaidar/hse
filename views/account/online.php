<?php

include 'header.php';


use yii\helpers\Html;
use yii\widgets\Pjax;
use app\widgets\Alert;

/* @var $this yii\web\View */

$this->title = Yii::$app->name.' - '.Yii::t('static','Online training');
$this->params['breadcrumbs'][] = Yii::t('static','Online training');
?>

<style>
    body {
        padding-top: 0;
    }

</style>
            <?php // echo $this->render('_header.php',['pageName'=> Yii::t('static','Online training')]) ?>
            
<main class="main d-flex">
<?php echo $this->render('_side_menu.php') ?>
                <?php Pjax::begin(['options'=>['class'=>'main-content d-flex']]); ?>
                <?= Alert::widget() ?>
                <?= Html::a("Обновить", ['account/online'], ['style' => 'display:none;', 'id' => 'refreshButton']) ?>
               
                    <?php
                        if (count($trainings)>0) {
                            echo $this->render('_nearest',['training' => $trainings[0]]);
                            if (count($trainings)>1){
                                echo '<div class="events-wrap swiper-container"><div class="swiper-wrapper d-flex">';
                                for ($i = 1; $i < count($trainings); $i++){
                                    echo $this->render('_webinar',['training' => $trainings[$i], 'entries' => $entries]);
                                }
                                echo '</div></div>';
                            }
                        }
                    ?>
               
            <?php Pjax::end(); ?>
            



</main>
      
<?php 

$script = <<< JS

$(document).ready(function() {
    setInterval(function(){ $("#refreshButton").click(); }, 300000);
});

 var swiperEvents = new Swiper(".swiper-container", {
        slidesPerView: 3,
        spaceBetween: 0,
        keyboard: {
          enable: true
        }
      });
   
JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>