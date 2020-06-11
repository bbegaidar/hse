<?php use yii\helpers\Url; ?>


   <main class="main">
          <aside>
            <div class="text-wrap">
              <div class="btn-wrap">
                  
                <a href="<?= Url::previous() ?>">
                  <div class="btn d-flex a-center">
                    <div class="triangle"></div>
                    <div class="text"><?= Yii::t('news', 'Back to news') ?></div>
                  </div>
                </a>
              </div>
            </div>
          </aside>
          <div class="main-content news-content d-flex a-center">
            <div class="item">
              <div class="part-top">
                <div class="news-img-wrap">
                    <svg height="100%" width="100%" viewBox="0 0 410 300" alt="<?= $content->content->title ?>" style="filter: drop-shadow(0 0 0.2rem rgba(0, 0, 0, 0.5));">
                        <defs>
                            <pattern id="img1" patternUnits="userSpaceOnUse" width="100%" height="100%">
                                <image href="/<?= $content->photo ?>" x="0" y="0" height="310" />
                            </pattern>
                        </defs>
                        <path fill="#fff" d="M0 160 L 0 110 Q 0 55, 60 50 L 360 10 Q 410 10, 410 80 L 410 60 410 240 Q 410 280, 370 280 L 390 280 370 280 355 300 340 280 60 280 Q 0 280, 0 240 Z"/>
                        <path fill="url(#img1)" d="M10 160 L 10 110 Q 10 70, 55 60 L 350 20 Q 410 15, 400 110 L 400 70 400 240 Q 400 270, 370 270 L 370 270 60 270 Q 10 270, 10 240 Z"/>
                    </svg>
                  
                </div>
                <div class="date-wrap">
                  <p><?= $content->date ?></p>
                </div>
                <div class="line"></div>
              </div>
            </div>
            <div class="text-box">
              <h3><?= $content->content->title ?></h3>
              <?= $content->content->description ?>
            </div>
          </div>
      </main>