<?php use yii\helpers\Html;?>

<header>
    <div class="header-wrap">
        <div class="logo-wrap">
            <img class="logo-img" src="/img/main-page/logo.png" alt="Logo">
            <div id="open-menu" class="btn-logo"></div>
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

<?php 

$script = <<< JS


    $('.item .services').hover(function(){
      $('.item').find('.list-services').removeClass('d-none opacity0');
    }, function(){
    });
    
    $('.item').not('.item-services').hover(function(){
      $('.item').find('.list-services').addClass('d-none opacity0');
    }, function(){
    });
    
    if($(window).width() < 1049){
        $('.item').on('click', '.services', function(){
            $('.item').find('.list-services').removeClass('opacity0 d-none').css('color','red');
        }
      );
      
      $('.item').not('.item-services').on('click', '#menu', function(){
            $('.item').find('.list-services').addClass('opacity0 d-none').css('color','red');
        }
      );
      
    }
    
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