<?php 
use yii\helpers\Url;
?>

<main>
    <div class="sign-up-wrap">
  <div class="form-wrap">
    <div class="title-wrap">
      <h2><?= Yii::t('main','Sign-up')?></h2>
      <p><?= Yii::t('main','for on-line training on the updated program!')?></p>
    </div>
    
    <!-- начало ПОЛУЧИТЬ ДАННЫЕ О МЕРОПРИЯТИИ С БЭКА -->
    
    <div class="form form-1">
      <div class="icon-wrap">
        <img src="/img/main-page/sign-up/icon-1.png" alt="Icon">
      </div>
      <div class="subject-wrap">
        <p><?= Yii::t('main', 'Topic') ?></p>
      </div>
      <div class="text-wrap">
        <p><?= $training->title ?></p>
      </div>
    </div>
    <div class="form form-2">
      <div class="icon-wrap">
        <img src="/img/main-page/sign-up/icon-2.png" alt="Icon">
      </div>
      <div class="subject-wrap">
        <p><?= Yii::t('main', 'Start') ?></p>
      </div>
      <div class="text-wrap text-wrap-2">
        <p><?= date('d.m' ,strtotime($training->startDate)) ?></p>
      </div>
      <div class="text-wrap text-wrap-3">
        <p><?= date('H:i' ,strtotime($training->startTime)) ?></p>
      </div>
    </div>
    <div class="btn-wrap">
        <div class="btn animated opacity0">
            <?php if (!Yii::$app->user->isGuest) { ?>
                <a href="<?= Url::toRoute(['account/entry','id' => $training->id]) ?>" class="neon-btn neon-btn-normal neon-btn-with-icon" data-method="post"><img class="btn-icon" src="/img/btn-icons/icon-pen.png" alt="icon pen"> <?= Yii::t('main','Sign up') ?></a>
            <?php } else { ?> 
                <a href="<?= Url::toRoute(['site/login']) ?>" class="neon-btn neon-btn-normal neon-btn-with-icon"><img class="btn-icon" src="/img/btn-icons/icon-pen.png" alt="icon pen"> <?= Yii::t('static','Register') ?></a>
            <?php }?>
        </div>
        <div class="btn-line">
            <div class="line-point"></div>
        </div>
      <div class="point-wrap animated  delay-s opacity0"></div>
    </div>
  </div>
  
  <!-- конец ПОЛУЧИТЬ ДАННЫЕ О МЕРОПРИЯТИИ С БЭКА -->
  
  <div class="bg-lines">
    <div class="bg-line-1">
      <img src="/img/main-page/sign-up/bg-line-1.png" alt="BG lines">
    </div>
    <div class="bg-line-2">
      <img src="/img/main-page/sign-up/bg-line-2.png" alt="BG lines">
    </div>
    <div class="bg-line-3">
      <img src="/img/main-page/sign-up/bg-line-3.png" alt="BG lines">
    </div>
  </div>
  <div class="ray-wrap">
    <div class="ray-wrap-1 animated slower flash infinite">
      <div class="ray ray-1"></div>
      <div class="ray ray-2"></div>
    </div>
    <div class="ray-wrap-2 animated slower flash infinite">
      <div class="ray ray-3"></div>
      <div class="ray ray-4"></div>
    </div>
  </div>
  <div class="bg-books">
    <img src="/img/main-page/sign-up/books.png" alt="Books">
  </div>
  <div class="bg-laptop">
    <img src="/img/main-page/sign-up/laptop.png" alt="Laptop">
  </div>
</div>
</main>


<?php 

$script = <<< JS

$(window).mousemove(function (e) {
    var xpos = e.clientX;
    var ypos = e.clientY;

    $(".bg-books").css("bottom", ((10 - (ypos * 2 / 750) + (xpos * 2 / 800)) + "%"));
    $(".bg-books").css("left", ((10 + (xpos / 1600) + (ypos * 2 / 1650)) + "%"));
    $(".bg-laptop").css("bottom", ((20 - (ypos * 2 / 750) + (xpos * 2 / 800)) + "%"));
    $(".bg-laptop").css("right", ((7 + (xpos / 1600) + (ypos * 2 / 1650)) + "%"));
  });
JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>