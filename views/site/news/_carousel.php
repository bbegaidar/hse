

    <div class="main-content swiper-container">
        <div class="item-wrap item-wrap-pc swiper-wrapper pc">
            <?php 
            $i = 0;
            if ($news) {
                foreach ($news as $content) {
                    echo $this->render('_template.php', ['content' => $content, 'type' =>'pc', 'i'=>$i]);
                    ++$i;
                }
            }
            ?>
        </div>
        <div class="item-wrap item-wrap-mob swiper-wrapper mob">
             <?php 
            if ($news) {
                $chunked_news = array_chunk($news, 3);
                foreach ($chunked_news as $chunk){
                    echo '<div class="swiper-slide">';
                    foreach ($chunk as $content) {
                        echo $this->render('_template.php', ['content' => $content, 'type' =>'mob', 'i'=>$i]);
                        ++$i;
                    }
                    echo '</div>';
                }
                
            }
            ?>
        </div>
        <div class="btn-arrow-wrap pc">
            <div class="btn-item  swiper-button-prev">
                <div class="svg-container">
                    <svg class="svg" viewBox="0 0 55 40" preserveAspectRatio="none">
                        <polygon points="0,20 25,0 25,12 55,12 55,28 25,28 25,40"></polygon>
                    </svg>
                </div>
            </div>
            <div class="btn-item  swiper-button-next">
                <div class="svg-container">
                    <svg class="svg" viewBox="0 0 55 40" preserveAspectRatio="none">
                        <polygon points="0,12 30,12 30,0 55,20 30,40 30,28 0,28"></polygon>
                    </svg>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
                