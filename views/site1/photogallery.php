<?php $this->title = 'Фотогалерея'; ?>
<?php include 'header.php';?>
    <section class="web" id="photoGallery_page">
        <div class="photoGalleryTitle">
                <div class="container">
                    <p class="photoGalleryTitle_text">Фотогалерея</p>
                </div>
        </div>
        <div class="container">
            <div class="photoGallery_dateNavWrap">
                <div class="photoGallery_yearsSliderWrap">
                    <!--
					<button class="photoGallery_yearsSlider_owl_control prev"><img class="photoGallery_yearsSlider_nav_left_main" src="/img1/photoGallery_yearsSlider_nav_left_main.png" alt="img"></button>
                    <button class="photoGallery_yearsSlider_owl_control next"><img class="photoGallery_yearsSlider_nav_right_main" src="/img1/photoGallery_yearsSlider_nav_right_main.png" alt="img"></button>
					-->
                    <div id="photoGallery_yearsSlider" class="photoGallery_yearsSlider ">
                        <?php foreach ($year as $y): ?>
                            <div class="photoGallery_yearsSlider_item" data-id="<?=$y[0]?>">
                                <div class="yearsSlider_item_box">
                                    <a href="#">
                                        <div class="yearsSlider_item_year"><span><?=$y[0]?> г.</span></div>
                                        <div class="yearsSlider_item_amount"><span>(<?=$y[1]?>)</span></div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div> 
                    
                </div>
                <div class="dateNavWrap_line"></div>
                <div class="dateNavWrap_months">
                                    
                </div>
            </div>
            <div id="contentPhotoGallery">
            <?php $count=0; foreach ($photogallery as $gallery): ?>
                <div class="photoGallery_photoSliderWrap">
                    <div class="photoGallery_photoSlider_title">
                        <div class="photoGallery_photoSlider_title_text">
                            <span>
                                <!-- “Lorem Ipsum” -->
                                <?=$gallery->title?>
                            </span>
                        </div>
                        <div class="photoGallery_photoSlider_title_date">
                        </div>
                    </div>
                    <div class="photoGallery_photoSlider_line"></div>
                    <div class="photoGallery_photoSlider_about">
                        <p>
                            <!-- It is a long established fact that a reader will be distracted. -->
                            <?=$gallery->description?>
                        </p>
                    </div>
                    <div class="photoGallery_photoSliderBox">
                        <?php $images = json_decode($gallery->photo); if (gettype($images) == 'array' && count($images) > 1): ?>
                            <button class="photoGallery_photoSlider_owl_control prev sl<?=$count?>"><img class="slider_nav slider_nav_left_main" src="/img1/slider_nav_left_main.png" alt="img"></button>
                            <button class="photoGallery_photoSlider_owl_control next sl<?=$count?>"><img class="slider_nav slider_nav_right_main" src="/img1/slider_nav_right_main.png" alt="img"></button>
                            <div id="photoGallery_photoSlider<?=$count?>" class="photoGallery_photoSlider owl-carousel">                                            
                                <?php $count++; ?>
                                <?php foreach ($images as $image): ?>
                                    <div class="photoGallery_photoSlider_item">
                                        <div class="photoGallery_photoSlider_item_box">
                                            <img src="/<?=$image?>" alt="img" class="myImg">
                                        </div>
                                    </div>
                                <?php endforeach; ?>                                                   
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?> 
            </div>
                
                <div data-id="3" class = "center_button" style="text-align: center;">                    
                    <button class = 'schedulle_button'>ЗАГРУЗИТЬ ЕЩЁ</button>
                </div>

                <div data-id="<?=$count?>" id="slider_counter"></div>
        </div>
		<div id="myModal" class="modal">
			<span class="close">&times;</span>
			<img class="modal-content" id="img01">
			<div id="caption"></div>
		</div>
	</section>
    <section class="mobile" id="photoGallery_page_mob">
        <div class="pageTitle_mob">
            <div class="container">
                <p class="pageTitle_text_mob">Фотогалерея</p>
            </div>
        </div>
        <div class="container">
            <div class="photoGallery_dateNavWrap_mob">
                <div class="photoGallery_dropDown">
                    <div class="selectDropDown-wrap">
                        <select id="yearSliderMob" class="selectDropDown">
                            <option value="none" class="short" selected>Не выбрано</option>
                            <?php foreach ($year as $y): ?>
                                <option value="<?=$y[0]?>" class="short"><?=$y[0]?> г.(<?=$y[1]?>)</option>                               
                            <?php endforeach; ?>
                        </select>
                    </div>                        
                </div>

                <div class="photoGallery_dropDown">
                    <select id="monthSliderMob" class="selectDropDown">
                        <option value="none" class="short" selected>Не выбрано</option>
                        <option value="1" class="short">Январь (0)</option>
                        <option value="2" class="short">Февраль (0)</option>
                        <option value="3" class="short">Март (0)</option>
                        <option value="4" class="short">Апрель (0)</option>
                        <option value="5" class="short">Май (0)</option>                    
                        <option value="6" class="short">Июнь (0)</option>
                        <option value="7" class="short">Июль (0)</option>
                        <option value="8" class="short">Август (0)</option>
                        <option value="9" class="short">Сентябрь (0)</option>
                        <option value="10" class="short">Октябрь (0)</option>
                        <option value="11" class="short">Ноябрь (0)</option>
                        <option value="12" class="short">Декабрь (0)</option>

                    </select>                    
                </div>                
            </div>
            <div id="contentPhotoGalleryM">
                <?php $count=0; foreach ($photogallery as $gallery): ?>            
                    <div class="photoGallery_photoSlider_title_date">
                    </div>
                    <div class="photoGallery_photoSlider_line"></div>
                    <div class="photoGallery_photoSlider_title_text">
                        <span>
                            <!-- “Lorem Ipsum” -->
                            <?=$gallery->title?>
                        </span>
                    </div>
                    <div class="photoGallery_photoSlider_line"></div>
                    <div class="photoGallery_photoSlider_about">
                        <p>
                            <!-- It is a long established fact that a reader will be distracted. -->
                            <?=$gallery->description?>
                        </p>
                    </div>
                    <?php $images = json_decode($gallery->photo); if (gettype($images) == 'array' && count($images) > 1): ?>
                        <div id="photoGallery_Slider_mob_0<?=$count?>" class="photoGallery_Slider_mob_0 owl-carousel">
                            <?php $count++;?>
                            <?php $i = 1; foreach ($images as $image) { ?>                            
                                <div class="photoGallery_Slider_item_mob">
                                    <div>
                                        <img src="/<?=$image?>" alt="img">
                                    </div>      
                                    <?php if (isset($images[$i+1])): ?>                          
                                        <div>
                                            <img src="/<?=$images[$i+1]?>" alt="img">
                                        </div>
                                    <?php endif; ?>
                                </div>                        
                            <?php $i+2; } ?>
                        </div>            
                        <div class="licenseSliderNav_mob">
                            <button class="photoGallery_Slider_mob_0_owl_control prev sl_mob<?=$count?>"><img class="slider_nav slider_nav_left_main" src="/img1/slider_nav_left_main.png" alt="img"></button>
                            <button class="photoGallery_Slider_mob_0_owl_control next sl_mob<?=$count?>"><img class="slider_nav slider_nav_right_main" src="/img1/slider_nav_right_main.png" alt="img"></button>
                        </div>
                    <?endif;?>
                <?php endforeach; ?>
            </div>

            <div data-id="<?=$count?>" id="slider_counterM"></div>
        </div>
    </section>
<?php include 'footer.php';?>
<script src="/js1/photoGallery.js"></script>
<script src="/js1/photoGall.js"></script>

