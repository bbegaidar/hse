<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name.' - '.$page->content->title;
$headerMenu = $this->render('main/_header.php',['pageName' => $page->content->title]);
$headerMenuPc = $this->render('main/_header.php',['pageName' => $page->content->title,'pc'=>'pc']);
?>
 <section class="cd-section visible" id="o1">
        <div class="bg">
            <?php echo $headerMenu ?>
            <?php echo $this->render('online/_o1.php',['page'=>$page]); ?>
        </div>
        <?php echo $this->render('@app/views/site/modal/getFeedback.php',['id' => 'getFeedback']); ?>
    </section>

    <section class="activity cd-section " id="o2">
		<div class="bg">
		    <div class="bg-header">
				<img class="pc" src="/img/online/o1/bg-top.png" alt="bg top">
				<h1 class="pc"><span><?= Yii::t('online','main topics')?></span> <?= Yii::t('online','and directions of training programs:')?></h1>
				<h1 class="mob"><span><?= Yii::t('online','main topics')?></span><br><?= Yii::t('online','and directions of training programs:')?></h1>
			</div>
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('online/_o2.php'); ?>
			<footer>
				<img class="bg-footer pc" src="/img/online/o1/bg-bottom.png" alt="bg bottom">
				<div class="footer-wrap">
					<div class="text-wrap pc">
						<span class="uppercase"><?= Yii::t('online','download')?></span>
						<span><?= Yii::t('online','the full list of training courses<br>and choose the one that suits you')?></span>
					</div>
					<div class="text-wrap mob">
							<span class="uppercase"><?= Yii::t('online','Download the full list<br>of training courses')?></span>
							<span><?= Yii::t('online','and choose the one that suits you')?></span>
						</div>
					<div class="btn-wrap-clone"></div>
					<div class="btn-wrap animated delay-500ms">
						<a href="/<?= $filelist ?>" class="neon-btn neon-btn-normal neon-btn-with-icon  download">
							<img class="btn-icon" src="/img/online/o2/icon-download.png" alt="icon download"> <?= Yii::t('online','Download list')?></a>
					</div>
				</div>
			</footer>
		</div>
	</section>
	<section class="cd-section" id="o3">
		<div class="bg">
		    <img class="bg-img pc" src="/img/online/o3/bg-center.png" alt="bg">
		    <div class="bg-header">
				<img class="pc" src="/img/online/o3/bg-top.png" alt="bg top">
				<h1><span><?= Yii::t('online','Take 5 steps')?></span></h1>
				<p><?= Yii::t('online','to gain new knowledge:')?></p>
			</div>
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('online/_o3.php'); ?>
			<footer>
				<img class="bg-footer pc" src="/img/online/o3/bg-bottom.png" alt="bg bottom">
			</footer>
		</div>
	</section>
	<section class="cd-section" id="o4">
		<div class="bg">
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('online/_o4.php'); ?>
		</div>
		<?php echo $this->render('@app/views/site/modal/enrollCourse.php',['id' => 'enrollCourse']); ?>
	</section>

	<section class="cd-section" id="o5">
		<div class="bg ">
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('online/_o5.php', ['reviews' => $reviews]); ?>
	</section>
	
	
	<?php 

$script = <<< JS


 $(document).ready(function () {
    // console.log('c1 ready');

    if ($(window).width() < 449) {
      $('#o1 .btn-wrap').addClass('ownSlideInUp44').removeClass('opacity0');
    }
    if ($(window).width() > 1050) {
      $('#o1 .btn-wrap').addClass('ownSlideInUp7').removeClass('opacity0');
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
       // Animate
        if ($(window).width() < 1050) {
          $('#o2 main .item-wrap').waypoint(function () {
            $(this.element).find('.btn-wrap').addClass('ownSlideInUp');
          }, {
            offset: '70%'
          });
          $('#o2 footer .footer-wrap').waypoint(function () {
            $(this.element).find('.btn-wrap').addClass('ownSlideInUp2');
          }, {
            offset: '70%'
          });
        }
       
       if ($(window).width() > 1049){
        $('#o2 .container').on('click', '.open-block', function (e) {
          e.preventDefault();
          let id = $(this).data('id');
          $('#o2 .item-wrap-' + id).addClass('w-50').removeClass('w-25 w-33'),
            $('#o2 .item-wrap:not(.item-wrap-' + id + ')').addClass('w-25').removeClass('w-33 w-50'),
            $('#o2 .item-wrap-' + id).find('.title').addClass('w-33'),
            $('#o2 .item-wrap-' + id).find('.text').removeClass('d-none').addClass('w-50'),
            $('#o2 .item-wrap-' + id).find('.btn-wrap, btn-wrap-clone').addClass('width-unset'),
    
            $('#o2 .item-wrap:not(.item-wrap-' + id + ')').find('.title').removeClass('w-33'),
            $('#o2 .item-wrap:not(.item-wrap-' + id + ')').find('.text').removeClass('w-50').addClass('d-none'),
            $('#o2 .item-wrap:not(.item-wrap-' + id + ')').find('.btn-wrap, btn-wrap-clone').addClass('width-unset'),
    
            $(this).removeClass('open-block').addClass('close-block').text('закрыть'),
            $('#o2 .item-wrap:not(.item-wrap-' + id + ')').find('.neon-btn').addClass('open-block').removeClass(
              'close-block').text('посмотреть')
        });
        
        $('#o2 .container').on('click', '.close-block', function (e) {
          e.preventDefault();
          let id = $(this).data('id');
          $(this).removeClass('close-block').addClass('open-block').text('посмотреть'),
            $('#o2 .item-wrap-' + id).find('.title').removeClass('w-33'),
            $('#o2 .item-wrap-' + id).find('.text').removeClass('w-50').addClass('d-none'),
            $('#o2 .item-wrap-' + id).find('.btn-wrap, btn-wrap-clone').removeClass('width-unset'),
            $('#o2 .item-wrap').removeClass('w-50 w-25').addClass('w-33');
        });
    } else {
        $('#o2 .container').on('click', '.open-block', function (e) {
          e.preventDefault();
          let id = $(this).data('id');
        //   $('.item-wrap-' + id).addClass('w-50').removeClass('w-25 w-33'),
            // $('.item-wrap:not(.item-wrap-' + id + ')').addClass('w-25').removeClass('w-33 w-50'),
            // $('.item-wrap-' + id).find('.title').addClass('w-33'),
            $('#o2 .item-wrap-' + id).find('.text').removeClass('d-none'),
            // $('.item-wrap-' + id).find('.btn-wrap, .btn-wrap-clone').css('top', '80%'),
            $('#o2 .item-wrap:not(.item-wrap-' + id + ')').find('.btn-wrap, .btn-wrap-clone').css('top', '65%'),
            // $('.item-wrap:not(.item-wrap-' + id + ')').find('.title').removeClass('w-33'),
            $('#o2 .item-wrap:not(.item-wrap-' + id + ')').find('.text').addClass('d-none'),
            // $('.item-wrap:not(.item-wrap-' + id + ')').find('.btn-wrap, btn-wrap-clone').addClass('width-unset'),
    
            $(this).removeClass('open-block').addClass('close-block').text('закрыть'),
            $('#o2 .item-wrap:not(.item-wrap-' + id + ')').find('.neon-btn').addClass('open-block').removeClass('close-block').text('посмотреть');
            
            var size = parseFloat($("html").css('font-size')) * 16;
            // console.log($('.item-wrap-' + id).height);
            if($('#o2 .item-wrap-' + id).height() < size) {
                $('#o2 .item-wrap-' + id).find('.btn-wrap, .btn-wrap-clone').css('top', '65%')
            } else {
                $('#o2 .item-wrap-' + id).find('.btn-wrap, .btn-wrap-clone').css('top', '80%')
            }
        });
        
        $('#o2 .container').on('click', '.close-block', function (e) {
          e.preventDefault();
          let id = $(this).data('id');
          $(this).removeClass('close-block').addClass('open-block').text('посмотреть'),
            // $('.item-wrap-' + id).find('.title').removeClass('w-33'),
            $('#o2 .item-wrap-' + id).find('.text').addClass('d-none'),
            $('#o2 .item-wrap-' + id).find('.btn-wrap, .btn-wrap-clone').css('top', '65%'),
            $('#o2 .item-wrap:not(.item-wrap-' + id + ')').find('.btn-wrap, .btn-wrap-clone').css('top', '65%')
            // $('.item-wrap').removeClass('w-50 w-25').addClass('w-33');
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
    
    if($(window).width() < 1049){ 
        $('#o3 .item-wrap').waypoint(function () {
          let dataId = $(this.element).data('id');
          $(this.element).find('.item-icon').removeClass('delay-1s delay-2500ms delay-4s delay-5500ms delay-7s').addClass('fadeIn');
          if (dataId === 2 || dataId === 4) {
            $(this.element).find('.item-text, .step').removeClass('delay-500ms delay-1s delay-2s delay-2500ms delay-3500ms delay-4s delay-5s delay-5500ms delay-6500ms delay-7s').addClass('fadeInLeft delay-500ms');
          } else {
            $(this.element).find('.item-text, .step').removeClass('delay-500ms delay-1s delay-2s delay-2500ms delay-3500ms delay-4s delay-5s delay-5500ms delay-6500ms delay-7s').addClass('fadeInRight delay-500ms');
          }
        }, {
          offset: '80%'
        });
    }

    // Animation icon on hover to item-wrap
    setTimeout(function () {
      $('#o3 .item-wrap').hover(function (e) {
        e.preventDefault();
        console.log(this);
        $(this).find('.icon-animate').addClass('shake');
      }, function (e) {
        e.preventDefault();
        $(this).find('.icon-animate').removeClass('shake');
      })
    }, 5000);


  });
  
   $(document).ready(function () {

    onceMMob = true;

    window.ggg = function() {
      animateOn2(1);
      once = true;
    }

    window.animateOn2 = function(activeTxt) {
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

    
    var waypointC4 = new Waypoint({
      element: $('#o4 .content-wrap'),
      handler: function () {
        if ($(window).width() < 1049) {
          $('#o4 main .item__dot-4 .item__text').removeClass('delay-3s').addClass('delay-3750ms');
          $('#o4 main .item__dot-5 .item__text').removeClass('delay-3750ms').addClass('delay-3s');
          $('#o4 main .item__dot-4 .item__icon').removeClass('delay-2750ms').addClass('delay-3500ms');
          $('#o4 main .item__dot-5 .item__icon').removeClass('delay-3500ms').addClass('delay-2750ms');
          $('#o4 main .item__dot').removeClass('opacity0');
          $('#o4 main .item__text').addClass('fadeIn').removeClass('opacity0');
          $('#o4 main .item__icon-color').removeClass('opacity0 animated');
          $('#o4 main .item__icon').addClass('fadeIn').removeClass('opacity0');
          $('#o4 .item-wrap__circle').addClass('ownClipPathB4 animated slower-1').removeClass('opacity0');
          $('#o4 .btn-wrap').addClass('ownSlideInUp6');
          // ggg();
        }
        
        },
      offset: '50%'
    });
  });
  
  $('document').ready( function() {
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