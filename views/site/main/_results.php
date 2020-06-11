<main>
    <div class="results-wrap">
  <div class="text-wrap w-25">
    <h3><?= Yii::t('main', 'We help create the conditions for <br> safe work') ?></h3>
    <p><?= Yii::t('main', 'of Kazakhstanis in industrial and industrial enterprises. Our main task is to use the experience of security professionals and modern training technologies for business development in all regions of Kazakhstan.')?></p>
  </div>
  <div class="content-wrap w-80">
    <div class="title-wrap">
      <h2><?= Yii::t('main', 'Since 2011') ?></h2>
      <p><?= Yii::t('main', 'we have achieved the following results:') ?></p>
    </div>
    <div class="item-wrap item-wrap-1">
      <div class="item animated opacity0">
        <div class="top-1"></div>
        <div class="top-2"></div>
        <div class="top-3"></div>
        <div class="bottom"></div>
        <p class="number">988 524</p>
        <p class="text"><?= Yii::t('main', 'specialists passed certification and specialized training;')?></p>
      </div>
      <div class="icon-wrap animated opacity00 icon-wrap-2">
        <img src="/img/main-page/results/icon-1.png" alt="Icon-1">
      </div>
      <div class="dot-wrap">
        <div class="dot dot-1"></div>
      </div>
    </div>
    <div class="item-wrap item-wrap-2">
      <div class="item animated opacity0 delay-1s">
        <div class="top-1"></div>
        <div class="top-2"></div>
        <div class="top-3"></div>
        <div class="bottom"></div>
        <p class="number">263</p>
        <p class="text"><?= Yii::t('main', 'seminars are held annually;')?></p>
      </div>
      <div class="icon-wrap animated opacity00 icon-wrap-3">
        <img src="/img/main-page/results/icon-2.png" alt="Icon-2">
      </div>
      <div class="dot-wrap">
        <div class="dot dot-1"></div>
        <div class="dot dot-2"></div>
        <div class="dot dot-3"></div>
      </div>
    </div>
    <div class="item-wrap item-wrap-3">
      <div class="item animated opacity0 delay-2s">
        <div class="top-1"></div>
        <div class="top-2"></div>
        <div class="top-3"></div>
        <div class="bottom"></div>
        <p class="number">3 500</p>
        <p class="text"><?= Yii::t('main', 'training courses conducted in the field of industrial safety and labor protection;')?></p>
      </div>
      <div class="icon-wrap animated opacity00 icon-wrap-4">
        <img src="/img/main-page/results/icon-3.png" alt="Icon-1">
      </div>
      <div class="dot-wrap">
        <div class="dot dot-1"></div>
      </div>
    </div>
    <div class="item-wrap item-wrap-4">
      <div class="item animated opacity0 delay-3s">
        <div class="top-1"></div>
        <div class="top-2"></div>
        <div class="top-3"></div>
        <div class="bottom"></div>
        <p class="number">96</p>
        <p class="text"><?= Yii::t('main', 'unique programs developed by HSE consulting group;')?></p>
      </div>
      <div class="icon-wrap animated opacity00 icon-wrap-5 ">
        <img src="/img/main-page/results/icon-4.png" alt="Icon-1">
      </div>
      <div class="dot-wrap">
        <div class="dot dot-1"></div>
        <div class="dot dot-2"></div>
        <div class="dot dot-3"></div>
      </div>
    </div>
    <div class="item-wrap item-wrap-5">
      <div class="item animated opacity0 delay-4s">
        <div class="top-1"></div>
        <div class="top-2"></div>
        <div class="top-3"></div>
        <div class="bottom"></div>
        <p class="number">187</p>
        <p class="text"><?= Yii::t('main', 'practical exercises conducted over the years of work;')?></p>
      </div>
      <div class="icon-wrap animated opacity00 icon-wrap-6  ">
        <img src="/img/main-page/results/icon-5.png" alt="Icon-1">
      </div>
      <div class="dot-wrap">
        <div class="dot dot-1"></div>
      </div>
    </div>

    <div class="dotted-line pc"></div>
  </div>
</div>
</main>

<?php 

$script = <<< JS

  window.startAnimationResults = function(){
    var once3 = !1;
    setTimeout(function () {
      if (!once3) {
        once2 = !0;
        var once_3 = !1;

        window.startAnimateIcon = function() {
          animateIcon(1);
          once_3 = !0
        }

        window.animateIcon = function(activeIcon) {
          if (activeIcon == 1) {
            activeIcon = 2;
          }
          if (activeIcon == 10) {
            activeIcon = 1;
            animateIcon(activeIcon +1)
          }
          if (once_3 && activeIcon == 1) {
            return
          }
          $('#results .icon-wrap-' + activeIcon).addClass('animated flip slow infinite');
          // console.log(activeIcon);
          
          setTimeout(function () {
            $('#results .icon-wrap-' + activeIcon).removeClass('animated flip slow infinite');
            
            if (!once_3 && activeIcon == 1) {
              return
            }
            animateIcon(activeIcon + 1)
          }, 2000)
        }
        startAnimateIcon();
      }
    }, 5000);
  }

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>