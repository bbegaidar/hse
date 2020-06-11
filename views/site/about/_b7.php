<main>
<div class="results-wrap">
  <div class="b7__title">
    <h2><?= Yii::t('about', 'Answers of experts') ?></h2>
    <p><?= Yii::t('about', 'to questions in the field of industrial safety and labor protection') ?></p>
  </div>
  <div class="swiper-container swiper-container_b7">
    <div class="b7__experts experts swiper-wrapper">
        
        <?php foreach ($answers as $answer) { ?>
            <div class="experts__item swiper-slide">
        <div class="item-top">
          <div class="item-top__wrap">
            <div class="item-top__text-wrap">
              <p class="item-top__title"><?= Yii::t('about', 'Question') ?></p>
              <p class="item-top__text"><?= $answer->content->question ?></p>
              <img class="item-top__answer-img" src="/img/about/b7/b7__expert-text.png" alt="">
            </div>
          </div>
          <img class="item-top__img" src="/img/about/b7/b7__person.png" alt="">
        </div>
        <div class="item-bottom">
          <div class="item-bottom__wrap animated opacity0">
            <div class="item-bottom__text-wrap">
              <p class="item-bottom__title"><?= Yii::t('about', 'Answer') ?></p>
              <p class="item-bottom__text"><?= $answer->content->answer ?></p>
              <img class="item-bottom__answer-img" src="/img/about/b7/b7__expert-text2.png" alt="">
            </div>
          </div>
          <img class="item-bottom__img" src="/img/about/b7/b7__person.png" alt="">
        </div>
      </div>
        <?php } ?>
        
    </div>  
    <!-- buttons begin -->
    <div class="b7-buttons">
      <div class="b7-buttons__item">
        <div class="svg-container swiper-button-prev_b7">
          <svg class="svg" 
               viewBox="0 0 50 40" 
               preserveAspectRatio="none" >
            <polygon points="0,20 25,0 25,12 50,12 50,28 25,28 25,40"  />
          </svg>
        </div>
      </div>
      <div class="b7-buttons__item">  
        <div class="svg-container swiper-button-next_b7">
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
    <!-- pagination begin -->
    <div class="swiper-pagination swiper-pagination_b7"></div>
    <!-- pagination end -->
  </div>

  <footer class="b7-footer">
    <div class="b7-social">
      <div class="b7-social__item">
        <a href="#" target="_blank">
          <img class="b7-social__img" src="/img/about/b7/inst-icon.png" alt="">
        </a>
      </div>
      <div class="b7-social__item">
        <a href="#" target="_blank">
          <img class="b7-social__img" src="/img/about/b7/face-icon.png" alt="">
        </a>
      </div>
      </div>
    <div class="b7-maint">
      <a href="https://maint.kz/" target="_blank">
        <img class="b7-maint__img" src="/img/about/b7/maint-icon.png" alt="">
      </a>
    </div>
  </footer>
  
</div>

    
</main>