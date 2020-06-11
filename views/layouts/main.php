<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use app\widgets\WLang;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\OnlineAsset;
use app\assets\AboutAsset;
use app\assets\TrainingAsset;
use app\assets\ExpertiseAsset;
use app\assets\LoginAsset;
use yii\bootstrap\Modal;

if (Url::current() == Url::toRoute(['site/online']) ) {
    OnlineAsset::register($this);
} else if (Url::current() == Url::toRoute(['site/training']) ){
    TrainingAsset::register($this);
} else if (Url::current() == Url::toRoute(['site/expertise']) ) {
    ExpertiseAsset::register($this);
} else if (Url::current() == Url::toRoute(['site/about']) ) {
    AboutAsset::register($this);
} else if (Url::current() == Url::toRoute(['site/login']) ) {
    LoginAsset::register($this);
}else {
   AppAsset::register($this); 
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="hse.kz">
	<meta name="copyright" content="hse.kz">
	<meta name="description" content="HSE - ">
	<meta name="keywords" content="hse">
	<meta name="google-site-verification" content="" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
		.del-on-mob {
			display: none;
		}
	</style>
</head>

<body  data-hijacking="on" data-animation="rotate">
<?php $this->beginBody() ?>

    <?= Alert::widget() ?>
    
    <?= $content ?>
    
    <?php echo $this->render('@app/views/site/_menu.php'); ?>
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php 

$script = <<< JS

     if ($('.activity').hasClass('visible')) {
		$('#activity .item-wrap').addClass('zoomIn');
	}

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>
