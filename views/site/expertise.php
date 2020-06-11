<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name.' - '.$page->content->title;
$headerMenu = $this->render('main/_header.php',['pageName' => $page->content->title]);
$headerMenuPc = $this->render('main/_header.php',['pc'=>'pc',['pageName' => $page->content->title]]);
?>
 <section class="cd-section visible" id="e1">
        <div class="bg">
            <?php echo $headerMenu ?>
            <?php echo $this->render('expertise/_e1.php',['page'=>$page]); ?>
        </div>
        <?php echo $this->render('@app/views/site/modal/exRequest.php',['id' => 'exRequest']); ?>
    </section>

    <section class="activity cd-section " id="e2">
		<div class="bg">
		    <div class="bg-header">
				<img class="pc" src="/img/expertise/e2/bg-top.png" alt="bg top">
				<h1 class="pc"><span><?= Yii::t('expertise','The safety review process') ?></span><br><?= Yii::t('expertise','includes the following steps:') ?></h1>
				<h1 class="mob"><span><?= Yii::t('expertise','The safety review process') ?></span><br><?= Yii::t('expertise','includes the following steps:') ?></h1>
			</div>
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('expertise/_e2.php'); ?>
			<footer class="pc">
				<img class="bg-footer pc" src="/img/expertise/e2/bg-bottom.png" alt="bg bottom">
				<div class="footer-wrap">
					<img src="/img/expertise/e2/bg-bottom-line.png" alt="line">
					<div class="ray ray-1 slow animated flash infinite"></div>
					<div class="ray ray-2 slow animated flash infinite"></div>
					<div class="ray ray-3 slow animated flash infinite"></div>
				</div>
			</footer>
		</div>
	</section>
	<section class="cd-section" id="e3">
		<div class="bg">
		    <img class="bg-img pc" src="/img/expertise/e3/bg-center.png" alt="bg">
			<div class="bg-header">
				<img class="pc" src="/img/expertise/e3/bg-top.png" alt="bg top">
				<h1><span><?= Yii::t('expertise','The list of documents' )?></span></h1>
				<p><?= Yii::t('expertise','on the basis of which we work:' )?></p>
			</div>
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('expertise/_e3.php'); ?>
			<footer>
				<img class="bg-footer pc" src="/img/expertise/e3/bg-bottom2.png" alt="bg bottom">
				<img class="bg-footer mob" src="/img/expertise/e3/mob-bg-bottom.png" alt="bg bottom">
				<div class="ray ray-1 slow animated flash infinite"></div>
				<div class="ray ray-2 slow animated flash infinite"></div>
				<div class="ray ray-3 slow animated flash infinite"></div>
				<div class="footer-wrap">
					<div class="notice-wrap">
						<p><?= Yii::t('expertise', '*The list of documentation may be updated and supplemented depending on the type of product.') ?></p>
					</div>
				</div>
				<div class="footer-wrap2">
					
					<div class="text-wrap">
						<span class="uppercase"><?= Yii::t('expertise', 'Download and read') ?><br></span>
						<span><?= Yii::t('expertise', 'the full list of documentation required for examination') ?></span>
					</div>
					<div class="btn-wrap-clone"></div>
					<div class="btn-wrap animated">
						<a href="/<?= $filelist ?>" class="neon-btn neon-btn-normal neon-btn-with-icon ">
							<img class="btn-icon" src="/img/btn-icons/icon-download2.png" alt="icon"> <?= Yii::t('expertise', 'Download list')?></a>
					</div>
				</div>
			</footer>
		</div>
	</section>
	<section class="cd-section" id="e4">
		<div class="bg">
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('expertise/_e4.php',['file'=>$file]); ?>
		</div>
	</section>

	<section class="cd-section" id="e5">
		<div class="bg ">
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('expertise/_e5.php', ['reviews' => $reviews]); ?>
	</section>
	
	
	<?php 

$script = <<< JS


$(document).ready(function () {

    if ($(window).width() < 449) {
      $('#e1 .btn-wrap').addClass('ownSlideInUp44').removeClass('opacity0');
    }
    if ($(window).width() > 1050) {
      $('#e1 .btn-wrap').addClass('ownSlideInUp7').removeClass('opacity0');
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
    $('.container').on('click', '.open-block', function (e) {
      e.preventDefault();
      let id = $(this).data('id');
      $('.item-wrap-' + id).addClass('w-50').removeClass('w-25 w-33'),
        $('.item-wrap:not(.item-wrap-' + id + ')').addClass('w-25').removeClass('w-33 w-50'),
        $('.item-wrap-' + id).find('.title').addClass('w-50'),
        $('.item-wrap-' + id).find('.text').removeClass('d-none'),
        $('.item-wrap:not(.item-wrap-' + id + ')').find('.title').removeClass('w-50'),
        $('.item-wrap:not(.item-wrap-' + id + ')').find('.text').addClass('d-none'),
        $(this).removeClass('open-block').addClass('close-block').text('закрыть'),
        $('.item-wrap:not(.item-wrap-' + id + ')').find('.neon-btn').addClass('open-block').removeClass(
          'close-block').text('посмотреть')
    });
    $('.container').on('click', '.close-block', function (e) {
      e.preventDefault();
      let id = $(this).data('id');
      $(this).removeClass('close-block').addClass('open-block').text('посмотреть'),
        $('.item-wrap-' + id).find('.title').removeClass('w-50'),
        $('.item-wrap-' + id).find('.text').addClass('d-none'),
        $('.item-wrap').removeClass('w-50 w-25').addClass('w-33');
    });

    // Animate
    if ($(window).width() < 1050) {
      $('#e2 main .item-wrap').waypoint(function () {
        $(this.element).find('.icon-wrap').removeClass('delay-500ms delay-2s delay-3500ms delay-5s').addClass('fadeIn');
        $(this.element).find('.number-wrap').removeClass('delay-1500ms delay-3s delay-4500ms').addClass('fadeIn delay-500ms');
        $(this.element).find('.line-wrap').removeClass('delay-2500ms delay-1s delay-4s').addClass('clipLeftToRight delay-1s');
      }, {
        offset: '75%'
      });
    }
  })
  
   $(document).ready(function () {
    //on block b2 click event (open and close items)
    $('.container').on('click', '.open-block', function (e) {
      e.preventDefault();
      let id = $(this).data('id');
      $('.item-wrap-' + id).addClass('w-50').removeClass('w-25 w-33'),
        $('.item-wrap:not(.item-wrap-' + id + ')').addClass('w-25').removeClass('w-33 w-50'),
        $('.item-wrap-' + id).find('.title').addClass('w-50'),
        $('.item-wrap-' + id).find('.text').removeClass('d-none'),
        $('.item-wrap:not(.item-wrap-' + id + ')').find('.title').removeClass('w-50'),
        $('.item-wrap:not(.item-wrap-' + id + ')').find('.text').addClass('d-none'),
        $(this).removeClass('open-block').addClass('close-block').text('закрыть'),
        $('.item-wrap:not(.item-wrap-' + id + ')').find('.neon-btn').addClass('open-block').removeClass(
          'close-block').text('посмотреть')
    });
    $('.container').on('click', '.close-block', function (e) {
      e.preventDefault();
      let id = $(this).data('id');
      $(this).removeClass('close-block').addClass('open-block').text('посмотреть'),
        $('.item-wrap-' + id).find('.title').removeClass('w-50'),
        $('.item-wrap-' + id).find('.text').addClass('d-none'),
        $('.item-wrap').removeClass('w-50 w-25').addClass('w-33');
    })

    // Animation icon on hover to item-wrap
    setTimeout(function () {
      $('#e3 .item-wrap').hover(function (e) {
        e.preventDefault();
        console.log(this);
        $(this).find('.icon-animate').addClass('shake');
      }, function (e) {
        e.preventDefault();
        $(this).find('.icon-animate').removeClass('shake');
      })
    }, 50);

    if ($(window).width() < 1050) {
      $('#e3 main .item-wrap').waypoint(function () {
        // Animation on b3
        $('#e3 .item-wrap').find('.item-icon').addClass('leftToRight');
        $('#e3 .item-wrap').find('.cube').addClass('fadeIn');
        $('#e3 .item-wrap').find('.dotted-line').addClass('clipLeftToRight');
      }, {
        offset: '75%'
      });
      $('#e3 .footer-wrap2').waypoint(function () {
        $('#e3 footer').find('.btn-wrap').addClass('ownSlideInUp5');
      }, {
        offset: '80%'
      });
    }


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
      if (activeTxt == 6) {
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
      element: $('#e4 .content-wrap'),
      handler: function () {
        if ($(window).width() < 449) {
          $('#e4 main .item__dot').removeClass('opacity0');
          $('#e4 main .item__text').removeClass('opacity0');
          $('#e4 main .item__icon').removeClass('opacity0');
          $('#e4 .btn-wrap').addClass('ownSlideInUp44');
          
          ggg();
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