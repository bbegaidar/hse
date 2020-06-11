<?php use yii\helpers\Url; ?>
<main>
    <div class="activity-wrap">
  <div class="text-wrap w-40 animated slow opacity0">
    <div class="activity-logo pc">
      <img src="/img/main-page/activity/act-logo.png" alt="Logo">
    </div>
    <div class="act-text">
      <p><?= Yii::t('main', 'Qualified specialists conduct') ?></p>
      <h2><?= Yii::t('main', 'seminars, webinars, conferences and workshops') ?></h2>
      <p class="w-70"><?= Yii::t('main', 'for advanced training and additional specialized training for employees of enterprises.') ?></p>
    </div>
  </div>
  <div class="left-content w-60">
    <div class="title-wrap">
      <h3><?= Yii::t('main', 'The main activities') ?></h3>
      <p><?= Yii::t('main', 'of the company:') ?></p>
    </div>
    <div class="item-wrap item-wrap-1 animated slow opacity0 delay-s zindex0">
      <div class="item">
        <p class="pos-absolute"><?= Yii::t('main', 'Training') ?></p>
        <img class="bg-img pc" src="/img/main-page/activity/item-img-1.png" alt="">
        <div class="btn-wrap-clone"></div>
        <div class="btn-wrap animated opacity00">
          <a href="<?= Url::toRoute(['site/training']) ?>" class="neon-btn neon-btn-normal"><?= Yii::t('static', 'More') ?></a>
        </div>
      </div>
    </div>
    <div class="item-wrap item-wrap-2 animated slow opacity0 delay-1s zindex0">
      <div class="item">
        <p class="pos-absolute"><?= Yii::t('main', 'Practical<br>workshops') ?></p>
        <img class="bg-img pc" src="/img/main-page/activity/item-img-2.png" alt="">
        <div class="btn-wrap-clone"></div>
        <!--div class="btn-wrap animated">
          <a href="<!--?= Url::toRoute(['site/workshops']) ?>" class="neon-btn neon-btn-normal"><?= Yii::t('static', 'More') ?></a>
        </div-->
      </div>
    </div>
    <div class="item-wrap item-wrap-3 animated slow opacity0 delay-2s zindex0">
      <div class="item">
        <p class="pos-absolute"><?= Yii::t('main', 'Industrial<br>Safety<br>Expertise') ?></p>
        <img class="bg-img pc" src="/img/main-page/activity/item-img-3.png" alt="">
        <div class="btn-wrap-clone"></div>
        <div class="btn-wrap animated opacity00">
          <a href="<?= Url::toRoute(['site/expertise']) ?>" class="neon-btn neon-btn-normal"><?= Yii::t('static', 'More') ?></a>
        </div>
      </div>
    </div>
    <div class="item-wrap item-wrap-4 animated slow opacity0 delay-3s zindex0">
      <div class="item">
        <p class="pos-absolute"><?= Yii::t('main', 'On-line<br>training') ?></p>
        <img class="bg-img pc" src="/img/main-page/activity/item-img-4.png" alt="">
        <div class="btn-wrap-clone"></div>
        <div class="btn-wrap animated opacity00">
          <a href="<?= Url::toRoute(['site/online']) ?>" class="neon-btn neon-btn-normal"><?= Yii::t('static', 'More') ?></a>
        </div>
      </div>
    </div>
    <div class="bg-rectangle bg-rectangle-1"></div>
    <div class="bg-rectangle bg-rectangle-2"></div>
    <div class="bg-rectangle bg-rectangle-3"></div>
  </div>
</div>
</main>