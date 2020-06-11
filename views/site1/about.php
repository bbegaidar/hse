<?php $this->title = 'О компании HSE consulting group'; ?>
<?php include "header.php";?>
<section class="about-1 web">
    <div class="container about flex">
        <div class="left-block">
            <div class="top-title-about">
                <p>О компании HSE consulting group</p>
            </div>
            <div class="history_hse">
                <hr class = "line_under_company">
                <div class="paragraph-about">
                    <p>С 2009 года предоставляем услуги по обучению в области промышленной безопастности и охране труда.
                        Кроме того, мы проводим экспертизу промышленной безопастности. Специалистами нашей компании было разработано более
                        90 уникальных программ обучения и аттестации. Индивидуально подбирая каждую программу, учитываем потребности заказчика
                        и специализацию его деятельности. Использование дистанционных программ обучения позволяет сократить время оброзовательного
                        процесса и снизить стоимость курсов. Мы работаем в соответсвии с законом Республики Казахстан "О промышленной безопастности
                        на опасных производственных объектах" и международным стандартом OHSAS 18001. Обеспечиваем конфиденциальность информации информации
                        объективность в работе как в учебных классах.
                    </p>
                </div>
            </div>
            <div class="get_consultation">
                <div class="title-get">
                    <p>Обратитесь к специалистам HSE consulting group <span class = "upper">за бесплатной консультацией</span></p>
                </div>
                <button class="get_btn style-btn" data-id = "получить консультацию">
                    <p>Получить консультацию</p>
                </button>
                <div class="image_phone">
                    <img src="/img1/about/phone.png"/>
                </div>
            </div>
        </div>
        <div class="right-block-company">
            <div class="video-block">
                <img src="/img1/about/btn-on-video.png" class="btn-on-video video_click"/>
            </div>
            <video id="hse_video" controls>
                <source src="/<?=isset($video) ? $video->video_path : ''?>" type="video/mp4">
            </video>
        </div> 
    </div>
</section>
<section class="mobile">
    <div class="aboutPageTitle_mob">
        <div class="container_mob">
            <p class="aboutPageTitle_text_mob">
                <span class="aboutPageTitle_text_about_mob">
                    О компании
                </span>
                <span class="aboutPageTitle_text_HSE_mob">
                    HSE
                </span>
                <span class="aboutPageTitle_text_HSEtext_mob">
                    consulting group
                </span>
            </p>
        </div>
    </div>
    <div class="container_mob">
        <div class="aboutVideoBox_mob">
            <div class="video-block video-block_mob">
                <img src="/img1/about/btn-on-video.png" class="btn-on-video video_click_mob"/>
            </div>
            <video id="hse_video_mob" controls>
                <source src="/<?=isset($video) ? $video->video_path : ''?>" type="video/mp4">
            </video>
        </div>
        <div class="aboutPageInfo_mob">
            <p>
                С 2009 года предоставляем услуги по обучению в области
                промышленной безопасности и охране труда. Кроме того,
                мы проводим экспертизу промышленной безопасности. Специалистами
                нашей компании было разработано более 90 уникальных
                программ обучения и аттестации. Индивидуально подбирая
                каждую программу, учитываем потребности заказчика и
                специализацию его деятельности. Использование дистанционных
                программ обучения позволяет сократить время образовательного
                процесса и снизить стоимость курсов. Мы работаем в соответствии
                с законом Республики Казахстан «О промышленной безопасности на
                опасных производственных объектах» и международным стандартом
                OHSAS 18001. Обеспечиваем конфиденциальность информации и
                объективность в работе как в учебных классах.
            </p>
        </div>
        <div class="get_consultation_mob">
            <div class="get_consultation_title_mob">
                <p class="get_consultation_title_1_mob">Обратитесь к специалистам HSE consulting group</p>
                <p class="get_consultation_title_2_mob">За бесплатной консультацией</p>
            </div>
            <div class="get_btn_wrap_mob">
                <div class="get_consultation_img_mob">
                    <img src="..//img1/mobile/get_consultation_img_mob.png" alt="img">
                </div>
                <button class="get_btn get_btn_mob">
                    <p>Получить консультацию</p>
                </button>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php"; ?>