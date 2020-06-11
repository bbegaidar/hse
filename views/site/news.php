<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name.' - '.Yii::t('static','News');
?>

<section class="cd-section" id="news">
    <div id="pageNews" class="pageNews cd-section2">
      <div class="bg ">
        <?php echo $this->render('main/_header.php',['pageName' => Yii::t('static','News')]) ?>
        <?php echo $this->render('news/_news.php', ['categories' => $categories, 'news' => $news]); ?>
        <?php echo $this->render('mob/_social.php'); ?>
    </div>
  </section>

<?php 

$script = <<< JS

$('document').ready( function() {
    
    var slidesPerV = 4,
        spaceB = 10;
   if ($(window).width() < 1049) {
        $('body').find('.item-wrap-pc').removeClass('swiper-wrapper');
        slidesPerV = 1;
      } else {
        $('body').find('.item-wrap-mob').removeClass('swiper-wrapper');
      }
    
    var swiperB5= new Swiper('.swiper-container', {
        slidesPerView: slidesPerV,
        spaceBetween: spaceB,
        loop: true,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        pagination: {
          el: '.swiper-pagination',
          dynamicBullets: true,
          clickable: true,
        },
    });
    $('select').val(location.pathname + location.search)
  });
  
  if ($('.activity').hasClass('visible')) {
      $('#activity .item-wrap').addClass('zoomIn');
    }

    
    $(document).ready(function(){
      $('#pageNews li').hover(function () {
        if ($(this).hasClass('active')){
        } else{
          $(this).find('img').attr('src', '/img/news/li-img-hover.png');
        }
        
      }, function () {
        if ($(this).hasClass('active')){
          $(this).find('img').attr('src', '/img/news/li-img-hover.png');
        }
        else{
          $(this).find('img').attr('src', '/img/news/li-img.png');
        }
        
      });
      if ($('#pageNews li').hasClass('active')) {
        $('#pageNews .active a img').attr('src', '/img/news/li-img-hover.png');
      }      
    });
    
    $('select').on('change',function(){
        window.location.replace(this.value);
    })
    
   

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>