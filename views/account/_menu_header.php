<?php use yii\helpers\Html;?>

<header>
    <div class="header-wrap">
      <div class="logo-wrap">
        <img class="logo-img pc" src="/img/menu/logo-menu.png" alt="Logo">
        <img class="logo-img mob" src="/img/menu/mob/m-logo.png" alt="Logo">
        <div id="close-menu" class="btn-logo-close"></div>
        <?php if($pageName) { echo Html::tag('p', Html::encode($pageName), ['class' => 'pos pc']); } ?>
      </div>
      <div class="contact-wrap">
        <div class="tel-wrap">
          <img src="/img/main-page/tel.png" alt="Tel">
        </div>
        <div class="btn-wrap">
          <?= Html::a('<img class="btn-icon" src="/img/btn-icons/icon-sign-in.png" alt="sign in icon"> '.Yii::t('static','Logout'),['site/logout'],['class' => 'neon-btn neon-btn-normal neon-btn-with-icon', 'data' => ['method' => 'post']]) ?>
        </div>
      </div>
      <div class="w-line w-line-1"></div>
      <div class="w-line w-line-2"></div>
    </div>
  </header>