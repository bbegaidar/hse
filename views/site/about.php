<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name.' - '.$page->content->title;
$headerMenu = $this->render('main/_header.php',['pageName' => $page->content->title]);
$headerMenuPc = $this->render('main/_header.php',['pageName' => $page->content->title, 'pc'=>'pc']);
?>
 <section class="cd-section visible" id="b1">
        <div class="bg">
            <?php echo $headerMenu ?>
            <?php echo $this->render('about/_b1.php',['page'=>$page]); ?>
        </div>
        <?php echo $this->render('@app/views/site/modal/getConsultation.php',['id' => 'consultation']); ?>
    </section>

    <section class="activity cd-section " id="b2">
		<div class="bg">
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('about/_b2.php'); ?>
		</div>
	</section>
	<section class="cd-section" id="b3">
		<div class="bg">
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('about/_b3.php'); ?>
		</div>
		<?php echo $this->render('@app/views/site/modal/toOrder.php',['id' => 'toOrder']); ?>
	</section>
	<section class="cd-section" id="b4">
		<div class="bg">
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('about/_b4.php', ['team' => $team]); ?>
		</div>
		<?php echo $this->render('@app/views/site/modal/getConsultation2.php',['id' => 'consultation2']); ?>
	</section>

	<section class="cd-section" id="b5">
		<div class="bg ">
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('about/_b5.php'); ?>
	</section>

	<section class="cd-section" id="b6">
		<div class="bg ">
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('about/_b6.php'); ?>
		</div>
		<?php echo $this->render('@app/views/site/modal/getConsultation2.php',['id' => 'bePartner']); ?>
	</section>
	<section class="cd-section" id="b7">
		<div class="bg ">
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('about/_b7.php', ['answers' => $answers]); ?>
		</div>
	</section>
	
	
	<?php 

$script = <<< JS
  
   window.closeCover = function() {
    var videoCover = document.querySelector('.b1-video__cover');
    videoCover.style.display = 'none';
  }
  $('#b1__button').click(function () {
    $("#divPlayer1").get(0).play();
    $(".b1-video__item").css('z-index', '1');
    closeCover();
  });
  
  $('#b2 .bg main .content-wrap .item-wrap .item img').hover(function(){
    $(this).addClass('animated', 'shake', 'slower');
  })
  $('document').ready( function() {
    var waypointZ2 = new Waypoint({
      element: $('#b1 .b1-video__title h3'),
      handler: function() {
        $('#b2 .bg main .b2-mobile-list__item-icon').addClass('animated fadeInUp').removeClass('opacity0');
        $('#b2 .bg main .b2-mobile-list__item-title').addClass('animated fadeIn').removeClass('opacity0');
        $('#b2 .bg main .b2-mobile-list__item-info').addClass('animated fadeIn').removeClass('opacity0');
      }
    })
  });
  
  window.startDocsAnimate = function() {
    var once3 = !1;
    setTimeout(function () {
      if (!once3) {
        once2 = !0;
        var once_3 = !1;

        window. startAnimateIcon = function () {
          animateIcon(1);
          once_3 = !0
        }

        windwow.animateIcon = function(activeIcon) {
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
          $('#b6 .icon-' + activeIcon).addClass('animated bounce slow infinite');
          // console.log(activeIcon);

          setTimeout(function () {
            $('#b6 .icon-' + activeIcon).removeClass('animated bounce slow infinite');

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
  $('document').ready(function () {
    var waypointZ3 = new Waypoint({
      element: $('#b2 .b2-mobile'),
      handler: function () {
        if ($(window).width() < 449) {
          
          $('#b3 .footer-wrap .btn-wrap').addClass('ownSlideInUp5-mob');
          $('#b3 main .b3-vantage_mobile .vantage-mob__image-wrap .vantage-mob__icon').addClass(
            'animated fadeIn').removeClass('opacity0');
          $('#b3 main .vantage-mob__info-wrap').addClass('animated fadeInLeftOwnM').removeClass('opacity0');
          $('#b3 main .vantage-mob__info-wrap_rev').addClass('animated fadeInRightOwnM').removeClass(
            'opacity0');
        }
      }
    });

  });
  


  $(document).ready(function () {
    var slidesPerV = 2,
      spaceB = 10;
    if ($(window).width() < 449) {
      slidesPerV = 2;
      spaceB = 10;
    } else {
      slidesPerV = 5;
      spaceB = 60;
    }

    var swiperB4 = new Swiper('.swiper-container_b4', {
      slidesPerView: slidesPerV,
      spaceBetween: spaceB,
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next_b4',
        prevEl: '.swiper-button-prev_b4',
      },
      pagination: {
        el: '.swiper-pagination_b4',
        dynamicBullets: true,
        clickable: true,
      },
    });
    
    var waypointZ = new Waypoint({
      element: $('#b4 main'),
      handler: function () {
        if ($(window).width() < 1049) {
          $('#b4 main .btn-wrap').addClass('ownSlideInUp5-mob2');
        }
      }
    });
  });
  
    // function hoverAnimation(){
    //   $('#b4 .item-wrap .item').hover(function () {
    //     if ($(this).css('opacity') == '1' && $(window).width() > 449) {
    //       $(this).removeClass('animated').css('transition', 'all 1s').css('transform', 'scale(1.2)');
    //     }
    //   }, function () {
    //     $(this).css('transform', 'scale(1)');
    //   })
    // };
  
  $('#b5 .bg main .results-wrap .b5__license .license__item').hover(function(){
    $(this).find('.license__title').css('opacity', '0').css('transition', '0.5s');
    $(this).find('.license__img').css('box-shadow','0px 0px 2px 1px rgba(50, 50, 51, 0.75)').css('transition', '0.5s');
  },function() {
    $(this).find('.license__title').css('opacity', '1').css('transition', '0.5s');
    $(this).find('.license__img').css('box-shadow','none');
  })

  $('document').ready( function() {
    console.log('b5 ready');
    var slidesPerV = 2,
        spaceB = 10;
    if($(window).width() < 449) {
      slidesPerV = 2;
      spaceB = 10;
    } else {
      slidesPerV = 4;
      spaceB = 60;
    }
    var swiperB5= new Swiper('.swiper-container_b5', {
        slidesPerView: slidesPerV,
        spaceBetween: spaceB,
        loop: true,
        navigation: {
          nextEl: '.swiper-button-next_b5',
          prevEl: '.swiper-button-prev_b5',
        },
        pagination: {
          el: '.swiper-pagination_b5',
          dynamicBullets: true,
          clickable: true,
        },
    });
  });
  
  
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
          $('#b6 .icon-' + activeIcon).addClass('animated bounce slow infinite');
          // console.log(activeIcon);

          setTimeout(function () {
            $('#b6 .icon-' + activeIcon).removeClass('animated bounce slow infinite');

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
  
  $('document').ready(function () {
    var slidesPerV = 5,
      spaceB = 10;
    if ($(window).width() < 449) {
      slidesPerV = 2;
      spaceB = 10;
    } else {
      slidesPerV = 5;
      spaceB = 0;
    }

    var swiperB6 = new Swiper('.swiper-container_b6', {
      slidesPerView: slidesPerV,
      spaceBetween: spaceB,
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next_b6',
        prevEl: '.swiper-button-prev_b6',
      },
      pagination: {
        el: '.swiper-pagination_b6',
        dynamicBullets: true,
        clickable: true,
      },
    });

    var waypointZ6 = new Waypoint({
      element: $('#b6'),
      handler: function () {
        if ($(window).width() < 1049) {
          $('#b6 main .btn-wrap').addClass('ownSlideInUp5-mob2');
        }
      }
    })
  });
  
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
          $('#b7 .icon-wrap-' + activeIcon).addClass('animated flip slow infinite');
          // console.log(activeIcon);
          
          setTimeout(function () {
            $('#b7 .icon-wrap-' + activeIcon).removeClass('animated flip slow infinite');
            
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


  $('document').ready( function() {
    if ($(window).width() < 449) {
      $('.item-bottom__wrap').removeClass('opacity0').removeClass('animated');
    }
    
    var slidesPerV,
        spaceB;
    if($(window).width() < 449) {
      slidesPerV = 1;
      spaceB = 15;
    } else {
      slidesPerV = 3;
      spaceB = 40;
    }
    
    var swiperB7= new Swiper('.swiper-container_b7', {
        slidesPerView: slidesPerV,
        spaceBetween: spaceB,
        loop: true,
        navigation: {
          nextEl: '.swiper-button-next_b7',
          prevEl: '.swiper-button-prev_b7',
        },
        pagination: {
          el: '.swiper-pagination_b7',
          dynamicBullets: true,
          clickable: true,
        },
    });
  });
    

   

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>