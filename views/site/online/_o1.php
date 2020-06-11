<main>
    <div class="showcase-wrap animated fadeInLeft opacity0">
  <div class="showcase-logo c1__logo">
    <img src="/img/online/o1/sh-logo.png" alt="">
  </div>
  <div class="sh-text">
    <h1 class="c1-header"><?= $page->content->title ?></h1>
    <h2 class="c1-text c1-text_standart c1-text_blue"><?= $page->content->subtitle ?></h2>
  </div>
  <div class="sh-w-line"></div>
  <div class="sh-text sh-text-2 c1-text"><?= $page->content->description ?></div>
</div>
<div class="c1-hero swiper-container swiper-container_c1">
  <div class="swiper-wrapper">
    <div class="swiper-slide">
      <div class="c1-hero__item">
        <p class="c1-hero__number">01</p>
        <img class="c1-hero__plashka" src="/img/online/o1/c1-plashka.svg" alt="">
        <img class="c1-hero__photo" src="/img/online/o1/c1__block-photo.png" alt="">
      </div>
    </div>
    <div class="swiper-slide">
      <div class="c1-hero__item">
        <p class="c1-hero__number">02</p>
        <img class="c1-hero__plashka" src="/img/online/o1/c1-plashka.svg" alt="">
        <img class="c1-hero__photo" src="/img/online/o1/c1__block-photo-2.png" alt="">
      </div>
    </div>
    <div class="swiper-slide">
      <div class="c1-hero__item">
        <p class="c1-hero__number">03</p>
        <img class="c1-hero__plashka" src="/img/online/o1/c1-plashka.svg" alt="">
        <img class="c1-hero__photo" src="/img/online/o1/c1__block-photo-2.png" alt="">
      </div>
    </div>
    <div class="swiper-slide">
      <div class="c1-hero__item">
        <p class="c1-hero__number">04</p>
        <img class="c1-hero__plashka" src="/img/online/o1/c1-plashka.svg" alt="">
        <img class="c1-hero__photo" src="/img/online/o1/c1__block-photo-2.png" alt="">
      </div>
    </div>
  </div>

  <!-- buttons -->
  <div class="c1-buttons">
    <div class="c1-buttons__item">
      <div class="swiper-button-prev swiper-button-prev_c1 svg-container">
        <svg class="svg" viewBox="0 0 50 40" preserveAspectRatio="none">
          <polygon points="0,20 25,0 25,12 50,12 50,28 25,28 25,40" />
        </svg>
      </div>
    </div>
    <div class="c1-buttons__item">
      <div class="swiper-button-next swiper-button-next_c1 svg-container">
        <svg class="svg" viewBox="0 0 50 40" preserveAspectRatio="none" stroke="none" stroke-opacity="0">
          <polygon points="0,12 25,12 25,0 50,20 25,40 25,28 0,28" />
        </svg>
      </div>
    </div>
  </div>

  <!-- pagination -->
  <div class="c1-pagination__lights">
    <div class="c1-pagination__left-light"></div>
    <div class="c1-pagination__right-light"></div>
  </div>
  <div class="swiper-pagination swiper-pagination_c1"></div>

</div>
<div class="c1-bottom-text">
  <p class="c1-bottom-text__top"><?= Yii::t('online','Request a call back,') ?></p>
  <p class="c1-bottom-text__bottom"><?= Yii::t('online','and an HSE consulting group specialist will select<br>an effective training program for you') ?></p>
</div>

<div class="btn-wrap-clone"></div>
<div class="btn-wrap animated opacity0 delay-500ms">
  <a href="#" class="neon-btn neon-btn-normal neon-btn-with-icon " data-type="modal" data-target="getFeedback">
    <img class="btn-icon" src="/img/btn-icons/icon-phone.png" alt="icon"> <?= Yii::t('online', 'Request a call') ?> </a>
</div>

<!-- bottom lines begin -->
<div class="bg-line-1">
  <img src="/img/online/o1/c1__line1.png" alt="Background line">
</div>
<div class="bg-line-2">
  <img src="/img/online/o1/c1__line2_1.png" alt="Background line">
</div>
<!-- bottom lines end -->
<!-- bottom mobile lines begin -->
<div class="bg-mob-line-1">
  <img src="/img/online/o1/c1-mob__line-1.png" alt="Background line">
</div>
<div class="bg-mob-line-2">
  <img src="/img/online/o1/c1-mob__line-2.png" alt="Background line">
</div>
<!-- bottom mobile lines end -->
<div class="ray-wrap-1">
  <div class="ray ray-1 animated slower flash infinite"></div>
  <div class="ray ray-2 animated slower flash infinite"></div>
  <div class="ray ray-3 animated slower flash infinite"></div>
</div>
</main>