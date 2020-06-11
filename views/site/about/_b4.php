<main><div class="program-wrap">
  <div class="title-wrap">
    <h2><?= Yii::t('about','A team of HSE consulting group') ?></h2>
    <p class="b4-title__bottom"><?= Yii::t('about','specialists with over 5 years of experience:') ?></p>
  </div>
  <div class="content-wrap swiper-container swiper-container_b4">
    <div class="item-wrap item-wrap-1 swiper-wrapper">
        <?php  
        $i =0;
        foreach ($team as $member) {
            ++$i;
            $i > 1 ? $class = 'delay-'.($i - 1).'s' : $class = '';
        ?>
        <div class="item item-<?= $i ?> swiper-slide animated opacity0 <?= $class ?>" style="background-image:url(/<?= $member->photo ?>);">
        <div class="text-wrap">
          <div class="course-wrap padding">
            <p class="course-title"><?= $member->content->name ?></p>
          </div>
          <div class="person-title padding">
            <p class="person-title__text"><?= $member->content->description ?></p>
          </div>
        </div>
      </div>
             
        <?php } ?>
    </div>
    <div class="b4-buttons">
      <div class="b4-buttons__item">
        <div class="swiper-button-prev swiper-button-prev_b4 svg-container">
          <svg class="svg" viewBox="0 0 50 40" preserveAspectRatio="none">
            <polygon points="0,20 25,0 25,12 50,12 50,28 25,28 25,40" />
          </svg>
        </div>
      </div>
      <div class="b4-buttons__item">
        <div class="swiper-button-next swiper-button-next_b4 svg-container">
          <svg class="svg" viewBox="0 0 50 40" preserveAspectRatio="none" stroke="none" stroke-opacity="0">
            <polygon points="0,12 25,12 25,0 50,20 25,40 25,28 0,28" />
          </svg>
        </div>
      </div>
    </div>
    <div class="swiper-pagination swiper-pagination_b4"></div>
  </div>
  <div class="b4__footer">
    <div class="b4-bottom-text">
      <p class="b4-bottom-text__top"><?= Yii::t('about','Request an on-line consultation') ?></p>
      <p class="b4-bottom-text__bottom"><?= Yii::t('about','with an industrial safety specialist') ?></p>
    </div>
  </div>
</div>

<div class="btn-wrap-clone"></div>
<div class="btn-wrap pos-absolute animated delay-1s  opacity00" style="z-index:23">
  <a href="#" class="neon-btn neon-btn-normal neon-btn-with-icon"  data-type="modal" data-target="consultation2">
    <img class="btn-icon" src="/img/btn-icons/icon-order.png" alt="icon"> <?= Yii::t('about','Request') ?></a>
</div>
<!-- 
<div class="point-wrap animated bounceInLeft delay-1s">
  <div class="point"></div>
</div> -->
<div class="bg-line-1">
  <img src="/img/about/b4/b4__bottom_line.png" alt="Background line">
</div>
<div class="ray-wrap animated slower flash infinite">
  <div class="ray ray-1"></div>
  <div class="ray ray-2"></div>
  <div class="ray ray-3"></div>
  <div class="ray ray-4"></div>
  <div class="ray ray-5"></div>
</div>
<div class="line-mob-1">
  <img src="/img/about/b4/b4-mob__line-1.png" alt="Line">
</div>
<div class="line-mob-2">
  <img src="/img/about/b4/b4-mob__line-2.png" alt="Line">
</div>
</main>