<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "icon" type = "img/png" href = "/img1/logo.png">
    <!-- <link rel="stylesheet" type="text/css" href="/css1/owl.carousel.css"/> -->
    <link rel="stylesheet" type="text/css" href="/css1/font.css"/>
    <link rel="stylesheet" type="text/css" href="/css1/responsive.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="/css1/style.css"/> -->
    <link rel="stylesheet" type="text/css" href="/css1/header.css"/>
    <title>HSE</title>
</head>
<body class="body">
<main class="main" data="new-style">
    <img src="cont.jpg" class = "test" data="new-style">
    <div class="preloader" data="new-style">
        <img id = "loader_img" src="/img1/logo_text2.png" data="new-style"/>
    </div>
    <div class="bg-modal" data="new-style">
        <div class="button-modal-content" data="new-style">
            <div class="modal-get-close" data="new-style">X</div>
            <p id = "get_consalt" class = "upper text-center margin-top1em" data="new-style"></p>
            <ul class = "modal-get" data="new-style">
                <li class = "input-get" data="new-style">
                    <div class="input-title" data="new-style">
                        <p class = "text-left" data="new-style">Имя</p>
                    </div>
                    <input type="text" name="sender-name" class="send-message-name" required="" data="new-style">
                </li>
                <li class = "input-get" data="new-style">
                    <div class="input-title" data="new-style">
                        <p class = "text-left" data="new-style">Телефон</p>
                    </div>
                    <input type="text" name="sender-phone" class="send-phone-number" data="new-style" required="">
                </li>
            </ul>
            <div class="btn-get-modal" data="new-style">
                <button class="modal-btn-get" data="new-style">Отправить</button>
            </div>
        </div>
    </div>
    <header class="header" data="new-style">
        <div class="white-img web" data="new-style">
            <img src="/img1/white-block-menu.png"/>
        </div>
        <div class="menu-word-sidebar web" data="new-style">
            МЕНЮ
            <img src="/img1/menu_first.png" data="new-style"/>
        </div>
        <div class="container web" data="new-style">
            <div class="humb_menu flex start" data="new-style">
                <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu" data="new-style">
                <label for="openSidebarMenu" class="sidebarIconToggle" data="new-style">
                    <div class="spinner diagonal part-1" data="new-style"></div>
                    <div class="spinner horizontal" data="new-style"></div>
                    <div class="spinner diagonal part-2" data="new-style"></div>
                    <span class = "word-close upper" data="new-style">закрыть</span>
                </label>
                <div class="logo" data="new-style">
                    <a href="../site1/index"><img src="/img1/logo.png"/></a>
                </div>
            </div>
            <div class="header_right flex end" data="new-style">
                <div class="phone flex" data="new-style">
                    <div class = "phone-img" data="new-style">
                        <img src="/img1/phone/phone.png"/>
                    </div>
                    <div class="numbers" data="new-style">
                        <a class = "num" data="new-style" href="tel:87771499444">+7(777) 149 94 44</a>
                        <a class = "num" data="new-style" href="tel:87018198752">+7(701) 819 87 52</a>
                    </div>
                </div>
                <div class="languages flex" data="new-style">
                    <div class="lang_items" data="new-style"><a class = "link_lang"href="#">KZ</a></div>
                    <div class="lang_items lang_items_active" data="new-style"><a class = "link_lang" href = "#">RU</a></div>
                    <div class="lang_items" data="new-style"><a class = "link_lang" href = "#">EN</a></div>
                </div>
                <div class="sign-in-btn" data="new-style">
                    <button onclick="location.href='/site/logout'" class ='enter' data="new-style">
                        <p class = 'sign-in' data="new-style">ВЫЙТИ</p>
                    </button>
                </div>
            </div>
        </div>
        <div class="container_mob mobile" data="new-style">
            <div class="headerWrap_mob mobile_flex" data="new-style">
                <div class="headerWrap_mob_left" data="new-style">            
                    <div class="menu_HSE_mob" data="new-style">
                        <a href="#">
                            <div></div>
                            <div></div>
                            <div></div>
                        </a>
                    </div>
                    <div class="logo_HSE_mob" data="new-style">
                        <img src="/img1/mobile/logo_HSE_mob.png" alt="img">
                    </div>
                </div>
                <div class="phone_mob" data="new-style">
                    <!-- <div class = "phone_img_mob">
                        <img src="/img1/mobile/phone.png"/>
                    </div> -->
                    <div class="numbers_mob" data="new-style">
                        <p><a class = "num_mob" data="new-style" href="tel:+77771499444">+7(777) 149 94 44</a></p>
                        <a class="hseBtn_normal_mob" data="new-style" href="../site/login">
                            Войти
                        </a>
                        <!-- <p><a class = "num_mob" href="tel:+77018198752">+7(701) 819 87 52</a></p> -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="sidebarMenu" class="web" data="new-style">
        <ul class="sidebarMenuInner" data="new-style"> 
            <li class = "main_list" data="new-style"><a class = "menu-title" data="new-style" href="../site1/index">Главная</a></li>
            <li class = "companyHov" data="new-style">
                <a class = "menu-title" data="new-style" href="../site1/about">О компании</a>
                <div class="pop_content left78" data="new-style">
                    <img src="/img1/arrow-on-menu.png"/>
                    <div class="submenu-items" data="new-style">
                        <ul>
                            <li class = "submenu-colomns" data="new-style"><a class = "sub-sub-menu" data="new-style" href = "../site1/partners">Нам доверяют</a></li>
                            <li class = "submenu-colomns" data="new-style"><a class = "sub-sub-menu" data="new-style" href = "../site1/license">Лицензии и сертификаты</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="serviceHov" data="new-style">
                <p class = "menu-title" data="new-style">услуги</p>
                <div class="pop_content left45" data="new-style">
                    <img src="/img1/arrow-on-menu.png"/>
                    <div class="submenu-items" data="new-style">
                        <ul>
                            <li class = "submenu-colomns" data="new-style"><a class = "sub-sub-menu" data="new-style" href = "../site1/delivery">Валидация и верификация</a></li>
                            <li class = "submenu-colomns" data="new-style"><a class = "sub-sub-menu" data="new-style" href = "../site1/delivery">Повышение квалификации</a></li>
                            <li class = "submenu-colomns" data="new-style"><a class = "sub-sub-menu" data="new-style" href = "../site1/delivery">Онлайн обучение</a></li>
                            <li class = "submenu-colomns" data="new-style"><a class = "sub-sub-menu" data="new-style" href = "../site1/delivery">Экспертиза промышленной безопасности</a></li>
                            <li class = "submenu-colomns" data="new-style"><a class = "sub-sub-menu" data="new-style" href = "../site1/delivery">Аттестация строителей</a></li>
                            <li class = "submenu-colomns" data="new-style"><a class = "sub-sub-menu" data="new-style" href = "../site1/delivery">Видео обучение</a></li>
                            <li class = "submenu-colomns" data="new-style"><a class = "sub-sub-menu" data="new-style" href = "../site1/delivery">Проектирование</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class = "photoHov" data="new-style">
                <p class = "menu-title" data="new-style">фотогалерея</a>
                <div class="pop_content leftphoto" data="new-style">
                    <img src="/img1/arrow-on-menu.png"/>
                    <div class="submenu-items" data="new-style">
                        <ul>
                            <li class = "submenu-colomns" data="new-style"><a class = "sub-sub-menu" data="new-style" href = "../site1/photo_gallery">Семинары</a></li>
                            <li class = "submenu-colomns" data="new-style"><a class = "sub-sub-menu" data="new-style" href = "../site1/photo_gallery">Курсы</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class = "schedulleHov" data="new-style">
               <p class = "menu-title" data="new-style">расписание</a>
               <div class="pop_content leftphoto" data="new-style">
                    <img src="/img1/arrow-on-menu.png"/>
                    <div class="submenu-items" data="new-style">
                        <ul>
                            <li class = "submenu-colomns" data="new-style"><a class = "sub-sub-menu" data="new-style" href = "../site1/schedulle">Курсы</a></li>
                            <li class = "submenu-colomns" data="new-style"><a class = "sub-sub-menu" data="new-style" href = "../site1/schedulle">Семинары</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class = "main_list" data="new-style"><a class = "menu-title" data="new-style" href="../site1/contacts">контакты</a></li>
        </ul>
        <div class="footer-sidebar" data="new-style">
            <img class = "footer_menu_img" data="new-style" src="/img1/menu_second.png"/>
            <div class="flex f-sidebar" data="new-style">
                <div class="logo-sidebar" data="new-style">
                    <img src="/img1/logo_text.png"/>
                </div>
                <div class="phone-number-sidebar" data="new-style">
                    <p class="title-sidebar-footer" data="new-style">Телефон:</p>
                    <div class="number-footer-sidebar flex pad05-footer" data="new-style">
                        <a href="tel:87132557041">+7(7132) 55 70 41;</a>
                        <a href="tel:87771499444">+7(777) 149 94 44</a>
                    </div>
                    <div class="number-footer-sidebar pad05-footer flex" data="new-style">
                        <a href="tel:87132905324">+7(7132) 90 53 24;</a>
                        <a href="tel:87018198752">+7(701) 819 87 52</a>
                    </div>
                </div>
                <div class="phone-number-sidebar" data="new-style">
                    <p class="title-sidebar-footer" data="new-style">Адрес:</p>
                    <div class="number-footer-sidebar" data="new-style">
                        <a href="#">РК, г.Актобе, пр-т А.Молдагуловой,<br> 46/55 БЦ «Capital Plaza» офис 509</a>
                    </div>
                </div>
                <div class="phone-number-sidebar" data="new-style">
                    <p class="title-sidebar-footer" data="new-style">E-mail:</p>
                    <div class="number-footer-sidebar " data="new-style">
                        <a href="#">hseconsulting@mail.ru</a>
                        <br>
                        <a href="#">manager1@hsecompany.kz</a>
                    </div>
                </div>
                <div class="phone-number-sidebar" data="new-style">
                    <div class = 'social_media-sidebar flex' data="new-style">
                        <a href="#"><img class = "vk" data="new-style" src="/img1/media/vk.png"/></a>
                        <a href="#"><img class = "instagram" data="new-style" src="/img1/media/instagram.png"/></a>
                        <a href="#"><img class = "facebook" data="new-style" src="/img1/media/facebook.png"/></a>
                    </div>
                    <div class= "logo_maint-footer-sidebar" data="new-style">
                        <a href="#"><img class = "logo-footer-maint" data="new-style" src="/img1/maint.png"/></a>
                    </div>
                </div>
            </div>
            <div class="footer_line" data="new-style"></div>
        </div>
    </div>
    <div class="menuWrap__bg" data="new-style"></div>
    <div class="menuWrap_mob mobile" data="new-style">       
        <div class="menuWrap__header_mob" data="new-style">
            <div class="menuWrap__header__closeBtn_mob" data="new-style">
                <img src="/img1/mobile/closeMenuImg_mob.png" alt="img">
                <p>Закрыть</p>
            </div>
            <div class="menuWrap__header__logo_mob" data="new-style">
                <a href="../site1/index"><img src="/img1/mobile/menuLogo_mob.png" alt="img"></a>
            </div>
        </div>
        <div class="menuWrap__item_mob" data="new-style">
            <a class="hseMenuItem_mob" data="new-style" href="../site1/index"> 
                <img class="hseMenuItem__img_mob" data="new-style" src="/img1/mobile/menuItem__mainPageImg.png" alt="img">
                <span class="hseMenuItem__title_mob" data="new-style" >Главная</span>
            </a>
        </div>
        <div class="menuWrap__item_mob" data="new-style">
            <a class="hseMenuItem_mob" data="new-style" href="../site1/delivery"> 
                <img class="hseMenuItem__img_mob" data="new-style" src="/img1/mobile/menuItem__servicesImg.png" alt="img">
                <span class="hseMenuItem__title_mob" data="new-style">Услуги</span>
            </a>
        </div>
        <div class="menuWrap__item_mob" data="new-style">
            <a class="hseMenuItem_mob" data="new-style" href="../site1/about"> 
                <img class="hseMenuItem__img_mob" data="new-style" src="/img1/mobile/menuItem__aboutPageImg_mob.png" alt="img">
                <span class="hseMenuItem__title_mob" data="new-style">О компании</span>
            </a>
        </div>
        <div class="menuWrap__item_mob" data="new-style">
            <a class="hseMenuItem_mob" data="new-style" href="../site1/photo_gallery"> 
                <img class="hseMenuItem__img_mob" data="new-style" src="/img1/mobile/menuItem__photoGalleryPageImg.png" alt="img">
                <span class="hseMenuItem__title_mob" data="new-style">Фотогалерея</span>
            </a>
        </div>
        <div class="menuWrap__item_mob" data="new-style">
            <a class="hseMenuItem_mob" data="new-style" href="../site1/schedulle"> 
                <img class="hseMenuItem__img_mob" data="new-style" src="/img1/mobile/menuItem__schedullePageImg_mob.png" alt="img">
                <span class="hseMenuItem__title_mob" data="new-style" >Расписание</span>
            </a>
        </div>
        <div class="menuWrap__item_mob" data="new-style">
            <a class="hseMenuItem_mob" data="new-style" href="../site1/contacts"> 
                <img class="hseMenuItem__img_mob" data="new-style" src="/img1/mobile/menuItem__contactsImg.png" alt="img">
                <span class="hseMenuItem__title_mob" data="new-style">Контакты</span>
            </a>
        </div>     
        
    </div>
    

<?php

$script = <<< JS


    $('.item .services').hover(function(){
      $('.item').find('.list-services').removeClass('d-none opacity0');
    }, function(){
    });

    $('.item').not('.item-services').hover(function(){
      $('.item').find('.list-services').addClass('d-none opacity0');
    }, function(){
    });

    if($(window).width() < 1049){
        $('.item').on('click', '.services', function(){
            $('.item').find('.list-services').removeClass('opacity0 d-none').css('color','red');
        }
      );

      $('.item').not('.item-services').on('click', '#menu', function(){
            $('.item').find('.list-services').addClass('opacity0 d-none').css('color','red');
        }
      );

    }

    $('body').on('click', '#open-menu', function () {
        $('#menu').removeAttr('style').removeClass('slideOutUp opacity0').addClass('slideInDown');
        $('body').attr('data-animation', 'none');
    });

    $('body').on('click', '#close-menu', function () {
        $('#menu').removeClass('slideInDown').addClass('slideOutUp opacity0 ');
    });

    $('#menu .item').hover(function () {
            $(this).children('.ray-wrap-hover').css('opacity', 1);
        },
        function () {
        $(this).children('.ray-wrap-hover').css('opacity', 0);
    });

JS;

$this->registerJs($script, yii\web\View::POS_READY);

    