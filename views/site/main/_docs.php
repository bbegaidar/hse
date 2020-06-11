<main>
    <div class="docs-wrap">
  <div class="main-wrap">
    <div class="title-wrap">
      <h3><?= Yii::t('main', 'documents') ?></h3>
      <p><?= Yii::t('main', 'governing the activities of the company:') ?></p>
    </div>
    <div class="item-wrap item-wrap-1">
      <div class="item">
          <div class="hover-wrap">
          <div class="hover hover-1">
            <img src="/img/main-page/docs/hover-1.svg" alt="hover img">
          </div>
          <div class="hover hover-2">
            <img src="/img/main-page/docs/hover-2.svg" alt="hover img">
          </div>
          <div class="hover hover-3">
            <img src="/img/main-page/docs/hover-3.svg" alt="hover img">
          </div>
        </div>
        <div class="icon-wrap">
          <img src="/img/main-page/docs/folder.png" alt="" class="folder">
          <img src="/img/main-page/docs/icon-1.png" alt="" class="icon icon-2">
        </div>
        <div class="text-wrap">
         <?= Yii::t('main', '<p class="uppercase">Quality</p><p>policy</p>') ?>
        </div>
        <div class="btn-wrap-clone"></div>
        <div class="btn-wrap pos-absolute animated opacity00">
            <a href="/<?= $quality ?>" class="neon-btn neon-btn-normal"  target="_blank"><?= Yii::t('main','look') ?></a>
        </div>
      </div>
    </div>
    <div class="item-wrap item-wrap-2">
      <div class="item">
          <div class="hover-wrap">
          <div class="hover hover-1">
            <img src="/img/main-page/docs/hover-1.svg" alt="hover img">
          </div>
          <div class="hover hover-2">
            <img src="/img/main-page/docs/hover-2.svg" alt="hover img">
          </div>
          <div class="hover hover-3">
            <img src="/img/main-page/docs/hover-3.svg" alt="hover img">
          </div>
        </div>
        <div class="icon-wrap">
          <img src="/img/main-page/docs/folder.png" alt="" class="folder">
          <img src="/img/main-page/docs/icon-2.png" alt="" class="icon icon-3">
        </div>
        <div class="text-wrap">
            <?= Yii::t('main', '<p class="uppercase">anti-corruption</p><p>policy</p>') ?>
        </div>
        <div class="btn-wrap-clone"></div>
        <div class="btn-wrap pos-absolute animated opacity00">
            <a href="/<?= $anticorruption ?>" class="neon-btn neon-btn-normal"   target="_blank"><?= Yii::t('main','look') ?></a>
        </div>
      </div>
    </div>
    <div class="item-wrap item-wrap-3">
      <div class="item">
          <div class="hover-wrap">
          <div class="hover hover-1">
            <img src="/img/main-page/docs/hover-1.svg" alt="hover img">
          </div>
          <div class="hover hover-2">
            <img src="/img/main-page/docs/hover-2.svg" alt="hover img">
          </div>
          <div class="hover hover-3">
            <img src="/img/main-page/docs/hover-3.svg" alt="hover img">
          </div>
        </div>
        <div class="icon-wrap">
          <img src="/img/main-page/docs/folder.png" alt="" class="folder">
          <img src="/img/main-page/docs/icon-3.png" alt="" class="icon icon-4">
        </div>
        <div class="text-wrap">
          <?= Yii::t('main', '<p class="uppercase">privacy</p><p>policy</p>') ?>
        </div>
        <div class="btn-wrap-clone"></div>
        <div class="btn-wrap pos-absolute animated opacity00">
            <a href="/<?= $privacy ?>" class="neon-btn neon-btn-normal"  target="_blank"><?= Yii::t('main','look') ?></a>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-wrap">
    <div class="title-wrap">
      <h3><?= Yii::t('main', 'Use the services of professionals.')?></h3>
      <p><?= Yii::t('main', 'Send an on-line application to conclude a contract')?></p>
    </div>
    <div class="btn-wrap-clone"></div>
    <div class="btn-wrap pos-absolute animated opacity0">
      <a href="#" class="neon-btn neon-btn-normal neon-btn-with-icon icon-mail" data-type="modal" data-target="sendRequest"><?= Yii::t('main','Send request') ?></a>
    </div>
    <img class="bg-img mob" src="/img/main-page/docs/mob-bg-footer-docs.png" alt="bg">
  </div>
</div>
<div class="line-1 pc">
  <img src="/img/main-page/docs/line-1.png" alt="Line">
</div>
<div class="line-2 pc">
  <img src="/img/main-page/docs/line-2.png" alt="Line">
</div>
<div class="ray-wrap pc animated slower flash infinite">
  <div class="ray ray-1"></div>
  <div class="ray ray-2"></div>
  <div class="ray ray-3"></div>
  <div class="ray ray-4"></div>
  <div class="ray ray-5"></div>
</div>
</main>

<?php 

$script = <<< JS

  window.startDocsAnimate = function() {
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
          if (activeIcon == 6) {
            activeIcon = 1;
            animateIcon(activeIcon + 1)
          }
          if (once_3 && activeIcon == 1) {
            return
          }
          $('#docs .icon-' + activeIcon).addClass('animated bounce slow infinite');
          // console.log(activeIcon);

          setTimeout(function () {
            $('#docs .icon-' + activeIcon).removeClass('animated bounce slow infinite');

            if (!once_3 && activeIcon == 1) {
              return
            }
            animateIcon(activeIcon + 1)
          }, 2000)
        }
        startAnimateIcon();
      }
    }, 500);

  }
  $('#docs .item').hover(function () {
    var self = $(this),
      time = 600;
    self.find('.hover-1').fadeIn(time);
    self.find('.hover-2').delay(300).fadeIn(time);
    self.find('.hover-3').delay(600).fadeIn(time);
  }, function () {
    var time = 300;
    $(this).find('.hover-3').delay(100).fadeOut(time);
    $(this).find('.hover-2').delay(400).fadeOut(time);
    $(this).find('.hover-1').delay(700).fadeOut(time);
  })
JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>