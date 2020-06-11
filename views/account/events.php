<?php
include 'header.php';
use app\widgets\Alert;

/* @var $this yii\web\View */

$this->title = Yii::$app->name.' - '.Yii::t('static','Upcoming events');
$this->params['breadcrumbs'][] = Yii::t('static','Upcoming events');
?>

<style>
    body {
        padding-top: 0;
    }

</style>
    
            <?php // echo $this->render('_header.php',['pageName'=> Yii::t('static','Upcoming events')]) ?>
<main class="main d-flex">
<?php echo $this->render('_side_menu.php') ?>
<div class="main-content d-flex">
                    
                        <?= Alert::widget() ?>
                        <div class="events-wrap2 d-flex">
                            <?php foreach ($trainings as $training){
                                echo $this->render('_training',['training' => $training, 'entries' => $entries]);
                            }; ?>
                            <?php foreach ($video_cat as $video){
                                echo $this->render('_videos',['video' => $video, 'entries' => $record_video]);
                            }; ?>
                        </div>
                        
                        

</div>
</div>
</main>
<?php 

$script = <<< JS


   
JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>