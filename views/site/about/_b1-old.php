<main><div class="showcase-wrap animated fadeInLeft opacity0">
  <div class="showcase-logo b1__logo">
    <img src="/img/about/b1/sh-logo.png" alt="">
  </div>
  <div class="sh-text">
    <h2 class="b1-text b1-text_standart b1-text_blue"><?= $page->content->subtitle ?></h2>
  </div>
  <div class="sh-w-line"></div>
  <div class="sh-text sh-text-2 b1-text">
    <?= $page->content->description ?>
  </div>
</div>
<!-- video begin -->
<div class="b1-video">
  <div class="b1-video__title">
    <h3><?= Yii::t('about', 'Video message from the head of the company') ?></h3>
  </div>
  <div class="b1-video__image-wrap">
    <img src="/img/about/b1/b1__kindle.png" alt="two semicolon">
  </div>
  <!-- button and image on video onclick="play1()"-->
  <div id="b1__button" class="b1-video__cover">
    <img id="b1__video-button" class="b1-video__button animated pulse-button slower infinite"
      src="/img/about/b1/b1__video-button.png" alt="">
  </div>
  <!-- <div id="divPlayer1" class="b1-video__item"></div> -->
  <video id="divPlayer1" type="video/mp4" class="b1-video__item" src="/img/111.mp4" controls></video>
</div>
<!-- video end -->
<div class="b1-bottom-text">
  <p class="b1-bottom-text__top"><?= Yii::t('about', 'Contact a specialist') ?></p>
  <p class="b1-bottom-text__bottom"><?= Yii::t('about', 'for a free consultation') ?></p>
</div>

<!-- <div class="btn-wrap animated ownSlideInUp opacity0 delay-2s">
    <img src="/img/about/b1/b1__button.png" alt="">
  </div> -->
<div class="btn-wrap-clone pos-absolute"></div>
<div class="btn-wrap pos-absolute animated delay-1s ownSlideInUp5 opacity0 pc">
  <a href="#" class="neon-btn neon-btn-normal neon-btn-with-icon" data-type="modal" data-target="consultation">
    <img class="btn-icon" src="/img/btn-icons/icon-consultation.png" alt="icon pen"> <?= Yii::t('about', 'To get the consultation') ?></a>
</div>
<div class="btn-wrap pos-absolute animated delay-1s ownSlideInUp5-mob opacity0 mob">
    <a href="#" class="neon-btn neon-btn-normal neon-btn-with-icon" data-type="modal" data-target="consultation">
      <img class="btn-icon" src="/img/btn-icons/icon-consultation.png" alt="icon pen"> <?= Yii::t('about', 'To get the consultation') ?></a>
  </div>

<!-- <div class="sh-btn-line"></div>
<div class="point-wrap animated bounceInLeft delay-1s">
  <div class="point"></div>
</div> -->

<!-- bottom lines begin -->
<div class="bg-line-1">
  <img src="/img/about/b1/b1__line1.png" alt="Background line">
</div>
<div class="bg-line-2">
  <img src="/img/about/b1/b1__line2_1.png" alt="Background line">
</div>
<!-- bottom lines end -->
<!-- bottom mobile lines begin -->
<div class="bg-mob-line-1">
  <img src="/img/about/b1/b1-mob__line-1.png" alt="Background line">
</div>
<div class="bg-mob-line-2">
  <img src="/img/about/b1/b1-mob__line-2.png" alt="Background line">
</div>
<!-- bottom mobile lines end -->
<div class="ray-wrap-1">
  <div class="ray ray-1 animated slower flash infinite"></div>
  <div class="ray ray-2 animated slower flash infinite"></div>
</div>
<div class="ray-wrap-2">
  <div class="ray ray-4 animated slower flash infinite"></div>
</div>
</main>