<main>
    <div class="program-wrap">
        <div class="title-wrap">
            <p><?= Yii::t('main', 'In the near future<br>we will launch the following training programs:')?></p>
        </div>
        <div class="content-wrap swiper-container-program">
    <div class="item-wrap item-wrap-1 swiper-wrapper">
        
        <?php 
            $i = 0;
            foreach ($trainings as $training) {
                ++$i;
                $class = $i==1 ? 'active' : 'delay-'.($i-1).'s'; ?>
                <div class="item item-'.$i.' animated opacity0 <?= $class ?> swiper-slide">
                    <div class="img" style="background-image:url(/<?= $training->photo ?>);" alt="<?= $training->title ?>"></div>
                    <div class="text-wrap">
                        <div class="course-wrap padding">
                            <p class="course cursive"><?= $training->categoryData->description ?>:</p>
                            <p class="course-title"><?= $training->title ?></p>
                        </div>
                        <div class="date-wrap padding">
                            <p class="date cursive"><?= Yii::t('static','Start date') ?></p>
                            <p class="date-time"><?= date('d.m.Y', strtotime($training->startDate)) ?></p>
                        </div>
                        <div class="city-wrap padding">
                            <p class="city cursive"><?= $training->city != null ? Yii::t('static','City') : Yii::t('static','Held') ?>:</p>
                            <p class="city-name"><?= $training->city != null ? $training->city : 'ONLINE' ?></p>
                        </div>
                    </div>
                    <div class="btn-wrap-clone"></div>
                    <div class="btn-wrap pos-absolute animated delay-1s "><a href="#" class="neon-btn neon-btn-normal"><?= Yii::t('static','To learn more') ?></a></div>
                </div>
        <?php } ?>
    </div>
  </div>
  <div class="swiper-pagination-program"></div>
  <div class="btn-arrow-wrap mob">
    <div class="btn-item btn-item-1 swiper-button-prev-program">
      <div class="svg-container">
        <svg class="svg" viewBox="0 0 55 40" preserveAspectRatio="none">
          <polygon points="0,20 25,0 25,12 55,12 55,28 25,28 25,40"></polygon>
        </svg>
      </div>
    </div>
    <div class="btn-item btn-item-2 swiper-button-next-program">
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
    if ($(window).width() < 1049) {
      let
        swiperGallery = new Swiper('.swiper-container-program', {
          slidesPerView: 1,
          // loop: loopValue,
          navigation: {
            nextEl: '.swiper-button-next-program',
            prevEl: '.swiper-button-prev-program',
          },
          keyboard: {
            enabled: true,
            onlyInViewport: false,
          },
          pagination: {
            el: '.swiper-pagination-program',
            dynamicBullets: true,
            clickable: true,
          },
        });
    }
  });
JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>
