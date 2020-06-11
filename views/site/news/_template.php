<?php use yii\helpers\Url;?>

<div class="item <?= $type=='pc' ? 'swiper-slide' : false ; ?>">
    <div class="part-top">
      <div class="news-img-wrap">
        <svg height="100%" width="100%" viewBox="0 0 410 300">
            <defs>
                <pattern id="img<?= $i?>" patternUnits="userSpaceOnUse" width="100%" height="100%">
                    <image href="/<?= $content->photo ?>" x="0" y="0" height="310" />
                </pattern>
            </defs>
            <path fill="#fff" d="M0 160 L 0 110 Q 0 55, 60 50 L 360 10 Q 410 10, 410 80 L 410 60 410 240 Q 410 280, 370 280 L 390 280 370 280 355 300 340 280 60 280 Q 0 280, 0 240 Z"/>
            <path fill="url(#img<?= $i?>)" d="M10 160 L 10 110 Q 10 70, 55 60 L 350 20 Q 410 15, 400 110 L 400 70 400 240 Q 400 270, 370 270 L 370 270 60 270 Q 10 270, 10 240 Z"/>
        </svg>
        </div>
        <div class="date-wrap">
            <p><?= $content->date ?></p>
        </div>
        <div class="line pc"></div>
    </div>
    <div class="part-bottom">
        <div class="text-wrap">
            <p><?= $content->content->title ?></p>
        </div>
        <div class="btn-wrap">
            <a class="btn" href="<?= Url::current(['id' => $content->id]) ?>"><?= Yii::t('news', 'More') ?></a>
        </div>
        <div class="line"></div>
    </div>
</div>