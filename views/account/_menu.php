<?php

use yii\helpers\Url;
use yii\widgets\Menu;
use app\widgets\WLang;

// Главное меню

?>
  
    <div id="menu" class="menu cd-section2 animated slideOutUp opacity0" style="display:none;">
        <div class="bg ">
        <?php echo $this->render('_menu_header.php', ['pageName' => Yii::t('static','Menu')]);?>
      
          <main class="main">
            <div class="menu-wrap">
              <?= Menu::widget([
                'items' => [
                    ['label' => Yii::t('static','Home') , 'url' => ['site/index']],
                    ['label' => Yii::t('static','About'), 'url' => ['site/about']],
                    [
                        'label' => Yii::t('static','Services'), 
                        'url' => ['site/services'],
                        'template' => '<span class="menu-link services">{label}</span><div class="ray-wrap ray-wrap-hover"><div class="ray ray-hover"></div><img src="/img/menu/bg-ray.png" alt="Ray line"></div><div class="list-services opacity0 d-none">
            <ul class="d-flex">
              <li><a href="'.Url::toRoute(['site/expertise']).'">Экспертиза</a></li>
              <!--li><a href="/">Курсы</a></li>
              <li><a href="/">Семинары</a></li-->
              <li><a href="'.Url::toRoute(['site/training']).'">Повышение квалификации</a></li>
              <li><a href="'.Url::toRoute(['site/online']).'">Оn-line обучение</a></li>
            </ul>
          </div>'],
                    ['label' => Yii::t('static','News'), 'url' => ['site/news']],
                    ['label' => Yii::t('static','Schedule'), 'url' => ['site/schedule']],
                    ['label' => Yii::t('static','Contact'), 'url' => ['site/contact']],
                ],
                'options' => [
					    'class' => 'item-wrap'
			    ],
                'activeCssClass'=>'active',
                'firstItemCssClass'=>'fist',
                'lastItemCssClass' =>'last',
                'itemOptions'=>['class'=>'item'],
                'linkTemplate' => '<span class="menu-link"><a href="{url}">{label}</a></span><div class="ray-wrap ray-wrap-hover"><div class="ray ray-hover"></div><img src="/img/menu/bg-ray.png" alt="Ray line"></div>'
                 
            ]); ?>
            </div>
            <div class="footer-wrap">
              <div class="line-wrap">
                <img class="line-img" src="/img/menu/line-1.png" alt="Line">
              </div>
              <div class="contact-wrap">
                <div class="item-wrap item-wrap-1 d-flex">
                  <div class="item item-1">
                    <div class="point-wrap">
                      <div class="point"></div>
                      <div class="line"></div>
                    </div>
                    <p class="title"><?= Yii::t('static','Phone') ?></p>
                    <ul class="tel-wrap d-flex">
                      <li class="tel">+7 (7132) 55 70 41,</li>
                      <li class="tel">+7 (777) 149 94 44</li>
                      <li class="tel">+7 (7132) 90 53 24,</li>
                      <li class="tel">+7 (701) 819 87 52</li>
                    </ul>
                  </div>
                  <div class="item item-2">
                    <div class="point-wrap">
                      <div class="point"></div>
                      <div class="line"></div>
                    </div>
                    <p class="title"><?= Yii::t('static','Address') ?></p>
                    <ul class="address-wrap d-flex">
                      <li class="address">РК, г.Актобе, пр-т А.Молдагуловой,</li>
                      <li class="address">46/55 БЦ «Capital Plaza» офис 509</li>
                    </ul>
                  </div>
                  <div class="item item-3">
                    <div class="point-wrap">
                      <div class="point"></div>
                      <div class="line"></div>
                    </div>
                    <p class="title"><?= Yii::t('static','E-mail') ?></p>
                    <ul class="email-wrap d-flex">
                      <li class="email">hseconsulting@mail.ru,</li>
                      <li class="email">manager1@hsecompany.kz</li>
                    </ul>
                  </div>
                  <div class="item item-4">
                    <div class="point-wrap">
                      <div class="point"></div>
                      <div class="line"></div>
                    </div>
                    <p class="title"><?= Yii::t('static','Social') ?></p>
                    <ul class="social-wrap d-flex">
                      <li class="social"><img src="/img/menu/icon-insta.png" alt="Instagram logo"></li>
                      <li class="social"><img src="/img/menu/icon-fb.png" alt="Facebook logo"></li>
                    </ul>
                  </div>
                </div>
                <div class="item-wrap item-wrap-2 d-flex">
                  <div class="item item-5 pc">
                    <li class="developer"><img src="/img/menu/developer.png" alt="Logo maint.kz"></li>
                  </div>
                  <?= WLang::widget(); ?>
                </div>
              </div>
            </div>
          </main>
</div></div>