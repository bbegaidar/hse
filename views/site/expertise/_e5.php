<main>
    <div class="results-wrap">
  <div class="c5__title">
    <h2><?= Yii::t('expertise', 'Feedback on the work') ?></h2>
    <p><?= Yii::t('expertise', 'of company specialists') ?></p>
  </div>
  <!-- reviews begin -->
  <div class="reviews swiper-container swiper-container_с5">
    <div class="swiper-wrapper">
      <?php foreach($reviews as $review) { ?>
        <div class="reviews__item swiper-slide">
        <div class="text-wrap">
          <div class="person-wrap">
            <div class="person-wrap__info">
              <p class="person__name"><?= $review->content->reviewer ?></p>
              <p class="person__company"><?= $review->content->company ?></p>
            </div>
            <div class="person-wrap__icon">
              <img class="person__icon" src="/img/expertise/e5/person__icon.png" alt="">
            </div>
          </div>
          <div class="reviews__text"><?= $review->content->review ?>
          </div>
        </div>
        </div>
      <? } ?>
    </div>
    <!-- buttons begin -->
    <div class="c5-buttons">
      <div class="c5-buttons__item">
        <div class="swiper-button-prev swiper-button-prev_с5 svg-container">
          <svg class="svg" 
               viewBox="0 0 50 40" 
               preserveAspectRatio="none" >
            <polygon points="0,20 25,0 25,12 50,12 50,28 25,28 25,40"  />
          </svg>
        </div>
      </div>
      <div class="c5-buttons__item">  
        <div class="swiper-button-next swiper-button-next_с5 svg-container">
          <svg class="svg" 
              viewBox="0 0 50 40" 
              preserveAspectRatio="none"
              stroke= "none"
              stroke-opacity="0" >
            <polygon points="0,12 25,12 25,0 50,20 25,40 25,28 0,28" />
          </svg>
        </div>
      </div> 
    </div>
    <!-- buttons end -->  
    
    <div class="c5-pagination__lights">
      <div class="c5-pagination__left-light"></div>
      <div class="c5-pagination__right-light"></div>    
    </div>
    <div class="swiper-pagination swiper-pagination_с5"></div>
  </div>
  <!-- reviews end -->
  <footer class="c5-footer">
    <div class="c5-social">
      <div class="c5-social__item">
        <a href="#" target="_blank">
          <img class="c5-social__img" src="/img/expertise/e5/inst-icon.png" alt="">
        </a>
      </div>
      <div class="c5-social__item">
        <a href="#" target="_blank">
          <img class="c5-social__img" src="/img/expertise/e5/face-icon.png" alt="">
        </a>
      </div>
      </div>
    <div class="c5-maint">
      <a href="https://maint.kz/" target="_blank">
        <img class="c5-maint__img" src="/img/expertise/e5/maint-icon.png" alt="">
      </a>
    </div>
  </footer>
</div>
</main>