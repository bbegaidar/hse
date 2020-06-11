<?php use frontend\assets\AppAsset;

AppAsset::register($this);

$js = <<< JS
$(function () {
    // $('html').attr('lang','kz');
});
$('.lang-switch').on('click', function(){
    var lang = $(this).attr('data-lang');
    setLang(lang);
});

function setLang(lang) {
    $.ajax({
         url:'/site/switch-lang',
         data:{language:lang},
         success: function(response) {
            console.log(response);
            response = JSON.parse(response);
            // location.reload();
            window._CURLANG = response.language;
        }
    });
}
JS;
$this->registerJs($js);
?>

<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>" class="no-js">
  <head>
    <meta charset="<?=Yii::$app->charset?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aqualine</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="Sunshine - Responsive vCard Template">
    <meta name="keywords" content="vcard, resposnive, retina, resume, jquery, css3, bootstrap, Sunshine, portfolio">
    <meta name="author" content="lmtheme">
    <link rel="shortcut icon" href="/img/znachok.png">

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/transition-animations.css">

    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/main.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
      integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="/js/fancybox/jquery.fancybox.css">
    <link rel="stylesheet" href="/js/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/css/media.css">

    <script src="/js/jquery-2.1.3.min.js"></script>
    <script src="/js/modernizr.custom.js"></script>

    <!--2gis-->
            <script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>

        <script src="/js/wow.min.js"></script>
        <script>
            new WOW().init();
      </script>
      <script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox();
    });
</script>

  </head>

  <body>

<?php
$lang = Yii::$app->language;
$ru_active = '';
$en_active = '';
$link = (string) Yii::$app->request->getUrl();
$check = substr($link, 0, 3);
$ru_link = '/ru' . $link;
$en_link = '/en' . $link;
if ($check == "/ru" || $check == "/ch" || $check == "/en") {
    $sm_link = mb_substr($link, 3);
    $ru_link = '/ru' . $sm_link;
    $en_link = '/en' . $sm_link;
}
?>

            <div class="subpages">
<section class="pt-page pt-page-1 section-with-bg section-paddings-0" data-id="home">

        <div class="tekstura">
               <img src="/img/tekstura.png" class="tekstura">
        </div>
        <div class="fullwidth-bg">
            <video loop muted autoplay class="fullscreen-bg__video">
            <source src="/video/1.mp4" class="fullscree" type="video/mp4">
            <!--<source src="/uploads/video.webm" type="video/webm">-->
            </video>
        </div>
        <div class="head">
            <div class="head1"><img src="/img/head1.png" class="headA">
            <a href="#"><img src="/img/headlogo.png" class="headlogo"></a></div>
            <div class="vverh"><a class="pt-trigger" href="#contacts" data-animation="61" data-goto="3">
                <div class="strelka">
                    <div class="out">
                       <img src="/img/strelka.png" class="strelkaout">
                        <img src="/img/strelkain.png"  class = "strelin strelin1">
                    </div>
                </div>
                <div class="strelkay">
                    <div class="out">
                       <img src="/img/yellowarrow2.png" class="strelkaout">
                    </div>
                </div>
                <p class="pstrelka"><?=Yii::t('app', 'контакты')?></p></a>
            </div>
        </div>
        <div class="center">
           <div class="vlevo"><a class="pt-trigger" href="#about_me" data-animation="59" data-goto="2">
                  <div class="strelka2">
                    <div class="out">
                       <img src="/img/strelka.png" class="strelkaout">
                        <img src="/img/strelkain2.png"  class = "strelin strelin2">
                    </div>
                </div>
                <div class="strelkay2">
                    <div class="out">
                       <img src="/img/yellowarrow.png" class="strelkaout">
                    </div>
                </div>
                <p class="pstrelka2"><?=Yii::t('app', 'о нас')?></p></a>
           </div>
            <div class="seredina">
                <img src="/img/kletka.png" class="seredina1">
                <img src="/img/gorka.png" class="seredina2">
                <div class="seredina3">
                    <img src="/img/logo.png" class="logo">
                    <p class="seredinap"><?=Yii::t('app', 'предоставляет полный спектр услуг')?></p>
                    <p class="seredinap2"><?=Yii::t('app', 'для индустрии<br>водных развлечений')?></p>
                    <a href="#fancy" class="fancybox"><button class="seredinabut"><p class="seredinabutp"><b><?=Yii::t('app', 'консультация')?></b></p></button></a>
                </div>
                <img src="/img/Compass.png" alt="" class="seredina4">
            </div>
            <div class="vpravo"><a class="pt-trigger" href="#services" data-animation="58" data-goto="5" id="perehod">
                  <div class="strelka3">
                    <div class="out">
                       <img src="/img/strelka.png" class="strelkaout">
                        <img src="/img/strelkain3.png"  class = "strelin strelin3">
                    </div>
                </div>
                <div class="strelkay3">
                    <div class="out">
                       <img src="/img/yellowarrow3.png" class="strelkaout">
                    </div>
                </div>
                <p class="pstrelka3"><?=Yii::t('app', 'услуги')?></p></a>
           </div>
        </div>
        <div class="end">
            <div class="end1"><img src="/img/end1.png" class="end11">
                <a href=""><img src="/img/faceebook.png" class="insta1"></a>
                <a href=""><img src="/img/instagram.png" class="insta2"></a>
                <a href=""><img src="/img/twitter.png" class="insta3"></a>
            </div>
            <div class="end2">
                <a class="pt-trigger" href="#portfolio" data-animation="60" data-goto="4"><div class="vniz">
                <p class="pstrelka4" id="vni"><?=Yii::t('app', 'портфолио')?></p>
                <div class="strelka4">
                    <div class="out">
                       <img src="/img/strelka.png" class="strelkaout">
                        <img src="/img/strelkain4.png"  class = "strelin strelin4">
                    </div>
                </div>
                <div class="strelkay4">
                    <div class="out">
                       <img src="/img/yellowarrow4.png" class="strelkaout">
                    </div>
                </div>
                </div></a>
            </div>
            <div class="end3"><img src="/img/end3.png" class="end33">
                <div class="enru">
                    <a href="<?=$ru_link?>" data-lang="ru-RU"><p class="ru"><b>RU</b></p></a>
                    <img src="/img/ruen.png" class="ruen">
                    <a href="<?=$en_link?>" data-lang="en-US"><p class="en"><b>EN</b></p></a>
                </div>
            </div>
        </div>
        <div class="black_loader">
            <img src="/img/load.gif">
        </div>
        <div id="fancy">
            <form>
               <div class="fancyform">
               <img src="/img/logo.png" class="modalimg">
                <p class="modalp"><b class="modalb"><?=Yii::t('app', 'ОСТАВЬТЕ ЗАЯВКУ')?></b><br><?=Yii::t('app', 'и получите консультацию нашего специалиста')?>
                 </p>
                 <select name="" id="" class="modalselect">
                     <option value=""><?=Yii::t('app', 'Выбрать раздел')?></option>
                     <option value=""><?=Yii::t('app', 'Аквапарки и спрей парки')?></option>
                     <option value=""><?=Yii::t('app', 'Бассейны и волновые парки')?></option>
                     <option value=""><?=Yii::t('app', 'SPA комплексы')?></option>
                     <option value=""><?=Yii::t('app', 'Фонтаны')?></option>
                     <option value=""><?=Yii::t('app', 'Игровые технологии')?></option>
                     <option value=""><?=Yii::t('app', 'Аквариумы')?></option>
                     <option value=""><?=Yii::t('app', 'Сафари парки')?></option>
                     <option value=""><?=Yii::t('app', 'Тематизация объектов')?></option>
                 </select>
                <input type="text" name="name" placeholder="<?=Yii::t('app', 'Ваше имя')?>" class="inputmodal">
                <input type="text" name="phone" placeholder="<?=Yii::t('app', 'Телефон')?>" class="inputmodal">
                <input type="text" name="email" placeholder="<?=Yii::t('app', 'Ваш email')?>" class="inputmodal"><br>
                <button class="modalbut submitModal"><b><?=Yii::t('app', 'Оставить заявку')?></b></button>
                </div>
                <div class="fancyform2">
                    <p><?=Yii::t('app', 'Спасибо , ваша заявка принята!')?></p>
                </div>
            </form>
        </div>
</section>



<section class="pt-page pt-page-2" data-id="about_me">
     <div class="part">
       <div class="part1">
        <div class="container" id="di1">
            <div id="slides">
                <img src="/img/zakazshiki/zakz1.png" alt="">
                  <img src="/img/zakazshiki/zakz2.png" alt="">
                  <img src="/img/zakazshiki/zakz3.png" alt="">
                  <img src="/img/zakazshiki/zakz4.png" alt="">
                <a href="#" class="slidesjs-previous slidesjs-navigation" id="slidesjs-previous"><img src="/img/zakazshiki/partvverh.png" alt=""></a>
                  <a href="#" class="slidesjs-next slidesjs-navigation" id="slidesjs-next"><img src="/img/zakazshiki/partvniz.png" alt=""></a>

            </div>
            <div id="slidesjs-log"><span class="slidesjs-slide-number">1</span>/4</div>
          </div>


        <div class="container2" id="di2">
            <div id="slides2">
            <img src="/img/zakazshiki/partner1.png" alt="">
            <img src="/img/zakazshiki/partner2.png" alt="">
            <img src="/img/zakazshiki/partner3.png" alt="">
            <img src="/img/zakazshiki/partner4.png" alt="">
            <img src="/img/zakazshiki/partner5.png" alt="">

            <a href="#" class="slidesjs-previous slidesjs-navigation" id="slidesjs-previous"><img src="/img/zakazshiki/partvverh.png" alt=""></a>
              <a href="#" class="slidesjs-next slidesjs-navigation" id="slidesjs-next"><img src="/img/zakazshiki/partvniz.png" alt=""></a>

            </div>
            <div id="slidesjs-log2"><span class="slidesjs-slide-number2">1</span>/5</div>
        </div>
        <div class="lini">
            <img src="/img/blok2/partlini.png" class="partlini">
        </div>
        <div class="fonzakaz">
            <img src="/img/niz3.png" class="fonabout">
        </div>

        <div class="blok2button">
            <button class="blok2button1" onmousedown="viewDiv2()"><?=Yii::t('app', 'Наши заказчики')?></button><button class="blok2button2" onmousedown="viewDiv()"><?=Yii::t('app', 'наши партнеры')?></button>
        </div>
        </div>
        </div>
        <div class="tekstura">
               <img src="/img/tekstura.png" class="tekstura">
        </div>
        <div class="fullwidth-bg" id="aboutvideo">

        </div>
        <div class="head">
            <div class="head1"><img src="/img/head1.png" class="headA">
            <a class="pt-trigger" href="#home" data-animation="59" data-goto="1"><img src="/img/headlogo.png" class="headlogo"></a></div>
            <div class="vverh"><a class="pt-trigger" href="#contacts" data-animation="61" data-goto="3">
                <div class="strelka">
                    <div class="out">
                       <img src="/img/strelka.png" class="strelkaout">
                        <img src="/img/strelkain.png"  class = "strelin strelin1">
                    </div>
                </div>
                <div class="strelkay">
                    <div class="out">
                       <img src="/img/yellowarrow2.png" class="strelkaout">
                    </div>
                </div>
                <p class="pstrelka"><?=Yii::t('app', 'контакты')?></p></a>
            </div>
        </div>
        <div class="center">
           <div class="vlevo"><a class="pt-trigger" href="#home" data-animation="59" data-goto="1" id="perehod">
                  <div class="strelka2">
                    <div class="out">
                       <img src="/img/strelka.png" class="strelkaout">
                        <img src="/img/strelkain2.png"  class = "strelin strelin2">
                    </div>
                </div>
                <div class="strelkay2">
                    <div class="out">
                       <img src="/img/yellowarrow.png" class="strelkaout">
                    </div>
                </div>
                <p class="pstrelka2"><?=Yii::t('app', 'главная')?></p></a>
           </div>
            <div class="about">
                <div class="about1"><p class="page2p1"><b><?=Yii::t('app', 'КОМПАНИЯ             «AQUALINE GEMAS» КРУПНЕЙШИЙ ПОСТАВЩИК,')?></b> <br>
                    <?=Yii::t('app', 'предлагающий самый широкий спектр услуг для индустрии')?> <br>
                    <?=Yii::t('app', 'водных развлечений и парков отдыха.')?></p> <p class="page2p11"><i><?=Yii::t('app', 'ПОЧЕМУ ИМЕННО МЫ!')?></i></p>
                 </div>
                 <div class="kaplya1">
                     <img src="/img/blok2/1.png" class="kaplyaimg1">
                     <div class="kaplyatext1">
                         <p class="pkapli"><b class="bkapli">
                         <?=Yii::t('app', 'Мы являемся')?>
                         </b><br>
                         <?=Yii::t('app', 'официальным дистрибьютором крупнейших фабрик, производящих оборудование согласно европейскому стандарту качества, что позволяет реализовывать самые смелые и инновационные проекты международного уровня. Более того, благодаря прямой работе с фабриками мы имеем возможность поставлять качественный товар по доступной цене, обходя накрутки перекупщиков.')?>
                         </p>
                     </div>
                     <div class="kaplyaicon1">
                         <img src="/img/blok2/01.png" class="kaplyaicon11 spinner" id="spinner">
                     </div>
                 </div>
                 <div class="kaplya2">
                     <img src="/img/blok2/2.png" class="kaplyaimg2">
                     <div class="kaplyatext2">
                         <div class="pkapli"><p class="pkapli2"><b class="bkapli">
                         <?=Yii::t('app', 'С 2015 года')?></b><br>
                         <?=Yii::t('app', 'компания «AQUALINE GEMAS» является официальным офисом продаж компании «Polin Waterparks» (Турция) на территории Средней Азии.А уже с 2019 года мы стали официальным офисом продаж на территории стран СНГ и вошли в состав группы компаний «Polin Group», что подкрепляет наш статус и надежность.')?>
                          </p></div>
                     </div>
                     <div class="kaplyaicon2">
                         <img src="/img/blok2/02.png" class="kaplyaicon11 spinner" id="spinner">
                     </div>
                 </div>
                 <div class="kaplya3">
                     <img src="/img/blok2/3.png" class="kaplyaimg3">
                     <div class="kaplyatext3">
                         <div class="pkapli"><p class="pkapli3"><b class="bkapli">
                         <?=Yii::t('app', 'За более чем 10 летний опыт')?></b><br>
                         <?=Yii::t('app', 'работы на территории Центральной Азии мы успешно реализовали свыше 300 проектов. Наши партнеры доверяют нам и ценят качество реализуемого товара и выполняемых работ, что подтверждают проекты расширения территорий.')?>
                           </p></div>
                     </div>
                     <div class="kaplyaicon3">
                         <img src="/img/blok2/03.png" class="kaplyaicon11 spinner" id="spinner">
                     </div>
                 </div>
                 <div class="kaplya4">
                     <img src="/img/blok2/4.png" class="kaplyaimg4">
                     <div class="kaplyatext4">
                         <div class="pkapli"><p class="pkapli4"><b class="bkapli"><?=Yii::t('app', 'В штате компании находятся')?></b><br>
                           <?=Yii::t('app', 'опытные и талантливые специалисты, которые могут решить задачу любой сложности, ведь работа по созданию проектов требует огромных знаний, которые в конечном итоге приводят к успеху всего проекта в целом. Мы постоянно повышаем свои знания и навыки, проходя ежегодное повышение квалификации на фабриках мирового уровня, и <br>готовы реализовывать их для вас.')?>
                               </p></div>
                     </div>
                     <div class="kaplyaicon4">
                         <img src="/img/blok2/04.png" class="kaplyaicon11 spinner" id="spinner">
                     </div>
                 </div>
                 <div class="kaplya5">
                     <img src="/img/blok2/5.png" class="kaplyaimg5">
                     <div class="kaplyatext5">
                         <div class="pkapli"><p class="pkapli5"><b class="bkapli"><?=Yii::t('app', 'В 2019 году')?></b><br>
                         <?=Yii::t('app', 'компания «AQUALINE GEMAS» была удостоена наградой «IMPORTER OF THE YEAR» заняв 2-е место в топ 5  и 7-е место в топ 100 среди импортеров Республики Казахстан по показателям «Объем производства»')?>
                        </p></div>
                    </div>
                     <div class="kaplyaicon5">
                         <img src="/img/blok2/05.png" class="kaplyaicon11 spinner" id="spinner">
                     </div>
                 </div>
            </div>
            <div class="vpravo"><a class="pt-trigger" href="#services" data-animation="58" data-goto="5" id="perehod">
                  <div class="strelka3">
                    <div class="out">
                       <img src="/img/strelka.png" class="strelkaout">
                        <img src="/img/strelkain3.png"  class = "strelin strelin3">
                    </div>
                </div>
                <div class="strelkay3">
                    <div class="out">
                       <img src="/img/yellowarrow3.png" class="strelkaout">
                    </div>
                </div>
                <p class="pstrelka3"><?=Yii::t('app', 'услуги')?></p></a>
           </div>
        </div>
        <div class="end">
            <div class="end1"><img src="/img/end1.png" class="end11">
                <a href=""><img src="/img/faceebook.png" class="insta1"></a>
                <a href=""><img src="/img/instagram.png" class="insta2"></a>
                <a href=""><img src="/img/twitter.png" class="insta3"></a>
            </div>
            <div class="end2">
                <a class="pt-trigger" href="#portfolio" data-animation="60" data-goto="4"><div class="vniz">
                <p class="pstrelka4" id="vni"><?=Yii::t('app', 'портфолио')?></p>
                <div class="strelka4">
                    <div class="out">
                       <img src="/img/strelka.png" class="strelkaout">
                        <img src="/img/strelkain4.png"  class = "strelin strelin4">
                    </div>
                </div>
                <div class="strelkay4">
                    <div class="out">
                       <img src="/img/yellowarrow4.png" class="strelkaout">
                    </div>
                </div>
                </div></a>
            </div>
            <div class="end3">
                <div class="enru">
                    <a href="<?=$ru_link?>"><p class="ru ru2"><b>RU</b></p></a>
                    <img src="/img/ruen.png" class="ruen">
                    <a href="<?=$en_link?>"><p class="en en2"><b>EN</b></p></a>
                </div>
            </div>
        </div>
</section>

<section class="pt-page pt-page-3" data-id="contacts">

        <div class="tekstura3">
               <img src="/img/tekstura.png" class="tekstura3">
        </div>
        <div class="fon5">
            <img src="/img/fon5.png" class="fon55">
        </div>
        <div id="map" class="map"></div>
        <div class="head">
            <div class="head1"><img src="/img/head1.png" class="headA">
            <a class="pt-trigger" href="#home" data-animation="61" data-goto="1"><img src="/img/headlogo.png" class="headlogo"></a></div>
            <div class="vverh"><a class="pt-trigger" href="#home" data-animation="61" data-goto="1">
                <div class="strelka">
                    <div class="out">
                       <img src="/img/yellowarrow11.png" class="strelkaout">
                        <img src="/img/yellowarrow33.png"  class = "strelin strelin1">
                    </div>
                </div>
                <div class="strelkay">
                    <div class="out">
                       <img src="/img/yellowarrow2.png" class="strelkaout">
                    </div>
                </div>
                <p class="pstrelka" id="yelyel"><?=Yii::t('app', 'главная')?></p></a>
            </div>
        </div>
        <div class="center">
           <div class="vlevo"><a class="pt-trigger" href="#about_me" data-animation="59" data-goto="2">
                  <div class="strelka2">
                    <div class="out">
                       <img src="/img/yellowarrow11.png" class="strelkaout">
                        <img src="/img/yellowarrow22.png"  class = "strelin strelin2">
                    </div>
                </div>
                <div class="strelkay2">
                    <div class="out">
                       <img src="/img/yellowarrow.png" class="strelkaout">
                    </div>
                </div>
                <p class="pstrelka2" id="yelyel"><?=Yii::t('app', 'о нас')?></p></a>
           </div>
            <div class="kontakty">
               <img src="/img/liniakont.png" class="setkaimg">
                <div class="infkvadrat">
                    <div class="ininf">
                        <img src="/img/logo.png" class="kontaktlogo">
                        <div class="adres">
                            <div class="adresp">
                                <img src="/img/vekt1.png" class="imgkvadrat"><p><?=Yii::t('app', 'г. Алматы, мкр. Хан-Тенгри, 65')?></p>
                                <img src="/img/vekt2.png" class="imgkvadrat2"><p><a href="tel:+7 (727) 226-83-36">+7 (727) 226-83-36,</a><br><a href="tel:+7 (727) 327-50-06">+7 (727) 327-50-06</a></p>
                                <img src="/img/vekt3.png" class="imgkvadrat3"><p><a href="tel:+7 701 226 83 66">+7 701 226 83 66</a></p>
                                <img src="/img/mail.svg" class="mailicon"><p><a href="mailto:polincis@mail.ru">polincis@mail.ru</a> <br>
                                <a href="mailto:info@aqualinewt.com">info@aqualinewt.com</a> <br>
                                <a href="mailto:cis@polin.com.tr">cis@polin.com.tr</a><br>
                                </p>
                                <img src="/img/web.svg" class="webicon"><p><a href="http://aqualine.instaboss.kz/">Aqualine</a></p>
                            </div>
                        </div>
                        <a href="#fancy" class="fancybox"><button class="kvadratbut" id="myBtn11"><?=Yii::t('app', 'консультация')?></button></a>
                    </div>
                </div>
                <img src="/img/Compass.png" class="cirkul">
            </div>
            <div class="vpravo"><a class="pt-trigger" href="#services" data-animation="58" data-goto="5" id="perehod">
                  <div class="strelka3">
                    <div class="out">
                       <img src="/img/strelka.png" class="strelkaout">
                        <img src="/img/strelkain3.png"  class = "strelin strelin3">
                    </div>
                </div>
                <div class="strelkay3">
                    <div class="out">
                       <img src="/img/yellowarrow3.png" class="strelkaout">
                    </div>
                </div>
                <p class="pstrelka3"><?=Yii::t('app', 'услуги')?></p></a>
           </div>
        </div>
        <div class="end">
            <div class="end1"><img src="/img/end1.png" class="end11">
                <a href=""><img src="/img/faceebook.png" class="insta1"></a>
                <a href=""><img src="/img/instagram.png" class="insta2"></a>
                <a href=""><img src="/img/twitter.png" class="insta3"></a>
            </div>
            <div class="end2">
                <a class="pt-trigger" href="#portfolio" data-animation="60" data-goto="4"><div class="vniz">
                <p class="pstrelka4" id="vni"><?=Yii::t('app', 'портфолио')?></p>
                <div class="strelka4">
                    <div class="out">
                       <img src="/img/strelka.png" class="strelkaout">
                        <img src="/img/strelkain4.png"  class = "strelin strelin4">
                    </div>
                </div>
                <div class="strelkay4">
                    <div class="out">
                       <img src="/img/yellowarrow4.png" class="strelkaout">
                    </div>
                </div>
                </div></a>
            </div>
            <div class="end3"><img src="/img/end3.png" class="end33">
                <div class="enru">
                    <a href="<?=$ru_link?>"><p class="ru"><b>RU</b></p></a>
                    <img src="/img/ruen.png" class="ruen">
                    <a href="<?=$en_link?>"><p class="en"><b>EN</b></p></a>
                </div>
            </div>
        </div>

</section>






<section class="pt-page pt-page-4" data-id="portfolio">

        <div class="fonvideo">
            <img src="/img/niz3.png" class="fonport">
            <div class="video">
    <p class="videop2"><b p class="videop1"><?=Yii::t('app', 'ВИДЕО</b><br>наших последних работ')?></p>


    <video src="/video/video1.mp4" controls="controls" id="video1"></video>
   <video src="/video/video2.mp4" controls="controls" id="video2"></video>
   <video src="/video/video3.mp4" controls="controls" id="video3"></video>
   <video src="/video/video4.mp4" controls="controls" id="video4"></video>
   <video src="/video/video5.mp4" controls="controls" id="video5"></video>
   <video src="/video/video6.mp4" controls="controls" id="video6"></video>


<div class="slidervideo">
<div id="slides12">
            <div>
    <div class="video1">
        <a href="#video6" class="fancybox"><img src="/img/video6.png" class="vid"></a>
        <p class="aquaparks lend">Lend of legend</p>
    </div>

    <div class="video2">
        <a href="#video1" class="fancybox"><img src="/img/video1.png" class="vid2"></a>
        <p class="aquaparks">FONTAN</p>
    </div>

    <div class="video3">
        <a href="#video2" class="fancybox"><img src="/img/video2.png" class="vid"></a>
        <p class="aquaparks">AquaTOWN</p>
    </div>
    </div>
            <div>
    <div class="video1">
        <a href="#video3" class="fancybox"><img src="/img/video3.png" class="vid"></a>
        <p class="aquaparks">Ала Тоо</p>
    </div>

    <div class="video2">
        <a href="#video4" class="fancybox"><img src="/img/video4.png" class="vid2"></a>
        <p class="aquaparks">Sun City</p>
    </div>

    <div class="video3">
        <a href="#video5" class="fancybox"><img src="/img/video5.png" class="vid"></a>
        <p class="aquaparks">Tree Of Life</p>
    </div>
    </div>

            <a href="#" class="slidesjs-previous slidesjs-navigation" id="slidesjs-previous12"><img src="/img/zakazshiki/partvverh.png" alt=""></a>
              <a href="#" class="slidesjs-next slidesjs-navigation" id="slidesjs-next12"><img src="/img/zakazshiki/partvniz.png" alt=""></a>

            </div>
            <div id="slidesjs-log12" class="slidelog12"><span class="slidesjs-slide-number12">1</span>/2</div>
            </div>

</div>
        </div>
        <div class="tekstura">
               <img src="/img/tekstura.png" class="tekstura">
        </div>
        <div class="fullwidth-bg" id="aboutvideo2">

        </div>
        <div class="head">
            <div class="head1"><img src="/img/head1.png" class="headA">
            <a class="pt-trigger" href="#home" data-animation="60" data-goto="1"><img src="/img/headlogo.png" class="headlogo"></a></div>
            <div class="vverh"><a class="pt-trigger" href="#contacts" data-animation="61" data-goto="3">
                <div class="strelka">
                    <div class="out">
                       <img src="/img/strelka.png" class="strelkaout">
                        <img src="/img/strelkain.png"  class = "strelin strelin1">
                    </div>
                </div>
                <div class="strelkay">
                    <div class="out">
                       <img src="/img/yellowarrow2.png" class="strelkaout">
                    </div>
                </div>
                <p class="pstrelka"><?=Yii::t('app', 'контакты')?></p></a>
            </div>
        </div>
        <div class="center">
           <div class="vlevo"><a class="pt-trigger" href="#about_me" data-animation="59" data-goto="2">
                  <div class="strelka2">
                    <div class="out">
                       <img src="/img/strelka.png" class="strelkaout">
                        <img src="/img/strelkain2.png"  class = "strelin strelin2">
                    </div>
                </div>
                <div class="strelkay2">
                    <div class="out">
                       <img src="/img/yellowarrow.png" class="strelkaout">
                    </div>
                </div>
                <p class="pstrelka2"><?=Yii::t('app', 'о нас')?></p></a>
           </div>
            <div class="portf">
                <div class="info3">
                    <p class="p3"></b><?=Yii::t('app', 'РЕАЛИЗОВАННЫЕ ПРОЕКТЫ')?></b> <br><?=Yii::t('app', 'У нас свыше 300 выполненных проектов')?></p>
                </div>
                <div class="wrapper">
                  <input type="radio" class="hidden" id="i1" name="win" checked>
                  <input type="radio" class="hidden" id="i2" name="win">
                  <input type="radio" class="hidden" id="i3" name="win">
                  <input type="radio" class="hidden" id="i4" name="win">
                  <input type="radio" class="hidden" id="i5" name="win">
                  <input type="radio" class="hidden" id="i6" name="win">
                  <input type="radio" class="hidden" id="i7" name="win">
                  <input type="radio" class="hidden" id="i8" name="win">
                  <input type="radio" class="hidden" id="i9" name="win">
                <div class="buttons">
                    <label for="i1" class="ite active"><div class="w1"><div class="w2"><img src="/img/blok3/1.png" class="imgi1"></div><div class="w3"><p><?=Yii::t('app', 'Аквапарк')?></p></div></div></label>
                    <label for="i2" class="ite"><div class="w1"><div class="w2"><img src="/img/blok3/2.png" class="imgi2"></div><div class="w3"><p>Spray Zone</p></div></div></label>
                    <label for="i3" class="ite"><div class="w1"><div class="w2"><img src="/img/blok3/3.png" class="imgi3"></div><div class="w3"><p><?=Yii::t('app', 'Игровые технологии')?></p></div></div></label>
                    <label for="i4" class="ite"><div class="w1"><div class="w2"><img src="/img/blok3/4.png" class="imgi4"></div><div class="w3"><p><?=Yii::t('app', 'SPA комплексы')?></p></div></div></label>
                    <label for="i5" class="ite"><div class="w1"><div class="w2"><img src="/img/blok3/5.png" class="imgi5"></div><div class="w3"><p><?=Yii::t('app', 'Фонтаны')?></p></div></div></label>
                    <label for="i6" class="ite"><div class="w1"><div class="w2"><img src="/img/blok3/6.png" class="imgi6"></div><div class="w3"><p>
                    <?=Yii::t('app', 'Бассейны и волновые парки')?></p></div></div></label>
                    <label for="i7" class="ite"><div class="w1"><div class="w2"><img src="/img/blok3/7.png" class="imgi7"></div><div class="w3"><p><?=Yii::t('app', 'Аквариумы')?></p></div></div></label>
                    <label for="i8" class="ite"><div class="w1"><div class="w2"><img src="/img/blok3/8.png" class="imgi8"></div><div class="w3"><p>
                    <?=Yii::t('app', 'Сафари Парк')?></p></div></div></label>
                    <label for="i9" class="ite"><div class="w1"><div class="w2"><img src="/img/blok3/9.png" class="imgi9"></div><div class="w3"><p><?=Yii::t('app', 'Тематизация объектов')?></p></div></div></label>
                </div>

                <div class="windows">
                    <div class="window" id="w1">
                    <div id="slides3">
                    <?php if ($portfolios != null): ?>
                     <?php $filtered = array_filter(
    $portfolios,
    function ($arr) {
        return $arr->category_id == (int) 1;
    }
);
?>
                    <?php foreach ($filtered as $portfolio): ?>
                            <?php
if (!empty($portfolio->images)) {$images = json_decode($portfolio->images);}
?>
                            <div class="sliderport">
                                <?php if ($images != null && isset($images[0])): ?>
                                    <a href="<?=isset($images[0][0]) ? $images[0][0] : ''?>" class="fancybox"><img src="<?=isset($images[0][1]) ? $images[0][1] : ''?>" class="img31"></a>
                                <?php endif;?>
                                <div class="img32">
                                    <div class="hawaya">
                                        <p class="ppakvap"><?=$portfolio->name?></p>
                                <?php if ($portfolio->area != null):?><p class="ppakva"><?=Yii::t('app', 'Площадь')?>: <br> <b><?=$portfolio->area?> кв.м.</b><br><br><?php endif; ?>
                                <?php if ($portfolio->location != null): ?>        <?=Yii::t('app', 'Локация')?>: <br> <b><?=$portfolio->location?></b>
                                </p><?php endif; ?>

                                    </div>
                                    <a href="#fancy" class="fancybox"><button class="hawaibut1"><b><?=Yii::t('app', 'Хочу такой')?></b></button></a>
                                    <div class="imghawai">
                                        <?php if ($portfolio->logo_path != null): ?>
                                            <img src="/img/blok3/vertpol.png" class="hhaw">
                                            <img src="<?=$portfolio->logo_path?>" class="hhhaw">
                                        <?php endif;?>
                                    </div>
                                </div>
                                <?php if ($images != null && isset($images[1])): ?>
                                    <a href="<?=isset($images[1][0]) ? $images[1][0] : ''?>" class="fancybox"><img src="<?=isset($images[1][1]) ? $images[1][1] : ''?>" class="img33"></a>
                                <?php endif;?>
                                <?php if ($images != null && isset($images[2])): ?>
                                    <a href="<?=isset($images[2][0]) ? $images[2][0] : ''?>" class="fancybox"><img src="<?=isset($images[2][1]) ? $images[2][1] : ''?>" class="img34"></a>
                                <?php endif;?>
                            </div>
                    <?php endforeach;?>
                    <?php endif;?>

            <a href="#" class="slidesjs-navigation slidesjs-previous" id="slideprev3"><img src="/img/zakazshiki/partvverh.png" alt=""></a>
              <a href="#" class="slidesjs-next slidesjs-navigation" id="slidenext3"><img src="/img/zakazshiki/partvniz.png" alt=""></a>

            </div>

            <div id="slidesjs-log3" class="slidelog"><span class="slidesjs-slide-number3">1</span>/<?=isset($filtered) ? count($filtered) : 0?></div>

                    </div>

                <div class="window wActive" id="w2">
                   <div id="slides4">
                    <?php if ($portfolios != null): ?>
                     <?php $filtered2 = array_filter(
    $portfolios,
    function ($arr) {
        return $arr->category_id == (int) 2;
    }
);
?>
                    <?php foreach ($filtered2 as $portfolio): ?>
                            <?php
if (!empty($portfolio->images)) {$images = json_decode($portfolio->images);}
?>
                            <div class="sliderport">
                                <?php if ($images != null && isset($images[0])): ?>
                                    <a href="<?=isset($images[0][0]) ? $images[0][0] : ''?>" class="fancybox"><img src="<?=isset($images[0][1]) ? $images[0][1] : ''?>" class="img31"></a>
                                <?php endif;?>
                                <div class="img32">
                                    <div class="hawaya">
                                        <p class="ppakvap"><?=$portfolio->name?></p>
                                        <?php if ($portfolio->area != null):?><p class="ppakva"><?=Yii::t('app', 'Площадь')?>: <br> <b><?=$portfolio->area?> кв.м.</b><br><br><?php endif; ?>
                                <?php if ($portfolio->location != null): ?>        <?=Yii::t('app', 'Локация')?>: <br> <b><?=$portfolio->location?></b>
                                </p><?php endif; ?>

                                    </div>
                                    <a href="#fancy" class="fancybox"><button class="hawaibut1"><b><?=Yii::t('app', 'Хочу такой')?></b></button></a>
                                    <div class="imghawai">
                                        <?php if ($portfolio->logo_path != null): ?>
                                            <img src="/img/blok3/vertpol.png" class="hhaw">
                                            <img src="<?=$portfolio->logo_path?>" class="hhhaw">
                                        <?php endif;?>
                                    </div>
                                </div>
                                <?php if ($images != null && isset($images[1])): ?>
                                    <a href="<?=isset($images[1][0]) ? $images[1][0] : ''?>" class="fancybox"><img src="<?=isset($images[1][1]) ? $images[1][1] : ''?>" class="img33"></a>
                                <?php endif;?>
                                <?php if ($images != null && isset($images[2])): ?>
                                    <a href="<?=isset($images[2][0]) ? $images[2][0] : ''?>" class="fancybox"><img src="<?=isset($images[2][1]) ? $images[2][1] : ''?>" class="img34"></a>
                                <?php endif;?>
                            </div>
                    <?php endforeach;?>
                    <?php endif;?>

            <a href="#" class="slidesjs-navigation slidesjs-previous" id="slideprev3"><img src="/img/zakazshiki/partvverh.png" alt=""></a>
              <a href="#" class="slidesjs-next slidesjs-navigation" id="slidenext3"><img src="/img/zakazshiki/partvniz.png" alt=""></a>

            </div>
            <div id="slidesjs-log4" class="slidelog"><span class="slidesjs-slide-number4">1</span>/<?=isset($filtered2) ? count($filtered2) : 0?></div>
                </div>
                <div class="window" id="w3">
                   <div id="slides5">
                    <?php if ($portfolios != null): ?>
                     <?php $filtered3 = array_filter(
    $portfolios,
    function ($arr) {
        return $arr->category_id == (int) 3;
    }
);
?>
                    <?php foreach ($filtered3 as $portfolio): ?>
                            <?php
if (!empty($portfolio->images)) {$images = json_decode($portfolio->images);}
?>
                            <div class="sliderport">
                                <?php if ($images != null && isset($images[0])): ?>
                                    <a href="<?=isset($images[0][0]) ? $images[0][0] : ''?>" class="fancybox"><img src="<?=isset($images[0][1]) ? $images[0][1] : ''?>" class="img31"></a>
                                <?php endif;?>
                                <div class="img32">
                                    <div class="hawaya">
                                        <p class="ppakvap"><?=$portfolio->name?></p>
                                        <?php if ($portfolio->area != null):?><p class="ppakva"><?=Yii::t('app', 'Площадь')?>: <br> <b><?=$portfolio->area?> кв.м.</b><br><br><?php endif; ?>
                                <?php if ($portfolio->location != null): ?>        <?=Yii::t('app', 'Локация')?>: <br> <b><?=$portfolio->location?></b>
                                </p><?php endif; ?>

                                    </div>
                                    <a href="#fancy" class="fancybox"><button class="hawaibut1"><b><?=Yii::t('app', 'Хочу такой')?></b></button></a>
                                    <div class="imghawai">
                                        <?php if ($portfolio->logo_path != null): ?>
                                            <img src="/img/blok3/vertpol.png" class="hhaw">
                                            <img src="<?=$portfolio->logo_path?>" class="hhhaw">
                                        <?php endif;?>
                                    </div>
                                </div>
                                <?php if ($images != null && isset($images[1])): ?>
                                    <a href="<?=isset($images[1][0]) ? $images[1][0] : ''?>" class="fancybox"><img src="<?=isset($images[1][1]) ? $images[1][1] : ''?>" class="img33"></a>
                                <?php endif;?>
                                <?php if ($images != null && isset($images[2])): ?>
                                    <a href="<?=isset($images[2][0]) ? $images[2][0] : ''?>" class="fancybox"><img src="<?=isset($images[2][1]) ? $images[2][1] : ''?>" class="img34"></a>
                                <?php endif;?>
                            </div>
                    <?php endforeach;?>
                    <?php endif;?>

            <a href="#" class="slidesjs-navigation slidesjs-previous" id="slideprev3"><img src="/img/zakazshiki/partvverh.png" alt=""></a>
              <a href="#" class="slidesjs-next slidesjs-navigation" id="slidenext3"><img src="/img/zakazshiki/partvniz.png" alt=""></a>

            </div>
            <div id="slidesjs-log5" class="slidelog"><span class="slidesjs-slide-number5">1</span>/<?=isset($filtered3) ? count($filtered3) : 0?></div>
                </div>
                <div class="window" id="w4">
                   <div id="slides6">
                         <?php if ($portfolios != null): ?>
                     <?php $filtered4 = array_filter(
    $portfolios,
    function ($arr) {
        return $arr->category_id == (int) 4;
    }
);
?>
                    <?php foreach ($filtered4 as $portfolio): ?>
                            <?php
if (!empty($portfolio->images)) {$images = json_decode($portfolio->images);}
?>
                            <div class="sliderport">
                                <?php if ($images != null && isset($images[0])): ?>
                                    <a href="<?=isset($images[0][0]) ? $images[0][0] : ''?>" class="fancybox"><img src="<?=isset($images[0][1]) ? $images[0][1] : ''?>" class="img31"></a>
                                <?php endif;?>
                                <div class="img32">
                                    <div class="hawaya">
                                        <p class="ppakvap"><?=$portfolio->name?></p>
                                        <?php if ($portfolio->area != null):?><p class="ppakva"><?=Yii::t('app', 'Площадь')?>: <br> <b><?=$portfolio->area?> кв.м.</b><br><br><?php endif; ?>
                                <?php if ($portfolio->location != null): ?>        <?=Yii::t('app', 'Локация')?>: <br> <b><?=$portfolio->location?></b>
                                </p><?php endif; ?>

                                    </div>
                                    <a href="#fancy" class="fancybox"><button class="hawaibut1"><b><?=Yii::t('app', 'Хочу такой')?></b></button></a>
                                    <div class="imghawai">
                                        <?php if ($portfolio->logo_path != null): ?>
                                            <img src="/img/blok3/vertpol.png" class="hhaw">
                                            <img src="<?=$portfolio->logo_path?>" class="hhhaw">
                                        <?php endif;?>
                                    </div>
                                </div>
                                <?php if ($images != null && isset($images[1])): ?>
                                    <a href="<?=isset($images[1][0]) ? $images[1][0] : ''?>" class="fancybox"><img src="<?=isset($images[1][1]) ? $images[1][1] : ''?>" class="img33"></a>
                                <?php endif;?>
                                <?php if ($images != null && isset($images[2])): ?>
                                    <a href="<?=isset($images[2][0]) ? $images[2][0] : ''?>" class="fancybox"><img src="<?=isset($images[2][1]) ? $images[2][1] : ''?>" class="img34"></a>
                                <?php endif;?>
                            </div>
                    <?php endforeach;?>
                    <?php endif;?>
                <a href="#" class="slidesjs-navigation slidesjs-previous" id="slideprev3"><img src="/img/zakazshiki/partvverh.png" alt=""></a>
                <a href="#" class="slidesjs-next slidesjs-navigation" id="slidenext3"><img src="/img/zakazshiki/partvniz.png" alt=""></a>

            </div>
            <div id="slidesjs-log6" class="slidelog"><span class="slidesjs-slide-number6">1</span>/<?=isset($filtered4) ? count($filtered4) : 0?></div>
                </div>
                <div class="window" id="w5">
                   <div id="slides7">
                          <?php if ($portfolios != null): ?>
                     <?php $filtered5 = array_filter(
    $portfolios,
    function ($arr) {
        return $arr->category_id == (int) 5;
    }
);
?>
                    <?php foreach ($filtered5 as $portfolio): ?>
                            <?php
if (!empty($portfolio->images)) {$images = json_decode($portfolio->images);}
?>
                            <div class="sliderport">
                                <?php if ($images != null && isset($images[0])): ?>
                                    <a href="<?=isset($images[0][0]) ? $images[0][0] : ''?>" class="fancybox"><img src="<?=isset($images[0][1]) ? $images[0][1] : ''?>" class="img31"></a>
                                <?php endif;?>
                                <div class="img32">
                                    <div class="hawaya">
                                        <p class="ppakvap"><?=$portfolio->name?></p>
                                        <?php if ($portfolio->area != null):?><p class="ppakva"><?=Yii::t('app', 'Площадь')?>: <br> <b><?=$portfolio->area?> кв.м.</b><br><br><?php endif; ?>
                                <?php if ($portfolio->location != null): ?>        <?=Yii::t('app', 'Локация')?>: <br> <b><?=$portfolio->location?></b>
                                </p><?php endif; ?>

                                    </div>
                                    <a href="#fancy" class="fancybox"><button class="hawaibut1"><b><?=Yii::t('app', 'Хочу такой')?></b></button></a>
                                    <div class="imghawai">
                                        <?php if ($portfolio->logo_path != null): ?>
                                            <img src="/img/blok3/vertpol.png" class="hhaw">
                                            <img src="<?=$portfolio->logo_path?>" class="hhhaw">
                                        <?php endif;?>
                                    </div>
                                </div>
                                <?php if ($images != null && isset($images[1])): ?>
                                    <a href="<?=isset($images[1][0]) ? $images[1][0] : ''?>" class="fancybox"><img src="<?=isset($images[1][1]) ? $images[1][1] : ''?>" class="img33"></a>
                                <?php endif;?>
                                <?php if ($images != null && isset($images[2])): ?>
                                    <a href="<?=isset($images[2][0]) ? $images[2][0] : ''?>" class="fancybox"><img src="<?=isset($images[2][1]) ? $images[2][1] : ''?>" class="img34"></a>
                                <?php endif;?>
                            </div>
                    <?php endforeach;?>
                    <?php endif;?>

            <a href="#" class="slidesjs-navigation slidesjs-previous" id="slideprev3"><img src="/img/zakazshiki/partvverh.png" alt=""></a>
              <a href="#" class="slidesjs-next slidesjs-navigation" id="slidenext3"><img src="/img/zakazshiki/partvniz.png" alt=""></a>

            </div>
            <div id="slidesjs-log7" class="slidelog"><span class="slidesjs-slide-number7">1</span>/<?=isset($filtered5) ? count($filtered5) : 0?></div>
                </div>
                <div class="window" id="w6">
                   <div id="slides8">
                              <?php if ($portfolios != null): ?>
                     <?php $filtered6 = array_filter(
    $portfolios,
    function ($arr) {
        return $arr->category_id == (int) 6;
    }
);
?>
                    <?php foreach ($filtered6 as $portfolio): ?>
                            <?php
if (!empty($portfolio->images)) {$images = json_decode($portfolio->images);}
?>
                            <div class="sliderport">
                                <?php if ($images != null && isset($images[0])): ?>
                                    <a href="<?=isset($images[0][0]) ? $images[0][0] : ''?>" class="fancybox"><img src="<?=isset($images[0][1]) ? $images[0][1] : ''?>" class="img31"></a>
                                <?php endif;?>
                                <div class="img32">
                                    <div class="hawaya">
                                        <p class="ppakvap"><?=$portfolio->name?></p>
                                        <?php if ($portfolio->area != null):?><p class="ppakva"><?=Yii::t('app', 'Площадь')?>: <br> <b><?=$portfolio->area?> кв.м.</b><br><br><?php endif; ?>
                                <?php if ($portfolio->location != null): ?>        <?=Yii::t('app', 'Локация')?>: <br> <b><?=$portfolio->location?></b>
                                </p><?php endif; ?>

                                    </div>
                                    <a href="#fancy" class="fancybox"><button class="hawaibut1"><b><?=Yii::t('app', 'Хочу такой')?></b></button></a>
                                    <div class="imghawai">
                                        <?php if ($portfolio->logo_path != null): ?>
                                            <img src="/img/blok3/vertpol.png" class="hhaw">
                                            <img src="<?=$portfolio->logo_path?>" class="hhhaw">
                                        <?php endif;?>
                                    </div>
                                </div>
                                <?php if ($images != null && isset($images[1])): ?>
                                    <a href="<?=isset($images[1][0]) ? $images[1][0] : ''?>" class="fancybox"><img src="<?=isset($images[1][1]) ? $images[1][1] : ''?>" class="img33"></a>
                                <?php endif;?>
                                <?php if ($images != null && isset($images[2])): ?>
                                    <a href="<?=isset($images[2][0]) ? $images[2][0] : ''?>" class="fancybox"><img src="<?=isset($images[2][1]) ? $images[2][1] : ''?>" class="img34"></a>
                                <?php endif;?>
                            </div>
                    <?php endforeach;?>
                    <?php endif;?>

            <a href="#" class="slidesjs-navigation slidesjs-previous" id="slideprev3"><img src="/img/zakazshiki/partvverh.png" alt=""></a>
              <a href="#" class="slidesjs-next slidesjs-navigation" id="slidenext3"><img src="/img/zakazshiki/partvniz.png" alt=""></a>

            </div>
            <div id="slidesjs-log8" class="slidelog"><span class="slidesjs-slide-number8">1</span>/<?=isset($filtered6) ? count($filtered6) : 0?></div>
                </div>
                <div class="window" id="w7">
                   <div id="slides9">
                                  <?php if ($portfolios != null): ?>
                     <?php $filtered7 = array_filter(
    $portfolios,
    function ($arr) {
        return $arr->category_id == (int) 7;
    }
);
?>
                    <?php foreach ($filtered7 as $portfolio): ?>
                            <?php
if (!empty($portfolio->images)) {$images = json_decode($portfolio->images);}
?>
                            <div class="sliderport">
                                <?php if ($images != null && isset($images[0])): ?>
                                    <a href="<?=isset($images[0][0]) ? $images[0][0] : ''?>" class="fancybox"><img src="<?=isset($images[0][1]) ? $images[0][1] : ''?>" class="img31"></a>
                                <?php endif;?>
                                <div class="img32">
                                    <div class="hawaya">
                                        <p class="ppakvap"><?=$portfolio->name?></p>
                                        <?php if ($portfolio->area != null):?><p class="ppakva"><?=Yii::t('app', 'Площадь')?>: <br> <b><?=$portfolio->area?> кв.м.</b><br><br><?php endif; ?>
                                <?php if ($portfolio->location != null): ?>        <?=Yii::t('app', 'Локация')?>: <br> <b><?=$portfolio->location?></b>
                                </p><?php endif; ?>

                                    </div>
                                    <a href="#fancy" class="fancybox"><button class="hawaibut1"><b><?=Yii::t('app', 'Хочу такой')?></b></button></a>
                                    <div class="imghawai">
                                        <?php if ($portfolio->logo_path != null): ?>
                                            <img src="/img/blok3/vertpol.png" class="hhaw">
                                            <img src="<?=$portfolio->logo_path?>" class="hhhaw">
                                        <?php endif;?>
                                    </div>
                                </div>
                                <?php if ($images != null && isset($images[1])): ?>
                                    <a href="<?=isset($images[1][0]) ? $images[1][0] : ''?>" class="fancybox"><img src="<?=isset($images[1][1]) ? $images[1][1] : ''?>" class="img33"></a>
                                <?php endif;?>
                                <?php if ($images != null && isset($images[2])): ?>
                                    <a href="<?=isset($images[2][0]) ? $images[2][0] : ''?>" class="fancybox"><img src="<?=isset($images[2][1]) ? $images[2][1] : ''?>" class="img34"></a>
                                <?php endif;?>
                            </div>
                    <?php endforeach;?>
                    <?php endif;?>
            <a href="#" class="slidesjs-navigation slidesjs-previous" id="slideprev3"><img src="/img/zakazshiki/partvverh.png" alt=""></a>
              <a href="#" class="slidesjs-next slidesjs-navigation" id="slidenext3"><img src="/img/zakazshiki/partvniz.png" alt=""></a>

            </div>
            <div id="slidesjs-log9" class="slidelog"><span class="slidesjs-slide-number9">1</span>/<?=isset($filtered7) ? count($filtered7) : 0?></div>
                </div>
                <div class="window" id="w8">
                   <div id="slides10">
                                     <?php if ($portfolios != null): ?>
                     <?php $filtered8 = array_filter(
    $portfolios,
    function ($arr) {
        return $arr->category_id == (int) 8;
    }
);
?>
                    <?php foreach ($filtered8 as $portfolio): ?>
                            <?php
if (!empty($portfolio->images)) {$images = json_decode($portfolio->images);}
?>
                            <div class="sliderport">
                                <?php if ($images != null && isset($images[0])): ?>
                                    <a href="<?=isset($images[0][0]) ? $images[0][0] : ''?>" class="fancybox"><img src="<?=isset($images[0][1]) ? $images[0][1] : ''?>" class="img31"></a>
                                <?php endif;?>
                                <div class="img32">
                                    <div class="hawaya">
                                        <p class="ppakvap"><?=$portfolio->name?></p>
                                        <?php if ($portfolio->area != null):?><p class="ppakva"><?=Yii::t('app', 'Площадь')?>: <br> <b><?=$portfolio->area?> кв.м.</b><br><br><?php endif; ?>
                                <?php if ($portfolio->location != null): ?>        <?=Yii::t('app', 'Локация')?>: <br> <b><?=$portfolio->location?></b>
                                </p><?php endif; ?>

                                    </div>
                                    <a href="#fancy" class="fancybox"><button class="hawaibut1"><b><?=Yii::t('app', 'Хочу такой')?></b></button></a>
                                    <div class="imghawai">
                                        <?php if ($portfolio->logo_path != null): ?>
                                            <img src="/img/blok3/vertpol.png" class="hhaw">
                                            <img src="<?=$portfolio->logo_path?>" class="hhhaw">
                                        <?php endif;?>
                                    </div>
                                </div>
                                <?php if ($images != null && isset($images[1])): ?>
                                    <a href="<?=isset($images[1][0]) ? $images[1][0] : ''?>" class="fancybox"><img src="<?=isset($images[1][1]) ? $images[1][1] : ''?>" class="img33"></a>
                                <?php endif;?>
                                <?php if ($images != null && isset($images[2])): ?>
                                    <a href="<?=isset($images[2][0]) ? $images[2][0] : ''?>" class="fancybox"><img src="<?=isset($images[2][1]) ? $images[2][1] : ''?>" class="img34"></a>
                                <?php endif;?>
                            </div>
                    <?php endforeach;?>
                    <?php endif;?>
              <a href="#" class="slidesjs-navigation slidesjs-previous" id="slideprev3"><img src="/img/zakazshiki/partvverh.png" alt=""></a>
              <a href="#" class="slidesjs-next slidesjs-navigation" id="slidenext3"><img src="/img/zakazshiki/partvniz.png" alt=""></a>

            </div>
            <div id="slidesjs-log10" class="slidelog"><span class="slidesjs-slide-number10">1</span>/<?=isset($filtered8) ? count($filtered8) : 0?></div>
                </div>
                <div class="window" id="w9">
                   <div id="slides11">
                                         <?php if ($portfolios != null): ?>
                     <?php $filtered9 = array_filter(
    $portfolios,
    function ($arr) {
        return $arr->category_id == (int) 9;
    }
);
?>
                    <?php foreach ($filtered9 as $portfolio): ?>
                            <?php
if (!empty($portfolio->images)) {$images = json_decode($portfolio->images);}
?>
                            <div class="sliderport">
                                <?php if ($images != null && isset($images[0])): ?>
                                    <a href="<?=isset($images[0][0]) ? $images[0][0] : ''?>" class="fancybox"><img src="<?=isset($images[0][1]) ? $images[0][1] : ''?>" class="img31"></a>
                                <?php endif;?>
                                <div class="img32">
                                    <div class="hawaya">
                                        <p class="ppakvap"><?=$portfolio->name?></p>
                                        <?php if ($portfolio->area != null):?><p class="ppakva"><?=Yii::t('app', 'Площадь')?>: <br> <b><?=$portfolio->area?> кв.м.</b><br><br><?php endif; ?>
                                <?php if ($portfolio->location != null): ?>        <?=Yii::t('app', 'Локация')?>: <br> <b><?=$portfolio->location?></b>
                                </p><?php endif; ?>

                                    </div>
                                    <a href="#fancy" class="fancybox"><button class="hawaibut1"><b><?=Yii::t('app', 'Хочу такой')?></b></button></a>
                                    <div class="imghawai">
                                        <?php if ($portfolio->logo_path != null): ?>
                                            <img src="/img/blok3/vertpol.png" class="hhaw">
                                            <img src="<?=$portfolio->logo_path?>" class="hhhaw">
                                        <?php endif;?>
                                    </div>
                                </div>
                                <?php if ($images != null && isset($images[1])): ?>
                                    <a href="<?=isset($images[1][0]) ? $images[1][0] : ''?>" class="fancybox"><img src="<?=isset($images[1][1]) ? $images[1][1] : ''?>" class="img33"></a>
                                <?php endif;?>
                                <?php if ($images != null && isset($images[2])): ?>
                                    <a href="<?=isset($images[2][0]) ? $images[2][0] : ''?>" class="fancybox"><img src="<?=isset($images[2][1]) ? $images[2][1] : ''?>" class="img34"></a>
                                <?php endif;?>
                            </div>
                    <?php endforeach;?>
                    <?php endif;?>

            <a href="#" class="slidesjs-navigation slidesjs-previous" id="slideprev3"><img src="/img/zakazshiki/partvverh.png" alt=""></a>
              <a href="#" class="slidesjs-next slidesjs-navigation" id="slidenext3"><img src="/img/zakazshiki/partvniz.png" alt=""></a>

            </div>
            <div id="slidesjs-log11" class="slidelog"><span class="slidesjs-slide-number11">1</span>/<?=isset($filtered9) ? count($filtered9) : 0?></div>
                </div>
              </div>
            </div>

            <div class="portfolioblok3">
                <hr class="hrhr"><a href="#fancy" class="fancybox"><button class="blok3but" id="myBtn"><b><p class="blok3p"><?=Yii::t('app', 'оставить заявку')?></p></b></button></a>
            </div>
            </div>
            <div class="vpravo"><a class="pt-trigger" href="#services" data-animation="58" data-goto="5" id="perehod">
                  <div class="strelka3">
                    <div class="out">
                       <img src="/img/strelka.png" class="strelkaout">
                        <img src="/img/strelkain3.png"  class = "strelin strelin3">
                    </div>
                </div>
                <div class="strelkay3">
                    <div class="out">
                       <img src="/img/yellowarrow3.png" class="strelkaout">
                    </div>
                </div>
                <p class="pstrelka3"><?=Yii::t('app', 'услуги')?></p></a>
           </div>
        </div>
        <div class="end">
            <div class="end1"><img src="/img/end1.png" class="end11">
                <a href=""><img src="/img/faceebook.png" class="insta1"></a>
                <a href=""><img src="/img/instagram.png" class="insta2"></a>
                <a href=""><img src="/img/twitter.png" class="insta3"></a>
            </div>
            <div class="end2">
                <a class="pt-trigger" href="#home" data-animation="60" data-goto="1"><div class="vniz">
                <p class="pstrelka4 pstr4"><?=Yii::t('app', 'главная')?></p>
                <div class="strelka4">
                    <div class="out">
                       <img src="/img/strelka.png" class="strelkaout">
                        <img src="/img/strelkain4.png"  class = "strelin strelin4">
                    </div>
                </div>
                <div class="strelkay4">
                    <div class="out">
                       <img src="/img/yellowarrow4.png" class="strelkaout">
                    </div>
                </div></a>
                </div>
            </div>
            <div class="end3">
                <div class="enru">
                    <a href="<?=$ru_link?>"><p class="ru ru2"><b>RU</b></p></a>
                    <img src="/img/ruen.png" class="ruen">
                    <a href="<?=$en_link?>"><p class="en en2"><b>EN</b></p></a>
                </div>
            </div>
        </div>

</section>
            <!-- /Portfolio Subpage -->

            <!-- Blog Subpage -->
<section class="pt-page pt-page-5" data-id="services">


        <div class="servicesend">
           <div class="srdd">
            <p><?=Yii::t('app', 'Закажите <br> каталог')?></p>
            <div class="uslugim u1 uActive">
                <img src="/img/u1.png" class="imguslugi">
            </div>
            <div class="uslugim u2">
                <img src="/img/u2.jpg" class="imguslugi">
            </div>
            <div class="uslugim u3">
                <img src="/img/u3.png" class="imguslugi">
            </div>
            <div class="uslugim u4">
                <img src="/img/u4.png" class="imguslugi">
            </div>
            <div class="uslugim u5">
                <img src="/img/u5.jpg" class="imguslugi">
            </div>
            <div class="uslugim u6">
                <img src="/img/u6.jpg" class="imguslugi">
            </div>
            <div class="uslugim u7">
                <img src="/img/u7.png" class="imguslugi">
            </div>
            <div class="uslugim u8">
                <img src="/img/u8.jpg" class="imguslugi">
            </div>
            <button class="uslugibut"><a href="#fancy" class="fancybox"><?=Yii::t('app', 'ЗАКАЗАТЬ')?></a></button>
            </div>
        </div>


        <div class="tekstura">
               <img src="/img/tekstura.png" class="tekstura">
        </div>
        <div class="fullwidth-bg" id="aboutvideo3">

        </div>
        <div class="head">

            <div class="head1"><img src="/img/head1.png" class="headA">
            <a class="pt-trigger" href="#home" data-animation="61" data-goto="1"><img src="/img/headlogo.png" class="headlogo"></a></div>
            <div class="vverh"><a class="pt-trigger" href="#contacts" data-animation="61" data-goto="3">
                <div class="strelka">
                    <div class="out">
                       <img src="/img/strelka.png" class="strelkaout">
                        <img src="/img/strelkain.png"  class = "strelin strelin1">
                    </div>
                </div>
                <div class="strelkay">
                    <div class="out">
                       <img src="/img/yellowarrow2.png" class="strelkaout">
                    </div>
                </div>
                <p class="pstrelka"><?=Yii::t('app', 'контакты')?></p></a>
            </div>
        </div>
        <div class="center">
           <div class="vlevo"><a class="pt-trigger" href="#about_me" data-animation="59" data-goto="2">
                  <div class="strelka2">
                    <div class="out">
                       <img src="/img/strelka.png" class="strelkaout">
                        <img src="/img/strelkain2.png"  class = "strelin strelin2">
                    </div>
                </div>
                <div class="strelkay2">
                    <div class="out">
                       <img src="/img/yellowarrow.png" class="strelkaout">
                    </div>
                </div>
                <p class="pstrelka2"><?=Yii::t('app', 'о нас')?></p></a>
           </div>
            <div class="ser">

<div class="blok5">
  <input type="radio" class="hidden" id="j1" name="win">
  <input type="radio" class="hidden" id="j2" name="win">
  <input type="radio" class="hidden" id="j3" name="win">
  <input type="radio" class="hidden" id="j4" name="win">
  <input type="radio" class="hidden" id="j5" name="win">
  <input type="radio" class="hidden" id="j6" name="win">
  <input type="radio" class="hidden" id="j7" name="win">
  <input type="radio" class="hidden" id="j8" name="win">
<div class="buttons5 left">
    <label for="j1" class="labelbuttons"><div class="k1"><div class="k2"><img src="/img/blok5/1.png" id="img5"></div><div class="k3"><p><?=Yii::t('app', 'Аквапарки и спрей парки')?></p></div></div></label>
    <label for="j2" class="labelbuttons2"><div class="k1"><div class="k2"><img src="/img/blok5/2.png" id="img5"></div><div class="k3"><p><?=Yii::t('app', 'Бассейны и волновые парки')?> </p></div></div></label>
    <label for="j3" class="labelbuttons3"><div class="k1"><div class="k2"><img src="/img/blok5/3.png" id="img5" alt=""></div><div class="k3"><p><?=Yii::t('app', 'SPA комплексы')?></p></div></div></label>
    <label for="j4" class="labelbuttons4"><div class="k1"><div class="k2"><img src="/img/blok5/4.png" id="img5" alt=""></div><div class="k3"><p><?=Yii::t('app', 'Фонтаны')?></p></div></div></label>
</div>

  <div class="okna" id="text">
    <div class="window5" id="v1">
        <div class="window5inf" id="a1">
            <img src="/img/blok5/9.png" class="imgblok5" style="float:left;"><p class="window5p1" style="float:left;"><?=Yii::t('app', 'Аквапарк')?></p>
            <a><img src="/img/zstrel.png" class="zstr" id="hider" ></a><br><br>
            <div class="window5info">
               <?=Yii::t('app', '<p>Компания «AQUALINE GEMAS» является официальным офисом продаж на территории СНГ всемирно-известной компании «Polin Waterparks», и реализовывает любой проект аквапарка. <p> У нас вы найдете самый широкий ассортимент водных горок для детской и взрослой категории посетителей. Отличительной особенностью наших горок является технология их производства. </p> <p> Мы единственная компания которая предлагает всю линейку водных горок, изготовленную по технологии RTM включая крупногабаритные элементы, благодаря которой вы получите: <br>')?>

<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'глянцевую поверхность с обеих сторон горки;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'стойкий цвет не подверженный выгоранию на солнце;')?>     <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'стойкость к механическим повреждениям в том числе к царапинам от купальных костюмов;')?> <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'более прочные горки при меньшем весе;')?> <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'возможность применения эффектов естественного света, узоров, либо полностью прозрачные варианты.')?>  </p><br>
<p>
<span class="yell"><i><b><?=Yii::t('app', 'Своим клиентам')?></b></i></span><?=Yii::t('app', ', заинтересованным в строительстве аквапарков мы готовы предложить следующие виды услуг:')?><br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Разработка эскизного проекта аквапарка согласно выделенной территории с наиболее оптимальной расстановкой всех составляющих (водные аттракционы, бассейны, зоны входа, раздевалок и т.д) с последующим предоставлением 3D видео.')?>   <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'По итогам утверждения эскизного проекта предоставляем полное коммерческое предложение, которое включает стоимость водных горок и водных аттракционов, оборудование бассейнов с учетом облицовочной части, включая монтажные работы и  расходы по доставке и таможенной очистке груза.')?>     <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Осуществляем заказ на изготовление водных аттракционов;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Организовываем доставку всего объема товара на объект заказчика, включая таможенную очистку груза;')?>     <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Выполняем монтаж водных аттракционов и всего перечня оборудования для водных горок и бассейнов, включая облицовочные работы в бассейнах;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Производим пуско-наладочные работы всего перечня оборудования и запуск в эксплуатацию;')?>     <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Проводим сервисное обслуживание и обучение персонала заказчика.')?> </p>
<br>

<p class="wip"><?=Yii::t('app', 'Детские  SPRAY Парки.')?></p>
<p><?=Yii::t('app', 'Компания «AQUALINE GEMAS» рада предложить своим клиентам детские интерактивные водные площадки «SPRAY ZONE». Они идеально сочетают в себе незабываемые детские развлечения с максимальной безопасностью. <p>Глубина бассейнов Spray Zone составляет не более 5 см, нескользящая поверхность обеспечит безопасное движение детей во время игр. Огромным плюсом является тот факт, что аттракционы SPRAY ACTION можно разместить на территории любой площадки. Обширный выбор моделей игрушек не оставит детей равнодушными.</p><p>Все элементы «SPRAY ACTION» имеют яркий дизайн и интересные формы, обеспечивая часы веселья для маленьких гостей.</p>')?></p><br>
<p>
<span class="yell"><i><b><?=Yii::t('app', 'Своим клиентам')?></b></i></span><?=Yii::t('app', ', заинтересованным в строительстве SPRAY парков мы готовы предложить следующие виды услуг:')?><br>

<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'разработка эскизного проекта «SPRAY ZONE»;')?>     <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Подбор наиболее оптимальных моделей аттракционов SPRAY ACTION;')?>     <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Предоставление полного коммерческого предложение;')?>      <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Осуществление доставки товара и выполнение монтажных работ;')?>     <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Пуско-наладочные работы;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Сервисное обслуживание оборудования и обучение специалистов заказчика.')?>      </p>
</p>
            </div>
            <a href="#fancy" class="fancybox"><button class="window5button" id="myBtn9"><b><?=Yii::t('app', 'ЗАКАЗАТЬ')?> </b></button></a>
        </div>
    </div>
    <div class="window5" id="v2"><div class="window5inf">
            <img src="/img/blok5/9.png" class="imgblok5" style="float:left;"><p class="window5p1" style="float:left;"><?=Yii::t('app', 'Бассейны и волновые парки')?> </p>
            <a class="ahref"><img src="/img/zstrel.png" class="zstr" id="hider"></a><br><br>
            <div class="window5info">
                <p><?=Yii::t('app', 'Компания «AQUALINE GEMAS» является официальным дистрибьютором крупнейших фабрик, таких как GEMAS, BETSAN, производящих оборудование и материалы для бассейнов, соответствующих европейским стандартам качества. Осуществляет прямые поставки оборудования производителей ASTRAL POOL, CEPEX, SERA POOL,  KYK и многих других.')?><br><p>
<?=Yii::t('app', 'На сегодняшний день наша компания успешно реализовала свыше 200 проектов бассейнов различного назначения. Неважно будет ли ваш бассейн домашним и уютным, либо общественным с замысловатой формой, важна только кристальная чистота воды, экологичность используемых материалов и качество выполняемых работ. Мы реализуем проекты бассейнов любой сложности, используя только качественное оборудование от лидирующих мировых производителей, сохраняя приемлемые цены благодаря прямой работе с фабриками.</p><br> <p>Наш опыт и наличие поставок инновационного оборудования позволяет осуществлять проекты бассейнов следующих видов:')?> <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Частные бассейны;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'детские бассейны любого назначения;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'полуспортивные и спортивные бассейны соответсвующие стандартам FINA.')?>     <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Общественные бассейны любой площади;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Волновые бассейны различных видов;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Бассейны для серфинга;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Бассейны с морской водой;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Бассейны «Лагуна» с зоной аквабара, а также с зоной аэро-гидромассажа;')?>     <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Ленивые реки – «LAZY RIVER»;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Быстрые реки и реки с зоной Рафтинг;')?>     </p><br>
<p>
<span class="yell"><i><b><?=Yii::t('app', 'Своим клиентам</b></i></span>, заинтересованным в строительстве бассейнов мы готовы предложить следующие виды услуг: ')?><br>

<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Разработка эскизной визуализации проекта будущего бассейна;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Составление детального коммерческого предложения с подбором наиболее оптимального оборудования;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Предоставление полного технического задания;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Выполнение монтажа всего перечня оборудования;')?>     <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Выполнение гидроизоляционных и облицовочных работ;')?>     <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Пуско-наладочные работы, с учетом первичной дезинфекции воды бассейна')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Сервисное обслуживание оборудование / проведение обучения персонала заказчика.')?>     </p>

</p>
            </div>
            <a href="#fancy" class="fancybox"><button class="window5button" id="myBtn9"><b><?=Yii::t('app', 'ЗАКАЗАТЬ')?></b></button></a>
        </div></div>
    <div class="window5" id="v3"><div class="window5inf">
            <img src="/img/blok5/9.png" class="imgblok5" style="float:left;"><p class="window5p1" style="float:left;"><?=Yii::t('app', 'SPA комплексы')?></p><a class="ahref"><img src="/img/zstrel.png" class="zstr" id="hider"></a><br><br>
            <div class="window5info">
                <p><?=Yii::t('app', 'В современном мире динамика жизни имеет стремительный темп, но зачастую любому человеку нужен перерыв, и где как не на SPA можно обрести гармонию и расслабиться. На сегодняшний день SPA комплексы являются одними из наиболее востребованных и прибыльных видов бизнеса, имеющий огромный спрос. Наличие SPA в отеле стало одним из критериев присвоения звездности и подтверждением его статуса. <p>Компания «AQUALINE GEMAS» готова предложить своим клиентам широкий спектр различных решений по организации SPA комплексов. При разработке проектов SPA мы уделяем особое внимание эффективному зонированию пространства и функциональному наполнению.')?></p> <br>
<p><?=Yii::t('app', 'Сотрудничество с мировыми компаниями позволяет получить бесценный опыт и знания, применяемые на практике, что обеспечивает успешность проекта и профессионализм на любом этапе.')?></p> <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Классические турецкие хамамы с сохранением исторических особенностей помещений;')?>     <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Различные предложения по саунам (классическая финская сауна с нестандартными решениями в части отделки, био и инфракрасные сауны, скифские сауны, травяные и солевые сауны, русские бани, Сауны на открытом воздухе, тепидрариум, кальдарий, лакония, расул)')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Паровые и арома комнаты;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Снежные комнаты и ледовые гроты;')?>     <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Душевые гроты, шоковые души и души впечатлений;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Термальные бассейны;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Vitality Pool и гидромассажные бассейны;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Flotation Pool и Kneipp foot pool')?>     <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Массажные  и бьюти комнаты')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Комнаты для медитации, солевой, песочной и винной терапии и многое другое.')?>     <br>

<p><span class="yell"><?=Yii::t('app', '<i><b> Своим клиентам</b></i></span>, заинтересованным в строительстве SPA комплексов мы готовы предложить следующие виды услуг:')?> <br>

<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Эскизный проект помещения SPA с оптимальным вариантом зонирования всего пространства;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Предоставление полного коммерческого предложения на объекты SPA согласно эскизному проекту;')?>     <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Доставка и таможенная очистка оборудования и материалов;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Монтаж оборудование и облицовочные работы;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Пуско-наладочные работы и запуск')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Сервисное обслуживание оборудование и обучение специалистов заказчика.')?>     </p>

</p>
            </div>
            <a href="#fancy" class="fancybox"><button class="window5button" id="myBtn9"><b><?=Yii::t('app', 'ЗАКАЗАТЬ')?></b></button></a>
        </div></div>
    <div class="window5" id="v4"><div class="window5inf">
            <img src="/img/blok5/9.png" class="imgblok5" style="float:left;"><p class="window5p1" style="float:left;"><?=Yii::t('app', 'Фонтаны')?> </p>
            <a class="ahref"><img src="/img/zstrel.png" class="zstr" id="hider"></a><br><br>
            <div class="window5info">
                <p><?=Yii::t('app', 'Компания «AQUALINE GEMAS» осуществляет строительство фонтанов любой сложности, которые становятся не просто одним из водных сооружений, а переходят в ранг достопримечательностей.<br><p>Мы являемся официальным дистрибьютором компании   «AQUATRONIC» на территории стран СНГ и готовы реализовать любое решение по созданию фонтанов. Собственное производство всего перечня оборудования позволяет решать любые задачи. Все оборудование проходит контрольное испытание и наши заказчики могут быть уверены в совершенстве итогового результата. </p> <br> <p>Уникальный проектно-конструкторский отдел и квалифицированный инженерный состав гарантирует успех проекта. Наша компания предлагает: <br><img src="/img/yel.png" class="yel">    Классические фонтаны;<br><img src="/img/yel.png" class="yel">    Светомузыкальные и поющие фонтаны;<br><img src="/img/yel.png" class="yel">    Сухие и пешеходные фонтаны;<br><img src="/img/yel.png" class="yel">    Городские фонтаны любой площади;<br><img src="/img/yel.png" class="yel">    Туманные фонтаны;<br><img src="/img/yel.png" class="yel">    Огненные фонтаны и многое другое.<br></p>')?>
<p>
<span class="yell"><i><b><?=Yii::t('app', 'Своим клиентам</b></i></span>, заинтересованным в строительстве фонтанов мы готовы предложить следующие виды услуг:')?><br>

<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Разработка проекта с последующим предоставлением 3D визуализации и видео;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Подбор оптимальных моделей оборудования (фонтанные насадки, насосное оборудование, системы программирования)')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Предоставление полного коммерческого предложения;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Доставка с учетом таможенной очистки')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Проведение монтажных работ')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Пуско-наладочные работы')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Сервисное обслуживание и обучение персонала заказчика.')?>     </p>

</p>
            </div>
            <a href="#fancy" class="fancybox"><button class="window5button" id="myBtn9"><b><?=Yii::t('app', 'ЗАКАЗАТЬ')?></b></button></a>
        </div></div>
    <div class="window5" id="v5"><div class="window5inf">
            <img src="/img/blok5/9.png" class="imgblok5" style="float:left;"><p class="window5p1" style="float:left;"><?=Yii::t('app', 'Игровые технологии')?> </p><a class="ahref"><img src="/img/zstrel.png" class="zstr" id="hider"></a><br><br>
            <div class="window5info">
                <p><?=Yii::t('app', 'Компания «AQUALINE GEMAS» предлагает ощутить новую реальность, выходящую за пределы воображения!<br>')?>
<?=Yii::t('app', 'Совместно с мировым лидером в индустрии аттракционов для аквапарков «Polin Waterparks», мы с гордостью представляем игровую продукцию подразделения компании PolinGameTechnologies, которое интегрирует новейшие технологические разработки, игры и интерактивные решения в развлекательную среду аквапарков, предлагая их посетителям новые и уникальные впечатления, ранее неизвестные на водных аттракционах. Это значительно расширяет аудиторию посетителей аквапарков.<br><p>Компания «Polin Waterparks» уверенно работает в сфере аквапарков вот уже более 40 лет, и теперь, благодаря нашему опыту и знаниям, клиенты могут извлечь выгоду, используя наши новейшие разработки – уникальные игры, интерактивные продукты и комплексные технологии: <br>')?>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Splash Cabin - уникальная кабина с брызгами;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Slide”n Score;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'VR технологии;')?>     <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Аттракцион Splash Cinema;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Интерактивный аттракцион Dark Rivers;')?>    <br></p>
<p><?=Yii::t('app', 'С этими и многими другими предложениями вы можете ознакомиться в нашем каталоге и открыть для себя новые доступные захватывающие решения, которые заставят посетителей возвращаться в аквапарк снова и снова. Вы будете удивлены богатством ассортимента.</p>')?>


</p>
            </div>
            <a href="#fancy" class="fancybox"><button class="window5button" id="myBtn9"><b><?=Yii::t('app', 'ЗАКАЗАТЬ')?></b></button></a>
        </div></div>
    <div class="window5" id="v6"><div class="window5inf">
            <img src="/img/blok5/9.png" class="imgblok5" style="float:left;"><p class="window5p1" style="float:left;"><?=Yii::t('app', 'Аквариумы')?> </p><a class="ahref"><img src="/img/zstrel.png" class="zstr" id="hider"></a><br><br>
            <div class="window5info">
                <p><?=Yii::t('app', 'Компания «AQUALINE GEMAS» став официальным офисом продаж групп компаний «PolinGroup» теперь может предложить вам новый и уникальный  вид бизнеса, не имеющий аналогов на территории Средней Азии – Polin Aquariums.')?> <p>
<?=Yii::t('app', 'Polin Aquariums - единственная компания в регионе и одна из немногих в мире, с которой можно построить общественные океанариумы, террариумы и зоологические экспонаты от концепции до завершения. Опытный персонал Polin Aquarium включает в себя; Архитекторов, дизайнеров интерьеров, зоологов, морских биологов, инженеров-механиков, художников и скульпторов.</p><p> Представьте себе ваше путешествие по океанариуму вашей мечты. Наши дизайнеры и архитекторы могут воплотить вашу концепцию в реальность. В сотрудничестве с нашими специалистами по планированию, оценке и инженерами мы можем быстро повысить ценность проекта. Наши глубокие знания в области строительства специальных аквариумов и зоопарков означают, что каждый проект гарантированно будет уникальным и идеально подходящим для жителей.</p><p>Мы предлагаем: <br>')?>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Аквариумы с китами;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Аквариумы с акулами;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Тоннельные аквариумы;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Полуоткрытые аквариумы;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Цилиндрические аквариумы;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Контактные бассейны с морскими животными;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Учебные аквариумы;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Аквариумы кейдж-дайвинг;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Бассейны для плавания со скатами и дельфинами;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Бассейны с пингвинами и арктическими птицами;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Водные горки внутри аквариумов;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Внутренний декор аквариумов;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Тематизация здания океанариума в стиле бренда и морской тематики;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Организация территории фуд-корта;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Сувенирных магазинов;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'А также фотозон, ХD кинотеатров и VR систем')?>    <br></p>
<p>
<span class="yell"><?=Yii::t('app', '<i><b>Своим клиентам</b></i></span>, заинтересованным в строительстве океанариумов мы готовы предложить следующие виды услуг: <br>')?>

<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'разработка концепции океанариума на основании проведенных маркетинговых и статистических исследований (изучение региона строительства, численность населения, стоимостные показатели и т.д)')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'комплексная разработка проекта здания океанариума;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'управление строительством;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'производство и монтаж аквариумов и бассейнов;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'монтаж технологического оборудования систем поддержки жизни аквариумов;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'искусственная среда и декор;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'заполнение аквариумов водой и подготовка к выпуску морских животных;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'приобретение морских животных;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'водная подготовка животных и акклиматизация;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'сервисное обслуживание;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'услуги управления.')?>    <br> </p>

</p>
            </div>
            <a href="#fancy" class="fancybox"><button class="window5button" id="myBtn9"><b><?=Yii::t('app', 'ЗАКАЗАТЬ')?></b></button></a>
        </div></div>
    <div class="window5" id="v7"><div class="window5inf">
            <img src="/img/blok5/9.png" class="imgblok5" style="float:left;"><p class="window5p1" style="float:left;"><?=Yii::t('app', 'Сафари парки')?> </p><a class="ahref"><img src="/img/zstrel.png" class="zstr" id="hider"></a><br><br>
            <div class="window5info">
                <p><?=Yii::t('app', 'Компания «AQUALINE GEMAS» став официальным офисом продаж групп компаний «PolinGroup» теперь может  предложить вам зоопарки нового поколения -  PolinSafariParks.<br> Это уникальные зоопарки-заповедники, которые набирают мировую популярность.')?>
<p><?=Yii::t('app', 'В отличие от традиционных зоопарков, зоопарки нового поколения, заповедники дикой природы и сафари-парки позволяют посетителям встретиться с живыми существами, отделенными только стеклянными и акриловыми панелями.</p><p> Без использования каких-либо железных заграждений посетители испытывают более тесную связь с дикой природой. Эти прозрачные поверхности интегрированы со специальными функциями безопасности, которые обеспечивают безопасное и приятное впечатление как для посетителей, так и для диких существ. Мало того, что области дикой природы безопасны, но они также очень просторны и удобны, так как были разработаны с учетом индивидуальных потребностей каждого существа. Поддержание этих естественных сред чрезвычайно важно, и все области дикой природы обеспечивают определенные художественные оформления, озеленение, убежища и действия, которые точно изображают среды обитания и продвигают деятельность и долголетие. Мы искусно разрабатываем эти зоны, чтобы посетители могли получить красивый визуальный опыт. Некоторые из природных парков жизни, предлагающих различные пейзажи и концепции, - это африканская саванна, каньоны в Соединенных Штатах и египетская пустыня.</p> <p> Эти зоопарки нового поколения становятся новым стандартом, заменяя традиционные зоопарки с «железной решеткой» по всему миру. <br><br> В числе наших предложений имеются:<br>')?>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Парки диких кошек;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Тропические дома рептилий;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Парки аллигаторов;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Тропические парки птиц;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'Тропические парки бабочек;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', ' WildPark – организованные на территории торговых центров, отелей, парков развлечений и океанариумов.')?>    </p>
<p>
<span class="yell"><i><b><?=Yii::t('app', 'Своим клиентам</b></i></span>, заинтересованным в строительстве сафари парков мы готовы предложить следующие виды услуг: <br>')?>

<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'разработка концепции парка;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'разработка проекта;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'управление строительством;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'приобретение живых существ и их адаптация;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'сервисное обслуживание;')?>    <br>
<img src="/img/yel.png" class="yel"><?=Yii::t('app', 'управление парком.')?>     <br> </p>

</p>
            </div>
            <a href="#fancy" class="fancybox"><button class="window5button" id="myBtn9"><b><?=Yii::t('app', 'ЗАКАЗАТЬ')?></b></button></a>
        </div></div>
    <div class="window5" id="v8"><div class="window5inf">
            <img src="/img/blok5/9.png" class="imgblok5" style="float:left;"><p class="window5p1" style="float:left;"><?=Yii::t('app', 'тематизация объектов')?> </p><a class="ahref"><img src="/img/zstrel.png" class="zstr" id="hider"></a><br><br>
            <div class="window5info">
                <p><?=Yii::t('app', 'Компания «AQUALINE GEMAS» предлагает свои услуги в сфере тематизации действующих объектов, создание тематизированных и стилизованных парков больших и маленьких фигур. Познавательных зон в тематиках живого или подводного мира и многое другое. <p> В соответствии с потребностями клиентов дизайны создаются нашей опытной командой дизайнеров с использованием новейших 3D-моделей и графических программ. Наша команда заботится о том, чтобы подготовить правильный дизайн в соответствии с потребностями, которые точно соответствуют постоянно меняющимся мировым тенденциям в области техники и искусства.</p> <p> При реализации проекта наша команда инженеров полагается на отраслевой опыт, чтобы найти правильное решение. Удовлетворение потребностей клиентов является нашим главным приоритетом наряду с обширными знаниями в области материалов и технологий. </p>')?>
<p>
<?=Yii::t('app', 'Получить всю информацию касательно тематизации объектов, вы можете в офисе нашей компании, а также в электронных каталогах.')?></p>

</p>
            </div>
            <a href="#fancy" class="fancybox"><button class="window5button" id="myBtn10"><b><?=Yii::t('app', 'ЗАКАЗАТЬ')?></b></button></a>
        </div></div>
  </div>



<div class="buttons5 right">
    <label for="j5" class="labelbuttons5"><div class="k1"><div class="k2"><img src="/img/blok5/5.png" id="img5"></div><div class="k3"><p><?=Yii::t('app', 'Игровые технологии')?></p></div></div></label>
    <label for="j6" class="labelbuttons6"><div class="k1"><div class="k2"><img src="/img/blok5/6.png" id="img5"></div><div class="k3"><p><?=Yii::t('app', 'Аквариумы')?></p></div></div></label>
    <label for="j7" class="labelbuttons7"><div class="k1"><div class="k2"><img src="/img/blok5/7.png" id="img5" alt=""></div><div class="k3"><p><?=Yii::t('app', 'Сафари парки')?></p></div></div></label>
    </a>
    <label for="j8" class="labelbuttons8"><div class="k1"><div class="k2"><img src="/img/blok5/8.png" id="img5" alt=""></div><div class="k3"><p><?=Yii::t('app', 'Тематизация объектов')?></p></div></div></label>
</div>




</div>
            </div>
            <div class="vpravo"><a class="pt-trigger" href="#home" data-animation="58" data-goto="1" id="perehod">
                  <div class="strelka3">
                    <div class="out">
                       <img src="/img/strelka.png" class="strelkaout">
                        <img src="/img/strelkain3.png"  class = "strelin strelin3">
                    </div>
                </div>
                <div class="strelkay3">
                    <div class="out">
                       <img src="/img/yellowarrow3.png" class="strelkaout">
                    </div>
                </div>
                <p class="pstrelka3"><?=Yii::t('app', 'главная')?></p></a>
           </div>
        </div>
        <div class="end">
            <div class="end1"><img src="/img/end1.png" class="end11">
                <a href=""><img src="/img/faceebook.png" class="insta1"></a>
                <a href=""><img src="/img/instagram.png" class="insta2"></a>
                <a href=""><img src="/img/twitter.png" class="insta3"></a>
            </div>
            <div class="end2">
                <a class="pt-trigger" href="#portfolio" data-animation="60" data-goto="4"><div class="vniz">
                <p class="pstrelka4" id="vni"><?=Yii::t('app', 'портфолио')?></p>
                <div class="strelka4">
                    <div class="out">
                       <img src="/img/strelka.png" class="strelkaout">
                        <img src="/img/strelkain4.png"  class = "strelin strelin4">
                    </div>
                </div>
                <div class="strelkay4">
                    <div class="out">
                       <img src="/img/yellowarrow4.png" class="strelkaout">
                    </div>
                </div>
                </div></a>
            </div>
            <div class="end3">
                <div class="enru">
                    <a href="<?=$ru_link?>"><p class="ru ru2"><b>RU</b></p></a>
                    <img src="/img/ruen.png" class="ruen">
                    <a href="<?=$en_link?>"><p class="en en2"><b>EN</b></p></a>
                </div>
            </div>
        </div>
</section>

          </div>

<!--мобильная версия-->
<div class="cont show-mobile">
<div class="container">
    <div class="logom">
        <img src="/img/logom.png" class="logoimg">
        <img src="/img/phone.png" class="phone">
        <a href="tel:+7 701 226 83 66" class="logop">+7 701 226 83 66</a>
        <select onchange="location = this.value;" class="select">
            <option value="<?=$ru_link?>" <?=Yii::$app->language == 'ru' ? 'selected' : ''?>>RU</option>
            <option value="<?=$en_link?>" <?=Yii::$app->language == 'en' ? 'selected' : ''?>>EN</option>
        </select>
    </div>
    <div class="block1">
       <img src="/img/aqua.png" class="block1img">
        <p class="block1p1"><?=Yii::t('app', 'предоставляет полный спектр услуг')?></p>
        <p class="block1p2"><?=Yii::t('app', 'для индустрии<br>водных развлечений')?></p>
        <a href="/site/consultation"><button class="block1but"><?=Yii::t('app', 'консультация')?></button></a>
    </div>



    <div class="block2">
        <p class="block2p"><?=Yii::t('app', 'услуги')?></p>
        <div class="buttons">
           <div class="button12">
            <div class="button1">
               <div class="but">
                <img src="/img/1.png" class="button1img">
                <p class="button1p"><?=Yii::t('app', 'Аквапарки<br>и спрей парки')?></p>
                <a href="/site/services/1"><img src="/img/vpravom.png" class="button1str"></a>
                </div>
            </div>
            <div class="button2">
               <div class="but">
                <img src="/img/2.png" class="button2img">
                <p class="button1p"><?=Yii::t('app', 'Бассейны<br>и волновые парки')?> </p>
                <a href="/site/services/3"><img src="/img/vpravom.png" class="button1str"></a>
            </div>
            </div>
            </div>
            <div class="button12">
            <div class="button1">
               <div class="but">
                <img src="/img/3.png" class="button1img">
                <p class="button1p"><?=Yii::t('app', 'SPA<br>комплексы')?></p>
                <a href="/site/services/4"><img src="/img/vpravom.png" class="button3str"></a>
            </div>
            </div>
            <div class="button2">
               <div class="but">
                <img src="/img/4.png" class="button1img">
                <p class="button2p"><?=Yii::t('app', 'Фонтаны')?></p>
                <a href="/site/services/5"><img src="/img/vpravom.png" class="button2str"></a>
            </div>
            </div>
            </div>
            <div class="button12">
            <div class="button1">
               <div class="but">
                <img src="/img/5.png" class="button2img">
                <p class="button1p"><?=Yii::t('app', 'Игровые<br>технологии')?></p>
                <a href="/site/services/6"><img src="/img/vpravom.png" class="button1str"></a>
            </div>
            </div>
            <div class="button2">
               <div class="but">
                <img src="/img/6.png" class="button1img">
                <p class="button2p"><?=Yii::t('app', 'Аквариумы')?></p>
                <a href="/site/services/7"><img src="/img/vpravom.png" class="button4str"></a>
            </div>
            </div>
            </div>
            <div class="button12">
            <div class="button1">
               <div class="but">
                <img src="/img/7.png" class="button1img">
                <p class="button2p"><?=Yii::t('app', 'Сафари парки')?></p>
                <a href="/site/services/8"><img src="/img/vpravom.png" class="button2str"></a>
            </div>
            </div>
            <div class="button2">
               <div class="but">
                <img src="/img/8.png" class="button1img">
                <p class="button1p"><?=Yii::t('app', 'Тематизация<br>объектов')?></p>
                <a href="/site/services/9"><img src="/img/vpravom.png" class="button3str"></a>
            </div>
            </div>
            </div>

        </div>
    </div>
    <div class="block3">
        <p class="block3p"><b class="block3b"><?=Yii::t('app', 'Компания «AQUALINE GEMAS»</b> крупнейший поставщик, предлагающий самый широкий спектр услуг для индустрии водных развлечений и парков отдыха.</p><p class="block3p"><i>ПОЧЕМУ ИМЕННО МЫ!</i>')?></p>



<div class="kapli">
   <div class="kapli1"><div class="kapli2">
    <br><img src="/img/01block3.png" class="kapliheadimg">
    <p class="kapliheadp"><?=Yii::t('app', 'Мы являемся')?></p>
    <input type="checkbox" class="read-more-state" id="post-1" />
    <label for="post-1" class="read-more-trigger"></label>
  <p class="read-more-wrap"><br><br><?=Yii::t('app', 'официальным дистрибьютором крупнейших фабрик, производящих оборудование</span> <span class="read-more-target">согласно европейского стандарта качества, что позволяет реализовывать самые смелые и инновационные проекты международного уровня, более того, благодаря прямой работе с фабриками мы имеем возможность поставлять качественный товар по доступной цене, обходя накрутки перекупщиков.')?>   <br><br></span></p>
</div>
</div>
</div>

<div class="kapli">
   <div class="kapli1"><div class="kapli2">
    <br><img src="/img/01block3.png" class="kapliheadimg">
    <p class="kapliheadp"><?=Yii::t('app', 'с 2015 года')?></p>
    <input type="checkbox" class="read-more-state" id="post-2" />
    <label for="post-2" class="read-more-trigger"></label>
  <p class="read-more-wrap"> <br><br><?=Yii::t('app', 'компания «AQUALINE GEMAS» является официальным офисом продаж</span> <span class="read-more-target"> компании «Polin Waterparks» (Турция) на территории Средней Азии. А уже с 2019 года мы стали официальным офисом продаж на территории стран СНГ и вошли в состав группы компаний «Polin Group» что подкрепляет наш статус и надежность.')?>    <br><br></span></p>
</div>
</div>
</div>

<div class="kapli">
   <div class="kapli1"><div class="kapli2">
    <br><img src="/img/01block3.png" class="kapliheadimg">
    <p class="kapliheadp3"><?=Yii::t('app', 'За более чем<br> 10 летний опыт</p>')?>
    <input type="checkbox" class="read-more-state" id="post-3" />
    <label for="post-3" class="read-more-trigger"><br></label>
  <p class="read-more-wrap"><br><br><?=Yii::t('app', 'работы на территории Центральной Азии мы успешно реализовали свыше 300</span> <span class="read-more-target">проектов. Наши партнеры доверяют нам и ценят качество реализуемого товара и выполняемых работ что подтверждают проекты расширения территорий.')?>   <br><br></span></p>
</div>
</div>
</div>

<div class="kapli">
   <div class="kapli1"><div class="kapli2">
    <br><img src="/img/01block3.png" class="kapliheadimg">
    <p class="kapliheadp3"><?=Yii::t('app', 'В штате компании<br>находятся')?></p>
    <input type="checkbox" class="read-more-state" id="post-4" />
    <label for="post-4" class="read-more-trigger"></label>
  <p class="read-more-wrap"><br><br><?=Yii::t('app', 'опытные и талантливые специалисты, которые могут решить задачу любой </span> <span class="read-more-target">сложности, ведь работа по созданию проектов требует огромных знаний, которые в конечном итоге приводят к успеху всего проекта в целом. Мы постоянно повышаем свои знания и навыки проходя ежегодное повышение квалификации на фабриках мирового уровня и готовы реализовывать их для вас. ')?>  <br><br></span></p>
</div>
</div>
</div>

<div class="kapli">
   <div class="kapli1"><div class="kapli2">
    <br><img src="/img/01block3.png" class="kapliheadimg">
    <p class="kapliheadp"><?=Yii::t('app', 'в 2019 году')?></p>
    <input type="checkbox" class="read-more-state" id="post-5" />
    <label for="post-5" class="read-more-trigger"></label>
  <p class="read-more-wrap"><br><br><?=Yii::t('app', 'компания «AQUALINE GEMAS» была удостоена наградой «IMPORTER OF THE</span> <span class="read-more-target">YEAR» заняв 2-е место в топ 5  и 7-е место в топ 100 среди импортеров Республики Казахстан по показателям «Объем производства»')?>   <br><br></span></p>
</div>
</div>
</div>
</div>

<div class="block4">

<div class="slick1">
<p class="block4p"><?=Yii::t('app', 'наши партнеры')?> </p>
    <div class="partner owl-carousel owl-theme">
            <img src="/img/blok2/partner1.png" alt="">
            <img src="/img/blok2/partner2.png" alt="">
            <img src="/img/blok2/partner3.png" alt="">

            <img src="/img/blok2/partner4.png" alt="">
            <img src="/img/blok2/partner5.png" alt="">
            <img src="/img/blok2/partner6.png" alt="">

            <img src="/img/blok2/partner7.png" alt="">
            <img src="/img/blok2/partner8.png" alt="">
            <img src="/img/blok2/partner9.png" alt="">
    </div>

<p class="block4p"><?=Yii::t('app', 'Наши заказчики')?></p>
    <div class="partner owl-carousel owl-theme">
            <img src="/img/zakazshiki/zakaz1.png" alt="">
            <img src="/img/zakazshiki/zakaz2.png" alt="">
            <img src="/img/zakazshiki/zakaz3.png" alt="">

            <img src="/img/zakazshiki/zakaz4.png" alt="">
            <img src="/img/zakazshiki/zakaz5.png" alt="">
            <img src="/img/zakazshiki/zakaz6.png" alt="">

            <img src="/img/zakazshiki/zakaz7.png" alt="">
            <img src="/img/zakazshiki/zakaz8.png" alt="">
            <img src="/img/zakazshiki/zakaz9.png" alt="">
    </div>
</div>
</div>


<div class="block5">
<p class="block5p"><b class="block5b"><?=Yii::t('app', 'РЕАЛИЗОВАННЫЕ ПРОЕКТЫ')?></b><br>
<?=Yii::t('app', 'У нас свыше 300 выполненных проектов')?></p>

<div class="block51">
  <div class="block51_border">
   <img src="/img/blok3/1.png" class="img51">
    <p class="block51p"><?=Yii::t('app', 'Аквапарк')?></p>
<a href="#block1"><img src="/img/vnizp2.png" class="block51img"></a>
</div>
</div>
<div class="hide-show" id="block1">
<div class="owl-carousel owl-theme">
    <?php if ($portfolios != null): ?>
        <?php $filtered = array_filter(
    $portfolios,
    function ($arr) {
        return $arr->category_id == (int) 1;
    }
);
?>
        <?php foreach ($filtered as $portfolio): ?>
            <div class="kart">
                <p class="kartp1"><?=$portfolio->name?></p>
                <hr class="kart__hr">
        <?php if ($portfolio->area != null): ?><p class="kartp2"> <?=Yii::t('app', 'Площадь')?>: <br> <b><?=$portfolio->area?> кв.м.</b> <br><br><br><?php endif; ?>
        <?php if ($portfolio->location != null): ?><?=Yii::t('app', 'Локация')?>:<br> <b><?=$portfolio->location?></b> <br><br></p><?php endif; ?>
                <?php
if (!empty($portfolio->images)) {$images = json_decode($portfolio->images);}
?>
                <?php if ($images != null && isset($images[0])): ?>
                    <img src="<?=isset($images[0][0]) ? $images[0][0] : ''?>" class="kart__img" alt="">
                <?php endif;?>
            </div>
        <?php endforeach;?>
    <?php endif;?>
</div>
</div>


<div class="block51">
  <div class="block51_border">
   <img src="/img/blok3/2.png" class="img51">
    <p class="block51p">Spray Zone</p>
<a href="#block2"><img src="/img/vnizp2.png" class="block51img"></a>
</div>
</div>

<div class="hide-show" id="block2">
<div class="owl-carousel owl-theme">
<?php if ($portfolios != null): ?>
        <?php $filtered = array_filter(
    $portfolios,
    function ($arr) {
        return $arr->category_id == (int) 2;
    }
);
?>
        <?php foreach ($filtered as $portfolio): ?>
            <div class="kart">
                <p class="kartp1"><?=$portfolio->name?></p>
                <hr class="kart__hr">
                <?php if ($portfolio->area != null): ?><p class="kartp2"> <?=Yii::t('app', 'Площадь')?>: <br> <b><?=$portfolio->area?> кв.м.</b> <br><br><br><?php endif; ?>
        <?php if ($portfolio->location != null): ?><?=Yii::t('app', 'Локация')?>:<br> <b><?=$portfolio->location?></b> <br><br></p><?php endif; ?>
                <?php
if (!empty($portfolio->images)) {$images = json_decode($portfolio->images);}
?>
                <?php if ($images != null && isset($images[0])): ?>
                    <img src="<?=isset($images[0][0]) ? $images[0][0] : ''?>" class="kart__img" alt="">
                <?php endif;?>
            </div>
        <?php endforeach;?>
    <?php endif;?>
    </div>
    </div>

<div class="block51">
  <div class="block51_border">
   <img src="/img/blok3/3.png" class="img51">
    <p class="block51p"><?=Yii::t('app', 'Игровые технологии')?></p>
<a href="#block3"><img src="/img/vnizp2.png" class="block51img"></a>
</div>
</div>

<div class="hide-show" id="block3">
<div class="owl-carousel owl-theme">
<?php if ($portfolios != null): ?>
        <?php $filtered = array_filter(
    $portfolios,
    function ($arr) {
        return $arr->category_id == (int) 3;
    }
);
?>
        <?php foreach ($filtered as $portfolio): ?>
            <div class="kart">
                <p class="kartp1"><?=$portfolio->name?></p>
                <hr class="kart__hr">
                <?php if ($portfolio->area != null): ?><p class="kartp2"> <?=Yii::t('app', 'Площадь')?>: <br> <b><?=$portfolio->area?> кв.м.</b> <br><br><br><?php endif; ?>
        <?php if ($portfolio->location != null): ?><?=Yii::t('app', 'Локация')?>:<br> <b><?=$portfolio->location?></b> <br><br></p><?php endif; ?>
                <?php
if (!empty($portfolio->images)) {$images = json_decode($portfolio->images);}
?>
                <?php if ($images != null && isset($images[0])): ?>
                    <img src="<?=isset($images[0][0]) ? $images[0][0] : ''?>" class="kart__img" alt="">
                <?php endif;?>
            </div>
        <?php endforeach;?>
    <?php endif;?>
    </div>
    </div>

<div class="block51">
  <div class="block51_border">
   <img src="/img/blok3/4.png" class="img51">
    <p class="block51p"><?=Yii::t('app', 'SPA комплексы')?></p>
<a href="#block4"><img src="/img/vnizp2.png" class="block51img"></a>
</div>
</div>
<div class="hide-show" id="block4">
<div class="owl-carousel owl-theme">
<?php if ($portfolios != null): ?>
        <?php $filtered = array_filter(
    $portfolios,
    function ($arr) {
        return $arr->category_id == (int) 4;
    }
);
?>
        <?php foreach ($filtered as $portfolio): ?>
            <div class="kart">
                <p class="kartp1"><?=$portfolio->name?></p>
                <hr class="kart__hr">
                <?php if ($portfolio->area != null): ?><p class="kartp2"> <?=Yii::t('app', 'Площадь')?>: <br> <b><?=$portfolio->area?> кв.м.</b> <br><br><br><?php endif; ?>
        <?php if ($portfolio->location != null): ?><?=Yii::t('app', 'Локация')?>:<br> <b><?=$portfolio->location?></b> <br><br></p><?php endif; ?>
                <?php
if (!empty($portfolio->images)) {$images = json_decode($portfolio->images);}
?>
                <?php if ($images != null && isset($images[0])): ?>
                    <img src="<?=isset($images[0][0]) ? $images[0][0] : ''?>" class="kart__img" alt="">
                <?php endif;?>
            </div>
        <?php endforeach;?>
    <?php endif;?>
    </div>
</div>

<div class="block51">
  <div class="block51_border">
   <img src="/img/blok3/5.png" class="img51">
    <p class="block51p"><?=Yii::t('app', 'Фонтаны')?></p>
<a href="#block5"><img src="/img/vnizp2.png" class="block51img"></a>
</div>
</div>
<div class="hide-show" id="block5">
<div class="owl-carousel owl-theme">
<?php if ($portfolios != null): ?>
        <?php $filtered = array_filter(
    $portfolios,
    function ($arr) {
        return $arr->category_id == (int) 5;
    }
);
?>
        <?php foreach ($filtered as $portfolio): ?>
            <div class="kart">
                <p class="kartp1"><?=$portfolio->name?></p>
                <hr class="kart__hr">
                <?php if ($portfolio->area != null): ?><p class="kartp2"> <?=Yii::t('app', 'Площадь')?>: <br> <b><?=$portfolio->area?> кв.м.</b> <br><br><br><?php endif; ?>
        <?php if ($portfolio->location != null): ?><?=Yii::t('app', 'Локация')?>:<br> <b><?=$portfolio->location?></b> <br><br></p><?php endif; ?>
                <?php
if (!empty($portfolio->images)) {$images = json_decode($portfolio->images);}
?>
                <?php if ($images != null && isset($images[0])): ?>
                    <img src="<?=isset($images[0][0]) ? $images[0][0] : ''?>" class="kart__img" alt="">
                <?php endif;?>
            </div>
        <?php endforeach;?>
    <?php endif;?>
    </div>
</div>

<div class="block51">
  <div class="block51_border">
   <img src="/img/blok3/6.png" class="img51">
    <p class="block51p block52p"><?=Yii::t('app', 'Бассейны и <br>волновые парки')?></p>
<a href="#block6"><img src="/img/vnizp2.png" class="block51img"></a>
</div>
</div>
<div class="hide-show" id="block6">
<div class="owl-carousel owl-theme">
<?php if ($portfolios != null): ?>
        <?php $filtered = array_filter(
    $portfolios,
    function ($arr) {
        return $arr->category_id == (int) 6;
    }
);
?>
        <?php foreach ($filtered as $portfolio): ?>
            <div class="kart">
                <p class="kartp1"><?=$portfolio->name?></p>
                <hr class="kart__hr">
                <?php if ($portfolio->area != null): ?><p class="kartp2"> <?=Yii::t('app', 'Площадь')?>: <br> <b><?=$portfolio->area?> кв.м.</b> <br><br><br><?php endif; ?>
        <?php if ($portfolio->location != null): ?><?=Yii::t('app', 'Локация')?>:<br> <b><?=$portfolio->location?></b> <br><br></p><?php endif; ?>
                <?php
if (!empty($portfolio->images)) {$images = json_decode($portfolio->images);}
?>
                <?php if ($images != null && isset($images[0])): ?>
                    <img src="<?=isset($images[0][0]) ? $images[0][0] : ''?>" class="kart__img" alt="">
                <?php endif;?>
            </div>
        <?php endforeach;?>
    <?php endif;?>
    </div>
</div>

<div class="block51">
  <div class="block51_border">
   <img src="/img/blok3/7.png" class="img51">
    <p class="block51p"><?=Yii::t('app', 'Аквариумы')?></p>
<a href="#block7"><img src="/img/vnizp2.png" class="block51img"></a>
</div>
</div>
<div class="hide-show" id="block7">
<div class="owl-carousel owl-theme">
<?php if ($portfolios != null): ?>
        <?php $filtered = array_filter(
    $portfolios,
    function ($arr) {
        return $arr->category_id == (int) 7;
    }
);
?>
        <?php foreach ($filtered as $portfolio): ?>
            <div class="kart">
                <p class="kartp1"><?=$portfolio->name?></p>
                <hr class="kart__hr">
                <?php if ($portfolio->area != null): ?><p class="kartp2"> <?=Yii::t('app', 'Площадь')?>: <br> <b><?=$portfolio->area?> кв.м.</b> <br><br><br><?php endif; ?>
        <?php if ($portfolio->location != null): ?><?=Yii::t('app', 'Локация')?>:<br> <b><?=$portfolio->location?></b> <br><br></p><?php endif; ?>
                <?php
if (!empty($portfolio->images)) {$images = json_decode($portfolio->images);}
?>
                <?php if ($images != null && isset($images[0])): ?>
                    <img src="<?=isset($images[0][0]) ? $images[0][0] : ''?>" class="kart__img" alt="">
                <?php endif;?>
            </div>
        <?php endforeach;?>
    <?php endif;?>
    </div>
</div>

<div class="block51">
  <div class="block51_border">
   <img src="/img/blok3/8.png" class="img51">
    <p class="block51p"><?=Yii::t('app', 'Сафари Парк')?></p>
<a href="#block8"><img src="/img/vnizp2.png" class="block51img"></a>
</div>
</div>
<div class="hide-show" id="block8">
<div class="owl-carousel owl-theme">
<?php if ($portfolios != null): ?>
        <?php $filtered = array_filter(
    $portfolios,
    function ($arr) {
        return $arr->category_id == (int) 8;
    }
);
?>
        <?php foreach ($filtered as $portfolio): ?>
            <div class="kart">
                <p class="kartp1"><?=$portfolio->name?></p>
                <hr class="kart__hr">
                <?php if ($portfolio->area != null): ?><p class="kartp2"> <?=Yii::t('app', 'Площадь')?>: <br> <b><?=$portfolio->area?> кв.м.</b> <br><br><br><?php endif; ?>
        <?php if ($portfolio->location != null): ?><?=Yii::t('app', 'Локация')?>:<br> <b><?=$portfolio->location?></b> <br><br></p><?php endif; ?>
                <?php
if (!empty($portfolio->images)) {$images = json_decode($portfolio->images);}
?>
                <?php if ($images != null && isset($images[0])): ?>
                    <img src="<?=isset($images[0][0]) ? $images[0][0] : ''?>" class="kart__img" alt="">
                <?php endif;?>
            </div>
        <?php endforeach;?>
    <?php endif;?>
    </div>
</div>

<div class="block51">
  <div class="block51_border">
   <img src="/img/blok3/9.png" class="img51">
    <p class="block51p block52p"><?=Yii::t('app', 'Тематизация <br>объектов')?></p>
<a href="#block9"><img src="/img/vnizp2.png" class="block51img"></a>
</div>
</div>
<div class="hide-show" id="block9">
<div class="owl-carousel owl-theme">
<?php if ($portfolios != null): ?>
        <?php $filtered = array_filter(
    $portfolios,
    function ($arr) {
        return $arr->category_id == (int) 9;
    }
);
?>
        <?php foreach ($filtered as $portfolio): ?>
            <div class="kart">
                <p class="kartp1"><?=$portfolio->name?></p>
                <hr class="kart__hr">
                <?php if ($portfolio->area != null): ?><p class="kartp2"> <?=Yii::t('app', 'Площадь')?>: <br> <b><?=$portfolio->area?> кв.м.</b> <br><br><br><?php endif; ?>
        <?php if ($portfolio->location != null): ?><?=Yii::t('app', 'Локация')?>:<br> <b><?=$portfolio->location?></b> <br><br></p><?php endif; ?>
                <?php
if (!empty($portfolio->images)) {$images = json_decode($portfolio->images);}
?>
                <?php if ($images != null && isset($images[0])): ?>
                    <img src="<?=isset($images[0][0]) ? $images[0][0] : ''?>" class="kart__img" alt="">
                <?php endif;?>
            </div>
        <?php endforeach;?>
    <?php endif;?>
    </div>
</div>




</div>





<div class="block6">
<p class="block6p1"><b><?=Yii::t('app', 'Видео')?> </b></p>
    <p class="block6p2"><?=Yii::t('app', 'наших последних работ')?></p>
<div class="owl-carousel owl-theme">
            <video controls width="350" src="/video/video1.mp4"></video>
            <video controls width="350" src="/video/video2.mp4"></video>
            <video controls width="350" src="/video/video3.mp4"></video>
            <video controls width="350" src="/video/video4.mp4"></video>
            <video controls width="350" src="/video/video5.mp4"></video>
    </div>



</div>

<div class="block7">

    <div id="map2" class="mapMobile"></div>
    <div class="kontaktM">
       <div class="kontaktM__p">
        <p class="kontaktMp1"><?=Yii::t('app', 'г. Алматы, мкр. Хан-Тенгри, 65')?></p>
        <p class="kontaktMp1">+7 (727) 226-83-36,<br>+7 (727) 327-50-06</p>
        <p class="kontaktMp1">+7 701 226 83 66</p>
        <a href="/site/consultation"><button class="kontaktbutM"><?=Yii::t('app', 'консультация')?></button></a>
    </div>
    <img src="/img/vekt1.png" class="smartM" alt="">
    <img src="/img/vekt2.png" class="smartM2" alt="">
    <img src="/img/vekt3.png" class="smartM3" alt="">
    </div>
</div>
<footer>
    <img src="/img/maint.png" class="maintM">
</footer>
</div>
</div>
<!--конец мобильная версия-->


   <script>
function viewDiv(){
  document.getElementById("div1").style.display = "block";
    document.getElementById("div2").style.display = "none";
};
function viewDiv2(){
  document.getElementById("div2").style.display = "block";
    document.getElementById("div1").style.display = "none";
};
</script>

<script>
function viewDiv2(){
  document.getElementById("di1").style.display = "block";
    document.getElementById("di2").style.display = "none";
};
function viewDiv(){
  document.getElementById("di2").style.display = "block";
    document.getElementById("di1").style.display = "none";
};
</script>
<script type="text/javascript">
    var map, map2;
    DG.then(function () {
        map = DG.map('map', {
            center: [43.184825,76.968298],
            zoom: 13,
            doubleClickZoom: false,
            boxZoom: false,
            zoomControl: false,
            fullscreenControl: false
        });

        DG.marker([43.170752,76.891736]).addTo(map).bindPopup('мы находимся тут');
        map2 = DG.map('map2', {
            center: [43.170767,76.891792],
            zoom: 11,
            doubleClickZoom: false,
            boxZoom: false,
            zoomControl: false,
            fullscreenControl: false
        });

        DG.marker([43.170752,76.891736]).addTo(map2).bindPopup('мы находимся тут');
    });
</script>
   <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/script.js"></script>


    <script src="/js\page-transition.js"></script>

    <script src="/js/wow.min.js"></script>
    <script>
              new WOW().init();
              </script>
    <script src="/js/fancybox/jquery.fancybox.js"></script>
    <script src="/js/fancybox/jquery.fancybox.min.js"></script>

     <script>
$('.ite').click(function(){
    $(this).addClass('active').siblings().removeClass('active')
})
</script>
   <script src="/js/jquery.slides.min.js"></script>
    <!-- /Demo Color changer Script -->
  </body>
</html>
