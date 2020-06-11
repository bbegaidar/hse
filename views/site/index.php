<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
$headerMenu = $this->render('main/_header.php');
$headerMenuPc = $this->render('main/_header.php',['pc'=>'pc']);
?>

   
    <section class="cd-section visible" id="showcase">
        <div class="bg">
            <?php echo $headerMenu ?>
            <?php echo $this->render('main/_showcase.php'); ?>
        </div>
    </section>

    <section class="activity cd-section " id="activity">
		<div class="bg">
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('main/_activity.php'); ?>
		</div>
	</section>

    <?php if ($training) { ?>
	<section class="cd-section" id="sign-up">
		<div class="bg">
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('main/_sign-up.php',['training' => $training]); ?>
		</div>
	</section>
	<?php } ?>
	<section class="cd-section" id="results">
		<div class="bg">
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('main/_results.php'); ?>
		</div>
	</section>

	<section class="cd-section" id="docs">
		<div class="bg ">
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('main/_docs.php',['quality' => $quality, 'anticorruption' => $anticorruption, 'privacy' => $privacy]); ?>
		</div>
		<?php echo $this->render('@app/views/site/modal/sendRequest.php',['id' => 'sendRequest']); ?>
	</section>

	<section class="cd-section" id="gallery">
		<div class="bg ">
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('main/_gallery.php',['gallery'=>$gallery]); ?>
		</div>
	</section>
	<section class="cd-section" id="program">
		<div class="bg ">
			<?php echo $headerMenuPc ?>
			<?php echo $this->render('main/_program.php', ['trainings' => $trainings]); ?>
			<?php echo $this->render('mob/_social.php'); ?>
		</div>
	</section>
	
	<?php 

$script = <<< JS

$(document).ready(function () {
    if ($(window).width() < 1049) {
        
      $('#activity .btn-wrap').waypoint(function () {
        $(this.element).addClass('ownSlideInUp4 ');
      }, {
        offset: '80%'
      });
      
      $('#results .icon-wrap').waypoint(function () {
        $(this.element).removeClass('opacity00').addClass('fadeIn');
      }, {
        offset: '80%'
      });
      
      $('#docs .btn-wrap').waypoint(function () {
        $(this.element).removeClass('opacity00').addClass('ownSlideInUp4');
      }, {
        offset: '80%'
      });
      
    }
  })

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>