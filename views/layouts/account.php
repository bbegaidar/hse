<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use app\widgets\WLang;
use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;


AppAsset::register($this);
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
<body>
<?php $this->beginBody() ?>
    <section class="cd-section visible" id="account-tests">
        <div class="bg">
            <?= $content ?> 
        </div>
    </section>

   <?php echo $this->render('@app/views/account/_menu.php'); ?>
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

