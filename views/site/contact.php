<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name.' - '.Yii::t('static','Contact');
?>

<section class="cd-section" id="contacts">
    <div id="pageNews" class="pageNews cd-section2">
      <div class="bg ">
        <div class="bg-header">
            <img class="pc" src="/img/contacts/bg-contacts-top.png" alt="bg top">
            <img class="mob" src="/img/contacts/mob-bg-contacts-top.png" alt="bg top">
        </div>
        <?php echo $this->render('main/_header.php',['pageName' => Yii::t('static','Contact')]) ?>
        <?php echo $this->render('contact/_contact.php'); ?>
    </div>
  </section>

<?php 

$script = <<< JS

    $('document').ready(function () {
      if ($(window).width() < 1049) {
        // $('.address-wrap .btn-wrap').addClass('ownSlideInUp3');
        $('.footer-wrap .btn-wrap').addClass('ownSlideInUp4');
      } else {
        $('.address-wrap .btn-wrap').addClass('ownSlideInUp3');
        $('.footer-wrap .btn-wrap').addClass('ownSlideInUp7');
      }

    })
    
    window.aqtobe = function(){
        document.getElementById('map2').style.display = 'none';
        document.getElementById('map1').style.display = 'block';
    }
    
    window.almaty = function(){
        document.getElementById('map1').style.display = 'none';
        document.getElementById('map2').style.display = 'block';
    }

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>