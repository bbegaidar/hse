<main>
  <div class="gallery-wrap">
  <div class="title-wrap">
    <?= Yii::t('main', '<p>Photo gallery of courses and seminars</p><p class="uppercase">conducted by HSE specialists:</p>') ?>
  </div><div class="content-wrap swiper-container-gallery">
    <div class="main-slider-wrap swiper-wrapper">
        <?php 
            if ($gallery) {
                $chunked_gallery = array_chunk($gallery, 6);
                foreach ($chunked_gallery as $chunk) {
                    echo '<div class="slider-wrap swiper-slide my pc">';
                    $i = 0;
                    foreach ($chunk as $content) {
                        ++$i;
                        echo '<div class="item item-'.$i.'" style="background-image:url(/'.$content->photo.');"></div>';
                    }
                    echo '</div>';
                }
            }    
        ?>
        
        <?php 
            if ($gallery) {
                $i = 0;
                foreach ($gallery as $content) {
                    ++$i;
                    echo '<div class="slider-wrap swiper-slide mob">';
                    echo '<div class="item item-'.$i.'" style="background-image:url(/'.$content->photo.');"></div>';
                    echo '</div>';
                }
            }    
        ?>
    </div>
  </div>

  <div class="swiper-pagination-gallery"></div>
  <div class="btn-arrow-wrap mob">
    <div class="btn-item btn-item-1 swiper-button-prev-gallery">
      <div class="svg-container">
        <svg class="svg" viewBox="0 0 55 40" preserveAspectRatio="none">
          <polygon points="0,20 25,0 25,12 55,12 55,28 25,28 25,40"></polygon>
        </svg>
      </div>
    </div>
    <div class="btn-item btn-item-2 swiper-button-next-gallery">
      <div class="svg-container">
        <svg class="svg" viewBox="0 0 55 40" preserveAspectRatio="none">
          <polygon points="0,12 30,12 30,0 55,20 30,40 30,28 0,28"></polygon>
        </svg>
      </div>
    </div>
  </div>
</div>
</main>

<?php 

$script = <<< JS
  $('document').ready(function () {
    let slidesPerV = 1,
      // loopValue = true;
      // if ($(window).width() < 1049) {
      // loopValue = false;
      // slidesPerV = 1;
      // }
      swiperGallery = new Swiper('.swiper-container-gallery', {
        slidesPerView: slidesPerV,
        // loop: loopValue,
        navigation: {
          nextEl: '.swiper-button-next-gallery',
          prevEl: '.swiper-button-prev-gallery',
        },
        // autoplay: {
        //   delay: 5000,
        // },
        keyboard: {
          enabled: true,
          onlyInViewport: false,
        },
        pagination: {
          el: '.swiper-pagination-gallery',
          dynamicBullets: true,
          // dynamicMainBullets: 4,
          // formatFractionTotal: 4,
          hiddenClass: 'swiper-pagination-hidden',
          clickable: true,
        },
      });
  });

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>