<?php use yii\helpers\Html; error_reporting(E_ALL & ~E_NOTICE); ?>

<header class="<?=isset($pc) ? $pc : false;?>">
    <div class="header-wrap">
        <div class="logo-wrap">
            <div class="header-logo">
              <div class="logo">
                <div id="open-menu" class="menu">
                  <div class="hamburger">
                    <div class="hamburger-inner"></div>
                  </div>
                  <span class="header-logo-text pc">Меню</span>
                </div>
                <div class="icon"></div>
              </div>
            </div>
            <!--<img class="logo-img pc" src="/img/main-page/logo.png" alt="Logo">-->
            <!--<img class="logo-img mob" src="/img/menu/mob/m-logo-main.png" alt="Logo">-->
            <!--<div id="open-menu" class="btn-logo"></div>-->
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
                    echo Html::a('<img class="btn-icon" src="/img/btn-icons/icon-sign-in.png" alt="sign in icon"> '.Yii::t('static','Log-in'),['site/login'],['class' => 'neon-btn neon-btn-normal neon-btn-with-icon']);
                }
                ?>
            </div>
        </div>
        <div class="w-line w-line-1"></div>
        <div class="w-line w-line-2"></div>
    </div>
</header>

<?php 

$script = <<< JS

    if($(window).width() < 1049){
        $('.item').on('click', '.services', function(){
            $('.item').find('.list-services').removeClass('opacity0 d-none').css('color','red');
        }
      );
      
      $('.item').not('.item-services').on('click', '#menu', function(){
            $('.item').find('.list-services').addClass('opacity0 d-none').css('color','red');
        }
      );
      
      
    $('#page404 .main .btn .btn-wrap').removeClass('ownSlideInUp67 ownSlideInUp06').addClass('ownSlideInUp4');
      
    };
    
    $('body').on('click', '#open-menu', function () {
        $('#menu').removeAttr('style').removeClass('slideOutUp opacity0').addClass('slideInDown');
        $('body').attr('data-animation', 'none');
    });

    $('body').on('click', '#close-menu', function () {
        $('#menu').removeClass('slideInDown').addClass('slideOutUp opacity0 ');
    });

    $('#menu .item').hover(function () {
            $(this).children('.ray-wrap-hover').css('opacity', 1);
        },
        function () {
        $(this).children('.ray-wrap-hover').css('opacity', 0);
    });

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>