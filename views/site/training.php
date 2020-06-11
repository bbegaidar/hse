<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name.' - '.$page->content->title;
$headerMenu = $this->render('main/_header.php',['pageName' => $page->content->title]);
$headerMenuPc = $this->render('main/_header.php',['pageName' => $page->content->title, 'pc'=>'pc']);
?>
 <section class="cd-section visible" id="t1">
        <div class="bg">
            <?php echo $headerMenu ?>
            <?php echo $this->render('training/_t1.php',['page'=>$page]); ?>
        </div>
        <?php echo $this->render('@app/views/site/modal/getFeedback.php',['id' => 'getFeedback']); ?>
    </section>

    <section class="activity cd-section " id="t2">
        
		<div class="bg">
		    <div class="bg-header">
				<img class="pc" src="/img/training/t1/bg-top.png" alt="bg top">
				<h1 class="pc"><span><?= Yii::t('training','Basic') ?> <?= Yii::t('training','trainings:') ?></span></h1>
				<h1 class="mob"><span><?= Yii::t('training','Basic') ?></span><br><?= Yii::t('training','trainings:') ?></h1>
			</div>
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('training/_t2.php'); ?>
			<footer>
				<img class="bg-footer pc" src="/img/training/t1/bg-bottom.png" alt="bg bottom">
				<div class="footer-wrap">
					<div class="text-wrap pc">
						<span class="uppercase"><?= Yii::t('training','Be the first to learn about new courses!')?></span>
						<span><?= Yii::t('training','Send a request and we will warn') ?> <?= Yii::t('training','you about the event 3 weeks before it starts') ?></span>
					</div>
					<div class="text-wrap mob">
							<span class="uppercase"><?= Yii::t('training','Be the first to learn about new courses!')?></span>
							<span><?= Yii::t('training','Send a request and we will warn') ?><br><?= Yii::t('training','you about the event 3 weeks before it starts') ?></span>
						</div>
					<div class="btn-wrap-clone"></div>
					<div class="btn-wrap animated delay-500ms">
						<a href="#" class="neon-btn neon-btn-normal neon-btn-with-icon" data-type="modal" data-target="sendRequest">
							<img class="btn-icon" src="/img/btn-icons/icon-send-request.png" alt="icon">	<?= Yii::t('static','Send request') ?></a>
					</div>
				</div>
			</footer>
		</div>
		<?php echo $this->render('@app/views/site/modal/sendRequest2.php',['id' => 'sendRequest']); ?>
	</section>
	<section class="cd-section" id="t3">
		<div class="bg">
		    <img class="bg-img pc" src="/img/training/t3/bg-center.png" alt="bg">
			<div class="bg-header">
				<img class="pc" src="/img/training/t3/bg-top.png" alt="bg top">
				<h1><span><?= Yii::t('training','the goals')?></span></h1>
				<p class="pc"><?= Yii::t('training','you will achieve')?><?= Yii::t('training','by completing continuing education courses:')?></p>
				<p class="mob"><?= Yii::t('training','you will achieve')?></p>
			</div>
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('training/_t3.php'); ?>
			<footer>
				<img class="bg-footer pc" src="/img/training/t3/bg-bottom.png" alt="bg bottom">
			</footer>
		</div>
	</section>
	<section class="cd-section" id="t4">
		<div class="bg">
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('training/_t4.php'); ?>
		</div>
		<?php echo $this->render('@app/views/site/modal/enrollCourse.php',['id' => 'enrollCourse']); ?>
	</section>

	<section class="cd-section" id="t5">
		<div class="bg ">
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('training/_t5.php',['reviews'=>$reviews]); ?>
	</section>
	
	
	<?php 

$script = <<< JS

  $(document).ready(function () {
    console.log('c1 ready');

    if ($(window).width() < 449) {
      $('#t1 .btn-wrap').addClass('ownSlideInUp44').removeClass('opacity0');
    }
    if ($(window).width() > 1050) {
      $('#t1 .btn-wrap').addClass('ownSlideInUp7').removeClass('opacity0');
    }

    var slidesPerV = 4,
      spaceB = 5;
    if ($(window).width() < 449) {
      slidesPerV = 1;
      spaceB = 5;
    } else {
      slidesPerV = 4;
      spaceB = 5;
    }

    var swiperC1 = new Swiper('.swiper-container_c1', {
      slidesPerView: slidesPerV,
      spaceBetween: spaceB,
      loop: true,
      // autoplay: {
      //   delay: 5000,
      //   disableOnInteraction: false,
      // },
      navigation: {
        nextEl: '.swiper-button-next_c1',
        prevEl: '.swiper-button-prev_c1',
      },
      pagination: {
        el: '.swiper-pagination_c1',
        dynamicBullets: true,
        clickable: true,
      },
    });
  })
  
  $(document).ready(function () {
    if ($(window).width() > 1049){
        $('#t2 .container').on('click', '.open-block', function (e) {
          e.preventDefault();
          let id = $(this).data('id');
          $('#t2 .item-wrap-' + id).addClass('w-50').removeClass('w-25 w-33'),
            $('#t2 .item-wrap:not(.item-wrap-' + id + ')').addClass('w-25').removeClass('w-33 w-50'),
            $('#t2 .item-wrap-' + id).find('.title').addClass('w-33'),
            $('#t2 .item-wrap-' + id).find('.text').removeClass('d-none').addClass('w-50'),
            $('#t2 .item-wrap-' + id).find('.btn-wrap, btn-wrap-clone').addClass('width-unset'),
    
            $('#t2 .item-wrap:not(.item-wrap-' + id + ')').find('.title').removeClass('w-33'),
            $('#t2 .item-wrap:not(.item-wrap-' + id + ')').find('.text').removeClass('w-50').addClass('d-none'),
            $('#t2 .item-wrap:not(.item-wrap-' + id + ')').find('.btn-wrap, btn-wrap-clone').addClass('width-unset'),
    
            $(this).removeClass('open-block').addClass('close-block').text('закрыть'),
            $('#t2 .item-wrap:not(.item-wrap-' + id + ')').find('.neon-btn').addClass('open-block').removeClass(
              'close-block').text('посмотреть')
        });
        
        $('#t2 .container').on('click', '.close-block', function (e) {
          e.preventDefault();
          let id = $(this).data('id');
          $(this).removeClass('close-block').addClass('open-block').text('посмотреть'),
            $('#t2 .item-wrap-' + id).find('.title').removeClass('w-33'),
            $('#t2 .item-wrap-' + id).find('.text').removeClass('w-50').addClass('d-none'),
            $('#t2 .item-wrap-' + id).find('.btn-wrap, btn-wrap-clone').removeClass('width-unset'),
            $('#t2 .item-wrap').removeClass('w-50 w-25').addClass('w-33');
        });
    } else {
        $('#t2 .container').on('click', '.open-block', function (e) {
          e.preventDefault();
          let id = $(this).data('id');
        //   $('.item-wrap-' + id).addClass('w-50').removeClass('w-25 w-33'),
            // $('.item-wrap:not(.item-wrap-' + id + ')').addClass('w-25').removeClass('w-33 w-50'),
            // $('.item-wrap-' + id).find('.title').addClass('w-33'),
            $('#t2 .item-wrap-' + id).find('.text').removeClass('d-none'),
            $('#t2 item-wrap-' + id).find('.btn-wrap, .btn-wrap-clone').css('top', '80%'),
            $('#t2 .item-wrap:not(.item-wrap-' + id + ')').find('.btn-wrap, .btn-wrap-clone').css('top', '65%'),
            // $('.item-wrap:not(.item-wrap-' + id + ')').find('.title').removeClass('w-33'),
            $('#t2 .item-wrap:not(.item-wrap-' + id + ')').find('.text').addClass('d-none'),
            // $('.item-wrap:not(.item-wrap-' + id + ')').find('.btn-wrap, btn-wrap-clone').addClass('width-unset'),
    
            $(this).removeClass('open-block').addClass('close-block').text('закрыть'),
            $('#t2 .item-wrap:not(.item-wrap-' + id + ')').find('.neon-btn').addClass('open-block').removeClass('close-block').text('посмотреть');
            
            var size = parseFloat($("html").css('font-size')) * 16;
            if($('#t2 .item-wrap-' + id).height() < size) {
                $('#t2 .item-wrap-' + id).find('.btn-wrap, .btn-wrap-clone').css('top', '65%')
            } else {
                $('#t2 .item-wrap-' + id).find('.btn-wrap, .btn-wrap-clone').css('top', '80%')
            }
        });
        
        $('#t2 .container').on('click', '.close-block', function (e) {
          e.preventDefault();
          let id = $(this).data('id');
          $(this).removeClass('close-block').addClass('open-block').text('посмотреть'),
            // $('.item-wrap-' + id).find('.title').removeClass('w-33'),
            $('#t2 .item-wrap-' + id).find('.text').addClass('d-none'),
            $('#t2 .item-wrap-' + id).find('.btn-wrap, .btn-wrap-clone').css('top', '65%'),
            $('#t2 .item-wrap:not(.item-wrap-' + id + ')').find('.btn-wrap, .btn-wrap-clone').css('top', '65%')
            // $('.item-wrap').removeClass('w-50 w-25').addClass('w-33');
        });
    }

    // Animate
    if ($(window).width() < 1050) {
      $('#t2 main .item-wrap').waypoint(function () {
        $(this.element).find('.btn-wrap').addClass('ownSlideInUp');
      }, {
        offset: '70%'
      });
      $('#t2 footer .footer-wrap').waypoint(function () {
        $(this.element).find('.btn-wrap').addClass('ownSlideInUp2');
      }, {
        offset: '70%'
      });
    }
  })
  
  $(document).ready(function () {
    //on block b2 click event (open and close items)
    // $('.container').on('click', '.open-block', function (e) {
    //   e.preventDefault();
    //   let id = $(this).data('id');
    //   $('.item-wrap-' + id).addClass('w-50').removeClass('w-25 w-33'),
    //     $('.item-wrap:not(.item-wrap-' + id + ')').addClass('w-25').removeClass('w-33 w-50'),
    //     $('.item-wrap-' + id).find('.title').addClass('w-50'),
    //     $('.item-wrap-' + id).find('.text').removeClass('d-none'),
    //     $('.item-wrap:not(.item-wrap-' + id + ')').find('.title').removeClass('w-50'),
    //     $('.item-wrap:not(.item-wrap-' + id + ')').find('.text').addClass('d-none'),
    //     $(this).removeClass('open-block').addClass('close-block').text('закрыть'),
    //     $('.item-wrap:not(.item-wrap-' + id + ')').find('.neon-btn').addClass('open-block').removeClass(
    //       'close-block').text('посмотреть')
    // });
    // $('.container').on('click', '.close-block', function (e) {
    //   e.preventDefault();
    //   let id = $(this).data('id');
    //   $(this).removeClass('close-block').addClass('open-block').text('посмотреть'),
    //     $('.item-wrap-' + id).find('.title').removeClass('w-50'),
    //     $('.item-wrap-' + id).find('.text').addClass('d-none'),
    //     $('.item-wrap').removeClass('w-50 w-25').addClass('w-33');
    // })

    $('#t3 .item-wrap').waypoint(function () {
      let dataId = $(this.element).data('id');
      $(this.element).find('.item-icon').removeClass('delay-500ms delay-1s delay-1500ms  delay-2s delay-2500ms delay-3500ms delay-4s delay-4500ms delay-5s delay-5500ms delay-6500ms delay-7s').addClass('fadeIn');
      if (dataId === 2 || dataId === 4) {
        $(this.element).find('.item-text, .step').removeClass('delay-500ms delay-1s delay-1500ms  delay-2s delay-2500ms delay-3500ms delay-4s delay-4500ms delay-5s delay-5500ms delay-6500ms delay-7s').addClass('fadeInLeft-2 delay-500ms');
      } else {
        $(this.element).find('.item-text, .step').removeClass('delay-500ms delay-1s delay-1500ms delay-2s delay-2500ms delay-3500ms delay-4s delay-4500ms delay-5s delay-5500ms delay-6500ms delay-7s').addClass('fadeInRight-2 delay-500ms');
      }
    }, {
      offset: '80%'
    });

    // Animation icon on hover to item-wrap
    setTimeout(function () {
      $('#t3 .item-wrap').hover(function (e) {
        e.preventDefault();
        console.log(this);
        let id = $(this).data('animate-id');
        $(this).find('.icon-animate').addClass('shadow');
        $(this).addClass('item-wrap-' + id + '-hover');
      }, function (e) {
        e.preventDefault();
        let id = $(this).data('animate-id');
        $(this).find('.icon-animate').removeClass('shadow');
        $(this).removeClass('item-wrap-' + id + '-hover');
      })
    }, 1000);


  });
  
  $(document).ready(function () {

    onceMMob = true;

    function ggg() {
      animateOn2(1);
      once = true;
    }

    function animateOn2(activeTxt) {
      if (activeTxt == 1) {
        activeTxt = 2;
      }
      if (activeTxt == 10) {
        activeTxt = 1;
        animateOn2(activeTxt + 1);
      }
      if (onceMMob && activeTxt == 1) {
        return;
      }
      $('.item__icon-wrap[data-id=' + activeTxt + ']').addClass('animated colorChange');
      setTimeout(function () {
        $('.item__icon-wrap[data-id=' + activeTxt + ']').removeClass('animated colorChange')
        if (!onceMMob && activeTxt == 1) {
          return;
        }
        animateOn2(activeTxt + 1);
      }, 2000);
    };

    console.log('b4 ready');
    var waypointC4 = new Waypoint({
      element: $('#t4 .content-wrap'),
      handler: function () {
        if ($(window).width() < 449) {
          $('#t4 main .item__dot').addClass('fadeIn').removeClass('opacity0');
          $('#t4 main .item__text').addClass('fadeIn').removeClass('opacity0');
          $('#t4 main .item__icon-color').addClass('fadeIn').removeClass('opacity0');
          $('#t4 .btn-wrap').addClass('ownSlideInUp4');
          // ggg();
        }
      },
      offset: '50%'
    });
  });
  
   $('document').ready( function() {
      console.log('с5 ready');
      var slidesPerV = 1,
          spaceB = 10;
      if($(window).width() < 449) {
        slidesPerV = 1;
        spaceB = 10;
      } else {
        slidesPerV = 4;
        spaceB = 40;
      }
      var swiperС5= new Swiper('.swiper-container_с5', {
          slidesPerView: slidesPerV,
          spaceBetween: spaceB,
          loop: true,
          navigation: {
            nextEl: '.swiper-button-next_с5',
            prevEl: '.swiper-button-prev_с5',
          },
          pagination: {
            el: '.swiper-pagination_с5',
            dynamicBullets: true,
            clickable: true,
          },
      });
    });

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>