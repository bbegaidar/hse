<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>

<section class="cd-section" id="news-content">
    <div id="pageNews" class="pageNews cd-section2">
        <div class="bg ">
            <?php echo $this->render('main/_header.php',['pageName' => Yii::t('static','News')]) ?>
            <div class="bg-top mob"></div>
            <?php echo $this->render('news/_news_content.php', ['content' => $content]); ?>
            <?php echo $this->render('mob/_social.php'); ?>
        </div>
    </div>
</section>
