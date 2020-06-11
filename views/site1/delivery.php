<?php $this->title = $service_one->name; ?>
<?php include "header.php";?>
<section class = "delivery-page1 web">
    <div class="container deliveries flex">
        <div class="left-block start">
            <div class="top-title">
                <!-- <p class = "upper">Образовательные online программы</p>
                <p id = "p2">по промышленной безопасности и охране труда</p> -->
                <?=$service_one->content->subtitle?>
            </div>
            <div class="overflowBlock">
<!--                <hr class = "line_under_paragraph">-->
                <!-- <div class="paragraph-1">
                    <p>Компания HSE consulting group проводит дистанционные обучающие курсы в сфере промышленной безопасности.
                        В режим реального времени позволяет получить все необходимые знания по курсу за 2-5 дней без отрыва от производства. </p>
                    <p >Изпользуемая нами платформа для удаленного обучения не требует дополнительной установки и обеспечивает быстрый доступ
                        к вебинарам, учебным документам и видеозаписям.</p>
                    </p>
                </div>
                <div class="general_topics">
                    <p>Основные темы  on-line обучения</p>
                    <ol>
                        <li>Безопасность и Охрана труда;</li>
                        <li>Подготовка, переподготовка в области обеспечения промышленной безопастности;</li>
                        <li>Повышение квалификации в области обеспечения промышленной безопастности;</li>
                        <li>Обучение по пожарно-техническому минимуму;<br>Проверка знаний по электробезопасности ПУЭ и ПТБ</li>
                    </ol>
                </div> -->
                <?=$service_one->content->description?>

            </div>
<!--            <div class="order_call">-->
<!--                <div class="title-order">-->
<!--                    <p>Закажите обратный звонок, и мы перезвоним вам</p>-->
<!--                    <p class = "upper">в течении 30 минут</p>-->
<!--                </div>-->
<!--                <button class = "order_call_btn get_btn" data-id = "ЗАКАЗАТЬ ЗВОНОК">-->
<!--                    <p>ЗАКАЗАТЬ ЗВОНОК</p>-->
<!--                </button>-->
<!--                <div class="order_img">-->
<!--                    <img src="/img1/delivery/order-on-del.png"/>-->
<!--                </div>-->
<!--            </div>-->
        </div>
<!--        <div class="right-block">-->
<!--            <div id = "car1" class="owl-carousel image-sliders">-->
<!--                --><?php //if ($service_one->images != null): ?>
<!--                    --><?php //foreach ($service_one->images as $image): ?>
<!--                        <img class = "item" src="/--><?//=$image?><!--"/>-->
<!--                    --><?php //endforeach; ?>
<!--                --><?php //endif; ?>
<!--                <img class = "item" src="/img1/delivery/slider-delivery.png"/>-->
<!--                <img class = "item" src="/img1/delivery/slider-delivery.png"/>-->
<!--                <img class = "item" src="/img1/delivery/slider-delivery.png"/> -->
<!--            </div>-->
<!--            --><?php //if ($service_one->images != null && count($service_one->images) > 1): ?>
<!--                <div class="arrows flex">-->
<!--                    <div class="arrow_left">-->
<!--                        <img src="/img1/delivery/arrow-left.png"/>-->
<!--                    </div>-->
<!--                    <div class = "arrow_right">-->
<!--                        <img src="/img1/delivery/arrow-right.png"/>-->
<!--                    </div>-->
<!--                </div>-->
<!--            --><?php //endif; ?>
<!--        </div>-->
    </div>
</section>
<section id="servicesPage_mob" class="mobile">
    <div class="pageTitle_mob">
        <div class="container_mob">
            <p class="pageTitle_text_mob">Услуги</p>
        </div>
    </div>
    <div class="container_mob">
        <div class="servicesAbout_mob">
            <div class="servicesAbout_title_mob">
                <!-- <p class="upper">Образовательные online программы</p>
                <p>по промышленной безопасности и охране труда</p> -->
                <?=$service_one->content->subtitle?>
            </div>
            <!-- <div class="servicesAbout_text_mob">
                <p>
                    Компания HSE consulting group проводит дистанционные обучающие курсы
                    в сфере промышленной безопасности. Режим реального времени позволяет
                    получить все необходимые знания по курсу за 2-5 дней без отрыва от производства.
                    Используемая нами платформа для удаленного обучения не требует
                    дополнительной установки и обеспечивает быстрый доступ к вебинарам,
                    учебным документам и видеозаписям.
                </p>
            </div>
            <div class="servicesAbout_generalTopics_mob">
                <p>Основные темы  on-line обучения</p>
                <ol>
                    <li>Безопасность и Охрана труда;</li>
                    <li>Подготовка, переподготовка в области обеспечения промышленной безопастности;</li>
                    <li>Повышение квалификации в области обеспечения промышленной безопастности;</li>
                    <li>Обучение по пожарно-техническому минимуму;<br>Проверка знаний по электробезопасности ПУЭ и ПТБ</li>
                </ol>
            </div> -->
            <?=$service_one->content->description?>
            <?php if ($service_one->images != null): ?>
                <div id="HSE_Slider_mob" class="HSE_Slider_mob owl-carousel">
                    <?php foreach ($service_one->images as $image): ?>
                        <div class="servicesPhotoSlider_item"><img src="/<?=$image?>" alt="img"></div>
                    <?php endforeach; ?>
                    <!-- <div class="servicesPhotoSlider_item"><img src="..//img1/mobile/photoExample.png" alt="img"></div>
                    <div class="servicesPhotoSlider_item"><img src="..//img1/mobile/photoExample.png" alt="img"></div>-->
                </div>
            <?php endif; ?>
            <?php if ($service_one->images != null && count($service_one->images) > 1): ?>
                <div class="licenseSliderNav_mob">
                    <button class="HSE_Slider_mob_owl_control prev"><img class="slider_nav slider_nav_left_main" src="..//img1/slider_nav_left_main.png" alt="img"></button>
                    <button class="HSE_Slider_mob_owl_control next"><img class="slider_nav slider_nav_right_main" src="..//img1/slider_nav_right_main.png" alt="img"></button>
                </div>
            <?php endif; ?>
            <div class="get_consultation_mob">
            <div class="get_consultation_title_mob">
                <p class="get_consultation_title_1_mob">Закажите обратный звонок, и специалист HSE consulting group подберет для Вас эффективную</p>
                <p class="get_consultation_title_2_mob">программу обучения</p>
            </div>
            <div class="get_btn_wrap_mob">
                <div class="get_consultation_img_mob">
                    <img src="..//img1/mobile/get_consultation_img_2_mob.png" alt="img">
                </div>
                <button class="get_btn_mob get_btn">
                    <p>Получить консультацию</p>
                </button>
            </div>
        </div>
        </div>
    </div>
</section>
<?php include "footer.php"; ?>
