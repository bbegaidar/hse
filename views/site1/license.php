<?php $this->title = 'Лицензии и сертификаты'; ?>
<?php include "header.php"; ?>
<section class="license-page1 web">
    <div class="container">
        <div class="title-license">
            <p><span class = "upper">Лицензии и сертификаты,</span><br>позволяющие нам оказывать услуги</p>
        </div>
        <div class="flex slider-block ">
            <?php  ?>
<!--                <div style='--><?//=count($licences) < 3 ? 'visibility: hidden;' : '' ?><!--' class="left_arrow_partners left_carausel2">-->
<!--                    <img src="/img1/delivery/arrow-left.png"/>-->
<!--                </div>-->
            <?php  ?>
            <div id = "carausel2" class = "owl-carousel">
                <?php foreach($licences as $licence): ?>
                    <img class = "item img-item myImg" src="/<?=$licence->img?>" />
                <?php endforeach; ?>
            </div>
            <?php ?>
<!--                <div style='--><?//=count($licences) < 3 ? 'visibility: hidden;' : '' ?><!--' class="right_arrow_partners right_carausel2">-->
<!--                    <img src="/img1/delivery/arrow-right.png"/>-->
<!--                </div>-->
            <?php  ?>
        </div>
    </div>
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
</section>
<section id="licensePage_mob" class="mobile">
        <div class="container_mob">
            <div class="licensePageTitle_mob">
                <p class="licensePageTitle_mob_1">
                    Лицензии и сертификаты,
                </p>
                <p class="licensePageTitle_mob_2">
                    позволяющие нам оказывать услуги
                </p>
            </div>
            <div id="HSE_Slider_mob" class="HSE_Slider_mob owl-carousel">                                
                    <?php $count = 1; foreach ($licences as $licence): ?>
                        <?php if (($count+3)%3 == 1): ?>
                            <div class="licenseSlider_item_mob">
                        <?php endif; ?>
                            <div class="licenseSlider_item_licenseImg_mob"><img class="licenseImg_mob" src="/<?=$licence->img?>" alt="img"></div>
                        <?php if ($count%3 == 0 || $count == count($licences)): ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach;?>                    
                    <!-- <div class="licenseSlider_item_licenseImg_mob"><img class="licenseImg_mob" src="..//img1/mobile/licenseImg_mob.png" alt="img"></div>
                    <div class="licenseSlider_item_licenseImg_mob"><img class="licenseImg_mob" src="..//img1/mobile/licenseImg_mob.png" alt="img"></div>
                    <div class="licenseSlider_item_licenseImg_mob"><img class="licenseImg_mob" src="..//img1/mobile/licenseImg_mob.png" alt="img"></div> -->                
                <!-- <div class="licenseSlider_item_mob">
                    <div class="licenseSlider_item_licenseImg_mob"><img class="licenseImg_mob" src="..//img1/mobile/licenseImg_mob.png" alt="img"></div>
                    <div class="licenseSlider_item_licenseImg_mob"><img class="licenseImg_mob" src="..//img1/mobile/licenseImg_mob.png" alt="img"></div>
                    <div class="licenseSlider_item_licenseImg_mob"><img class="licenseImg_mob" src="..//img1/mobile/licenseImg_mob.png" alt="img"></div>
                </div>
                <div class="licenseSlider_item_mob">
                    <div class="licenseSlider_item_licenseImg_mob"><img class="licenseImg_mob" src="..//img1/mobile/licenseImg_mob.png" alt="img"></div>
                </div>                 -->
            </div>
            <div class="licenseSliderNav_mob">
                <button style="<?=count($licences) < 3 ? 'visibility: hidden;' : '' ?>" class="HSE_Slider_mob_owl_control prev"><img class="slider_nav slider_nav_left_main" src="..//img1/slider_nav_left_main.png" alt="img"></button>
                <button style="<?=count($licences) < 3 ? 'visibility: hidden;' : '' ?>" class="HSE_Slider_mob_owl_control next"><img class="slider_nav slider_nav_right_main" src="..//img1/slider_nav_right_main.png" alt="img"></button>
            </div>
        </div>
    </section>
<?php include "footer.php"; ?>
