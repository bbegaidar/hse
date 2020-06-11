<?php
    use yii\helpers\Html;
?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "icon" type = "img/png" href = "/img1/logo.png">
    <link rel="stylesheet" type="text/css" href="/css1/owl.carousel.css"/>
    <link rel="stylesheet" type="text/css" href="/css1/font.css"/>
    <link rel="stylesheet" type="text/css" href="/css1/responsive.css"/>
    <link rel="stylesheet" type="text/css" href="/css1/style.css"/>
    <script src="//code.jivosite.com/widget/Nj7c1pZni2" async></script>
    <title><?= Html::encode($this->title) ?></title>
</head>
<body class="body">
<main class="main">
    <!-- <img src="/img1/cont.jpg" class = "test"> -->
    <div class="preloader">
        <img id = "loader_img" src="/img1/logo_text2.png"/>
    </div>
    <div class="bg-modal">
        <div class="button-modal-content">
            <form>
                <div class="modal-get-close">X</div>
                <p id = "get_consalt" class = "upper text-center margin-top1em"></p>
                <ul class = "modal-get">
                    <li class = "input-get">
                        <div class="input-title">
                            <p class = "text-left">Имя</p>
                        </div>
                        <input type="text" name="sender-name" placeholder="Имя" class="send-message-name" required="">
                    </li>
                    <li class = "input-get">
                        <div class="input-title">
                            <p class = "text-left">Телефон</p>
                        </div>
                        <input type="text" name="sender-phone" placeholder="Телефон" class="send-phone-number" required="">
                    </li>
                    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                </ul>
                <div class="btn-get-modal">
                    <button class="modal-btn-get submitForm">Отправить</button>
                </div>
            </form>
        </div>
    </div>
    <header class="header">
        <div class="white-img web">
            <img src="/img1/white-block-menu.png"/>
        </div>
        <div class="menu-word-sidebar web">
            МЕНЮ
            <img src="/img1/menu_first.png"/>
        </div>
        <div class="container web">
            <div class="humb_menu flex start">
                <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
                <label for="openSidebarMenu" class="sidebarIconToggle">
                    <div class="spinner diagonal part-1"></div>
                    <div class="spinner horizontal"></div>
                    <div class="spinner diagonal part-2"></div>
                    <span class = "word-close upper">закрыть</span>
                </label>
                <div class="logo">
                    <a href="index"><img src="/img1/logo.png"/></a>
                </div>
            </div>
            <div class="header_right flex end">
                <div class="phone flex">
                    <div class = "phone-img">
                        <img src="/img1/phone/phone.png"/>
                    </div>
                    <div class="numbers">
                        <a class = "num" href="tel:87771499444">+7(777) 149 94 44</a>
                        <a class = "num" href="tel:87018198752">+7(701) 819 87 52</a>
                    </div>
                </div>
                <div class="languages flex">
                    <div class="lang_items <?=Yii::$app->language == 'kk-KZ' ? 'lang_items_active' : '' ?>"><a class = "link_lang" href="/kk<?=Yii::$app->getRequest()->getLangUrl()?>">KZ</a></div>
                    <div class="lang_items <?=Yii::$app->language == 'ru-RU' ? 'lang_items_active' : '' ?>"><a class = "link_lang" href = "/ru<?=Yii::$app->getRequest()->getLangUrl()?>">RU</a></div>
                    <div class="lang_items <?=Yii::$app->language == 'en-EN' ? 'lang_items_active' : '' ?>"><a class = "link_lang" href = "/en<?=Yii::$app->getRequest()->getLangUrl()?>">EN</a></div>
                </div>
                <div class="sign-in-btn">
                    <?php if (!Yii::$app->user->isGuest) { ?>
                        <button onclick="location.href='/account/index'" class ='enter'>
                            <p class = 'sign-in'>Личный кабинет</p>
                        </button>                        
                    <?php } else { ?>
                        <button onclick="location.href='/site/login'" class ='enter'>
                            <p class = 'sign-in'>ВОЙТИ</p>
                        </button>
                    <?php } ?>

                </div>
            </div>
        </div>
        <div class="container_mob mobile">
            <div class="headerWrap_mob mobile_flex">
                <div class="headerWrap_mob_left">            
                    <div class="menu_HSE_mob">
                        <a href="#">
                            <div></div>
                            <div></div>
                            <div></div>
                        </a>
                    </div>
                    <div class="logo_HSE_mob">
                        <img src="/img1/mobile/logo_HSE_mob.png" alt="img">
                    </div>
                </div>
                <div class="phone_mob">
                    
                    <div class="numbers_mob">
                        <p><a class = "num_mob" href="tel:+77771499444">+7(777) 149 94 44</a></p>
                        <?php if (!Yii::$app->user->isGuest) { ?>
                            <a class="hseBtn_normal_mob" style="margin: -1em !important;" href="/account/index">
                                Личный кабинет
                            </a>
                        <?php } else { ?>
                            <a class="hseBtn_normal_mob" href="/site/login">
                                Войти
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="sidebarMenu" class="web">
        <ul class="sidebarMenuInner"> 
            <li class = "main_list"><a class = "menu-title" href="/site1/index">Главная</a></li>
            <li class = "companyHov">
                <a class = "menu-title" href="/site1/about">О компании</a>
                <div class="pop_content left78 flex">
                    <div class="Bekzat"></div>
                    <img src="/img1/arrow-on-menu.png"/>
                    <div class="submenu-items">
                        <ul>
                            <li class = "submenu-colomns"><a class = "sub-sub-menu" href = "/site1/partners">Нам доверяют</a></li>
                            <li class = "submenu-colomns"><a class = "sub-sub-menu" href = "/site1/license">Лицензии и сертификаты</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="serviceHov">
                <p class = "menu-title">услуги</p>
                <div class="pop_content left45 flex">
                    <div class="Bekzat"></div>
                    <img src="/img1/arrow-on-menu.png"/>
                    <div class="submenu-items">
                        <ul>
                            <?php foreach ($services as $service): ?>
                                <li class = "submenu-colomns"><a class = "sub-sub-menu" href = "/site1/services?page=<?=$service->url?>"><?=$service->content->title?></a></li>
                            <?php endforeach; ?>                                                        
                        </ul>
                    </div>
                </div>
            </li>
            <li class = "photoHov">
                <p class = "menu-title">фотогалерея</a>
                <div class="pop_content leftphoto flex">
                    <div class="Bekzat"></div>
                    <img src="/img1/arrow-on-menu.png"/>
                    <div class="submenu-items">
                        <ul>
                            <li class = "submenu-colomns"><a class = "sub-sub-menu" href = "/site1/photo_gallery?page=Workshops">Семинары</a></li>
                            <li class = "submenu-colomns"><a class = "sub-sub-menu" href = "/site1/photo_gallery?page=Courses">Курсы</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class = "schedulleHov">
               <p class = "menu-title">расписание</a>
               <div class="pop_content leftphoto flex">
                    <div class="Bekzat"></div>
                    <img src="/img1/arrow-on-menu.png"/>
                    <div class="submenu-items">
                        <ul>
                            <li class = "submenu-colomns"><a class = "sub-sub-menu" href = "/site1/schedulle?page=Courses">Курсы</a></li>
                            <li class = "submenu-colomns"><a class = "sub-sub-menu" href = "/site1/schedulle?page=Workshops">Семинары</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class = "main_list"><a class = "menu-title" href="/site1/contacts">контакты</a></li>
        </ul>
        <div class="footer-sidebar">
            <img class = "footer_menu_img" src="/img1/menu_second.png"/>
            <div class="flex f-sidebar">
                <div class="logo-sidebar">
                    <img src="/img1/logo_text.png"/>
                </div>
                <div class="phone-number-sidebar">
                    <p class="title-sidebar-footer">Телефон:</p>
                    <div class="number-footer-sidebar flex pad05-footer">
                        <a href="tel:87132557041">+7(7132) 55 70 41;</a>
                        <a href="tel:87771499444">+7(777) 149 94 44</a>
                    </div>
                    <div class="number-footer-sidebar pad05-footer flex">
                        <a href="tel:87132905324">+7(7132) 90 53 24;</a>
                        <a href="tel:87018198752">+7(701) 819 87 52</a>
                    </div>
                </div>
                <div class="phone-number-sidebar">
                    <p class="title-sidebar-footer">Адрес:</p>
                    <div class="number-footer-sidebar">
                        <a href="#">РК, г.Актобе, пр-т А.Молдагуловой,<br> 46/55 БЦ «Capital Plaza» офис 509</a>
                    </div>
                </div>
                <div class="phone-number-sidebar">
                    <p class="title-sidebar-footer">E-mail:</p>
                    <div class="number-footer-sidebar ">
                        <a href="#">hseconsulting@mail.ru</a>
                        <br>
                        <a href="#">manager1@hsecompany.kz</a>
                    </div>
                </div>
                <div class="phone-number-sidebar">
                    <div class = 'social_media-sidebar flex'>
                        <a href="#"><img class = "vk"src="/img1/media/vk.png"/></a>
                        <a href="#"><img class = "instagram" src="/img1/media/instagram.png"/></a>
                        <a href="#"><img class = "facebook" src="/img1/media/facebook.png"/></a>
                    </div>
                    <div class= "logo_maint-footer-sidebar">
                        <a href="#"><img class = "logo-footer-maint" src="/img1/maint.png"/></a>
                    </div>
                </div>
            </div>
            <div class="footer_line"></div>
        </div>
    </div>
    <div class="menuWrap__bg"></div>
    <div class="menuWrap_mob mobile">       
        <div class="menuWrap__header_mob">
            <div class="menuWrap__header__closeBtn_mob">
                <img src="/img1/mobile/closeMenuImg_mob.png" alt="img">
                <p>Закрыть</p>
            </div>
            <div class="menuWrap__header__logo_mob">
                <a href="index"><img src="/img1/mobile/menuLogo_mob.png" alt="img"></a>
            </div>
        </div>
        <div class="menuWrap__content_mob">
            <div>
                <div class="menuWrap__item_mob">
            <a class="hseMenuItem_mob" href="/site1/index"> 
                <img class="hseMenuItem__img_mob" src="/img1/mobile/menuItem__mainPageImg.png" alt="img">
                <span class="hseMenuItem__title_mob">Главная</span>
            </a>
        </div>
        <div class="menuWrap__item_mob menuWrap__itemServices_mob">
            <a class="hseMenuItem_mob hseMenu__servicesListBtn_mob" href="#"> 
                <img class="hseMenuItem__img_mob" src="/img1/mobile/menuItem__servicesImg.png" alt="img">
                <span class="hseMenuItem__title_mob">Услуги</span>                
            </a>
            
            <img class="hse__menuItemServices__row" src="/img1/mobile/hse__menuItemServices__row.png" alt="img">
            <div class="menuWrap__item_mob hseMenu__servicesList_mob">
                <?php foreach ($services as $service): ?>
                    <a class="menuWrap__itemServicesListTitle_mob" href="/site1/services?page=<?=$service->url?>">
                        <img class="menuWrap__itemServicesListTitleMinus_mob" src="/img1/mobile/menuWrap__itemServicesListTitleMinus_mob.png" alt="img">
                        <?=$service->content->title?>
                    </a>
                <?php endforeach; ?>                
            </div>
                <div class="menuWrap__item_mob">
                    <a class="hseMenuItem_mob" href="/site1/about"> 
                        <img class="hseMenuItem__img_mob" src="/img1/mobile/menuItem__aboutPageImg_mob.png" alt="img">
                        <span class="hseMenuItem__title_mob">О компании</span>
                    </a>
                </div>
                <div class="menuWrap__item_mob">
                    <a class="hseMenuItem_mob" href="/site1/photo_gallery"> 
                        <img class="hseMenuItem__img_mob" src="/img1/mobile/menuItem__photoGalleryPageImg.png" alt="img">
                        <span class="hseMenuItem__title_mob">Фотогалерея</span>
                    </a>
                </div>
                <div class="menuWrap__item_mob">
                    <a class="hseMenuItem_mob" href="/site1/schedulle"> 
                        <img class="hseMenuItem__img_mob" src="/img1/mobile/menuItem__schedullePageImg_mob.png" alt="img">
                        <span class="hseMenuItem__title_mob">Расписание</span>
                    </a>
                </div>
                <div class="menuWrap__item_mob">
                    <a class="hseMenuItem_mob" href="/site1/contacts"> 
                        <img class="hseMenuItem__img_mob" src="/img1/mobile/menuItem__contactsImg.png" alt="img">
                        <span class="hseMenuItem__title_mob">Контакты</span>
                    </a>
                </div>
            </div>
            <div class="languages flex">
                <div class="lang_items <?=Yii::$app->language == 'kk-KZ' ? 'lang_items_active' : '' ?>" style="border: 1px solid white;"><a class="link_lang" href="/kk<?=Yii::$app->getRequest()->getLangUrl()?>" style="color: white;">KZ</a></div>
                <div class="lang_items <?=Yii::$app->language == 'ru-RU' ? 'lang_items_active' : '' ?>" style="border: 1px solid white;"><a class="link_lang" href="/ru<?=Yii::$app->getRequest()->getLangUrl()?>" style="color: white;">RU</a></div>
                <div class="lang_items <?=Yii::$app->language == 'en-EN' ? 'lang_items_active' : '' ?>" style="border: 1px solid white;"><a class="link_lang" href="/en<?=Yii::$app->getRequest()->getLangUrl()?>" style="color: white;">EN</a></div>
            </div>
        </div>    
        
    </div>
    </div> 
   
    