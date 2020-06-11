<?php $this->title = 'Нам доверяют'; ?>
<?php include "header.php"; ?>
<section class="partners-page1 web">
    <div class="container partners">
        <div class="title-partners">
            <p><span class = 'upper'>нам доверяют</span><br>такие крупные компании, как:</p>
        </div>
        <div class="slider-logo flex">
            <?php
                $slideCount = count($partners)/10;
                $slideCount = ceil($slideCount);  
            ?>            
            <div style="<?=$slideCount < 2 ? 'visibility: hidden;' : '' ?>" class="left_arrow_partners left_slider_partners">
                <img src="/img1/delivery/arrow-left.png"/>
            </div>
            <div id= 'slider_partners' class="owl-carousel flex">
                <?php                                                     
                    for ($i = 0; $i < $slideCount; $i++) {
                ?>                    
                    <div class="logo_sliders item">                        
                        <?php $count=1; foreach ($partners as $partner): ?>
                            <?php if (($count+5)%5 == 1): ?>
                                <div class="colomns flex ">
                            <?php endif; ?>
                        <div class = "partners_logo">
                            <img src="/<?=$partner->img?>"/>
                        </div>
                        <?php if ($count%5 == 0 || count($partners) == $count): echo '</div>'; endif; ?>
                        <?php $count++; endforeach; ?>
                    </div>
                <?php } ?>                
            </div>
            <div style="<?=$slideCount < 2 ? 'visibility: hidden;' : '' ?>" class="right_arrow_partners right_slider_partners">
                <img src="/img1/delivery/arrow-right.png"/>
            </div>
        </div>
    </div>
</section>
<section id="partnersPage_mob" class="mobile">
    <div class="container_mob">
        <div class="licensePageTitle_mob">
            <p class="licensePageTitle_mob_1">
               Нам доверяют
            </p>
            <p class="licensePageTitle_mob_2">
                такие крупные компании, как: 
            </p>
        </div>
        <div id="HSE_Slider_mob" class="HSE_Slider_mob owl-carousel">
            
            <?php $count=1; foreach ($partners as $partner): ?>
                <?php if (($count+6)%6 == 1): ?>
                    <div class="licenseSlider_item_mob">
                <?php endif; ?>            
                <div class="partnersImg_mob"><img src="/<?=$partner->img?>"/></div>
               
                <?php if ($count%6 == 0 || $count == count($partners)): ?>
                    </div>
                <?php endif; ?>
            <?php $count++; endforeach; ?>            
        </div>
        <div class="licenseSliderNav_mob">
            <button style="<?=count($partners) < 7 ? 'visibility: hidden;' : '' ?>" class="HSE_Slider_mob_owl_control prev"><img class="slider_nav slider_nav_left_main" src="..//img1/slider_nav_left_main.png" alt="img"></button>
            <button style="<?=count($partners) < 7 ? 'visibility: hidden;' : '' ?>" class="HSE_Slider_mob_owl_control next"><img class="slider_nav slider_nav_right_main" src="..//img1/slider_nav_right_main.png" alt="img"></button>
        </div>
    </div>
</section>
<?php include "footer.php"; ?>
<script>
var owl3 = $("#slider_partners");
owl3.owlCarousel({
	items:1,
	loop:true,
	margin:50,
	// center:true,
});
$(".left_slider_partners").click(function(){	
	owl3.trigger("prev.owl.carousel");
})
$(".right_slider_partners").click(function(){
	owl3.trigger("next.owl.carousel");
})
</script>