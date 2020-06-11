<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
$headerMenu = $this->render('main/_header.php');
?>

  <section class="cd-section" id="page-404">
    <div id="page404" class="page404 cd-section2">
      <div class="bg ">
       <?php echo $headerMenu ?>
        <main class="main">
          <div class="text-wrap">
            <p class="text-error">ошибка</p>
            <p class="text-404"><?= $exception->statusCode ?></p>
            <p class="text-info"><?= nl2br(Html::encode($message)) ?></p>
          </div>
          <div class="book book-1 pc">
            <img src="/img/page404/book-1.png" alt="Books">
          </div>
          <div class="book book-2">
            <img src="/img/page404/book-2.png" alt="Books">
          </div>
          <div class="btn btn-1">
            <div class="btn-wrap-clone btn-wrap-clone-1"></div>
            <div class="btn-wrap btn-wrap-1 animated ownSlideInUp67 delay-500ms">
              <a href="/" class="neon-btn neon-btn-normal"><?= Yii::t('static','Back to home') ?></a>
            </div>
          </div>
          <div class="btn btn-2">
            <div class="btn-wrap-clone btn-wrap-clone-2"></div>
            <div class="btn-wrap btn-wrap-2 animated ownSlideInUp06 delay-500ms">
              <a href="<?= Url::previous() ?>" class="neon-btn neon-btn-normal "><?= Yii::t('static','Previous page') ?></a>
            </div>
          </div>
        </main>
        <div class="bg-mob mob">
          <div class="icon-wrap">
            <div class="icon">
              <img src="/img/main-page/program/icon-insta.png" alt="Instagram icon">
            </div>
            <div class="icon">
              <img src="/img/main-page/program/icon-fb.png" alt="Facebook icon">
            </div>
          </div>
          <div class="maint-wrap">
            <div class="icon">
              <img src="/img/main-page/program/icon-maint.png" alt="Maint.kz icon">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>