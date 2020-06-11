<?php use yii\helpers\Html;?>

<header>
    <div class="header-wrap">
      <div class="logo-wrap">
        <!--<img class="logo-img pc" src="/img/menu/logo-menu.png" alt="Logo">-->
        <div class="header-logo">
              <div class="logo">
                <div id="close-menu" class="menu">
                  <div class="hamburger">
                    <div class="hamburger-inner"></div>
                  </div>
                  <span class="header-logo-text pc">Закрыть</span>
                </div>
                <div class="icon"></div>
              </div>
            </div>
        <!--<img class="logo-img mob" src="/img/menu/mob/m-logo.png" alt="Logo">-->
        <!--<div id="close-menu" class="btn-logo-close"></div>-->
        <?php if($pageName) { echo Html::tag('p', Html::encode($pageName), ['class' => 'pos pc']); } ?>
      </div>
      <div class="contact-wrap">
        <div class="tel-wrap">
          <!--<img src="/img/main-page/tel.png" alt="Tel">-->
            <div class="header-phone-wrap">
            	<div class="header-phone">
            		<div class="icon"></div>
            		<div class="numbers">
            			<span>+7 (777) 149 94 44</span>
            			<span>+7 (701) 819 87 52</span>
            		</div>
            	</div>
            </div>
          
        </div>
        <div class="btn-wrap">
          <?php if (!Yii::$app->user->isGuest) {
                    echo Html::a('<img class="btn-icon" src="/img/btn-icons/icon-sign-in.png" alt="sign in icon"> '.Yii::t('static','My account'),['account/index'],['class' => 'neon-btn neon-btn-normal neon-btn-with-icon']);
                } else {
                    echo Html::a('<img class="btn-icon" src="/img/btn-icons/icon-sign-in.png" alt="sign in icon"> '.Yii::t('static','Login'),['site/login'],['class' => 'neon-btn neon-btn-normal neon-btn-with-icon']);
                }
                ?>
        </div>
      </div>
      <div class="w-line w-line-1"></div>
      <div class="w-line w-line-2"></div>
    </div>
  </header>