<?php $this->title = 'Контакты'; ?>
<?php include "header.php"; ?>
<section class="contacts-page1 web">
    <div class="title-contacts container">
        <p class = "upper">контакты</p>
    </div>
</section>
<section class="contacts-page2 web">
    <div class="arrow-right-contacts">
        <img src="/img1/delivery/arrow-right.png"/>
    </div>
    <div class="arrow-left-contacts">
        <img src="/img1/delivery/arrow-left.png"/>
    </div>
    <div class="gorod_name">
        Актобе
    </div>
    <div id = "carousel4" class="container team flex owl-carousel">
        <?php foreach ($teams as $team): ?>
            <div class="worker item">
                <div class="img_and_position">
                    <img class = "men" src="/<?=$team->photo?>"/>
                    <p class = "worker-name"><?=$team->content->name?></p>
                    <p class = "position-worker"><?=$team->content->description?></p>
                </div>
                <div class="workers-contacts">
                    <div class="contacts-items flex">
                        <img class = "w09em" src="/img1/contacts/email-block1.png"/>
                        <p><?=$team->email?></p>
                    </div>
                    <div class="contacts-items flex">
                        <img class = "he1em" src="/img1/contacts/phone-block1.png"/>
                        <p><?=$team->phone?></p>
                    </div>
                    <div class="contacts-items flex">
                        <img class = "he13em"src="/img1/contacts/iPhone-block1.png"/>
                        <p><?=$team->mob_phone?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- <div class="worker item">
            <div class="img_and_position">
                <img class = "men" src="/img1/men-contacts.png"/>
                <p class = "worker-name">Артыкбаев Айбек</p>
                <p class = "position-worker">Помощник заместителя генерального директора.</p>
            </div>
            <div class="workers-contacts">
                <div class="contacts-items flex">
                    <img class = "w09em" src="/img1/contacts/email-block1.png"/>
                    <p>Alibek_hse@mail.ru</p>
                </div>
                <div class="contacts-items flex">
                    <img class = "he1em" src="/img1/contacts/phone-block1.png"/>
                    <p>+77132 9053 24; +7727 354 33 74</p>
                </div>
                <div class="contacts-items flex">
                    <img class = "he13em"src="/img1/contacts/iPhone-block1.png"/>
                    <p>+7 777 760 08 04</p>
                </div>
            </div>
        </div>
        <div class="worker item">
            <div class="img_and_position">
                <img class = "men" src="/img1/men-contacts.png"/>
                <p class = "worker-name">Артыкбаев Айбек</p>
                <p class = "position-worker">Помощник заместителя генерального директора.</p>
            </div>
            <div class="workers-contacts">
                <div class="contacts-items flex">
                    <img class = "w09em" src="/img1/contacts/email-block1.png"/>
                    <p>Alibek_hse@mail.ru</p>
                </div>
                <div class="contacts-items flex">
                    <img class = "he1em" src="/img1/contacts/phone-block1.png"/>
                    <p>+77132 9053 24; +7727 354 33 74</p>
                </div>
                <div class="contacts-items flex">
                    <img class = "he13em"src="/img1/contacts/iPhone-block1.png"/>
                    <p>+7 777 760 08 04</p>
                </div>
            </div>
        </div>
        <div class="worker item">
            <div class="img_and_position">
                <img class = "men" src="/img1/men-contacts.png"/>
                <p class = "worker-name">Артыкбаев Айбек</p>
                <p class = "position-worker">Помощник заместителя генерального директора.</p>
            </div>
            <div class="workers-contacts">
                <div class="contacts-items flex">
                    <img class = "w09em" src="/img1/contacts/email-block1.png"/>
                    <p>Alibek_hse@mail.ru</p>
                </div>
                <div class="contacts-items flex">
                    <img class = "he1em" src="/img1/contacts/phone-block1.png"/>
                    <p>+77132 9053 24; +7727 354 33 74</p>
                </div>
                <div class="contacts-items flex">
                    <img class = "he13em"src="/img1/contacts/iPhone-block1.png"/>
                    <p>+7 777 760 08 04</p>
                </div>
            </div>
        </div> -->
    </div>
    <div class="gorod_name">
        Алматы
    </div>
    <div class="container team flex owl-carousel">
        <?php foreach ($teams as $team): ?>
            <div class="worker item">
                <div class="img_and_position">
                    <img class = "men" src="/<?=$team->photo?>"/>
                    <p class = "worker-name"><?=$team->content->name?></p>
                    <p class = "position-worker"><?=$team->content->description?></p>
                </div>
                <div class="workers-contacts">
                    <div class="contacts-items flex">
                        <img class = "w09em" src="/img1/contacts/email-block1.png"/>
                        <p><?=$team->email?></p>
                    </div>
                    <div class="contacts-items flex">
                        <img class = "he1em" src="/img1/contacts/phone-block1.png"/>
                        <p><?=$team->phone?></p>
                    </div>
                    <div class="contacts-items flex">
                        <img class = "he13em"src="/img1/contacts/iPhone-block1.png"/>
                        <p><?=$team->mob_phone?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<section class="contacts-page3 web">
    <div class="container map">
        <div class="aktobe-city">
            <iframe class = "aktobe" src="https://yandex.ru/map-widget/v1/?um=constructor%3Aa43d0fd28393f800cbf6e7a4196625c9dd06852ed3777515be06f26c97ff81b9&amp;source=constructor" width="895" height="411" frameborder="0"></iframe>
        </div>
        <div class="almaty-city">
        <iframe class = "almaty" src="https://yandex.ru/map-widget/v1/?um=constructor%3A63b800b1000e5da1bebc973ab387f00833a7221c4406ad68fdeb6eadaeda7879&amp;source=constructor" width="895" height="411" frameborder="0"></iframe>
        </div>

            <div class="blue_block">
                <div class="contacts-items-map flex top">
                    <div class="img-cont">
                        <img src="/img1/contacts/phone-on-map.png"/>
                    </div>
                    <div class="tel-num-map">
                        <a href ="tel:87132557041">+7(7132)55 70 41</a><br>
                        <a href = "tel:87132905324"> +7(7132)90 53 24</a>
                    </div>
                </div>
                <div class="contacts-items-map flex">
                    <div class="img-cont">
                        <img src="/img1/contacts/iPhone-on-map.png"/>
                    </div>
                    <div class="tel-num-map">
                        <a href="tel:87771499444">+7(777)149 94 44</a><br>
                        <a href="tel:87018198752">+7(701)819 87 52</a>
                    </div>
                </div>
                <div class="contacts-items-map flex">
                    <div class="img-cont">
                        <img src="/img1/contacts/icon-on-map.png"/>
                    </div>
                    <div class="tel-num-map">
                        <a id = "aktobe-href" href="#">РК, г.Актобе пр-т,А.Молдагуловой <br> 46/55 БЦ "Capital Plaza"офис 509</a>
                    </div>
                </div>
                <div class="contacts-items-map flex">
                    <div class="img-cont">
                        <img src="/img1/contacts/icon-on-map.png"/>
                    </div>
                    <div class="tel-num-map">
                        <a id = "almaty-href" href="#">РК, г.Алматы пр-т,Достык 210 <br>БЦ Коктем Гранд,блок 2 офис 28</a>
                    </div>
                </div>
                <button class = "get_btn enter left4em" data-id = "ЗАКАЗАТЬ ЗВАНОК">ЗАКАЗАТЬ ЗВОНОК</button>
            </div>
    </div>
</section>

<section id ="#contactsPage_mob" class="mobile">
    <div class="pageTitle_mob">
        <div class="container_mob">
            <p class="pageTitle_text_mob">Контакты</p>
        </div>
    </div>
    <div class="container_mob">
        <div id="HSE_Slider_mob" class="HSE_Slider_mob owl-carousel">
                <?php $count=1; foreach ($teams as $team): ?>
                    <?php if ($count%2 != 0): ?>
                        <div class="contactsSlider_item_mob">
                    <?php endif; ?>
                    <div class="contactsSlider__item__person_mob">
                        <div class="contactsSlider__item__person__photo_mob">
                            <img src="/<?=$team->photo?>" alt="img">
                        </div>
                        <div class="contactsSlider__item__person__name_mob">
                            <p><?=$team->content->name?></p>
                        </div>
                        <div class="contactsSlider__item__person__position_mob">
                            <p><?=$team->content->description?></p>
                        </div>
                        <div class="contactsSlider__item__line_mob"></div>
                        <div class="contactsSlider__item__person__email_mob">
                            <a href="#"><img src="/img1/mobile/contactsSlider__item__person__email_mob.png" alt="img"><?=$team->email?></a>
                        </div>
                        <div class="contactsSlider__item__person__phone_mob">
                            <a href="#"><img src="/img1/mobile/contactsSlider__item__person__phone_mob.png" alt="img"><?=$team->phone?></a>
                        </div>
                        <div class="contactsSlider__item__person__mobilePhone_mob">
                            <a href="#"><img src="/img1/mobile/contactsSlider__item__person__mobilePhone_mob.png" alt="img"><?=$team->mob_phone?></a>
                        </div>
                    </div>
                    <!-- <div class="contactsSlider__item__person_mob">
                        <div class="contactsSlider__item__person__photo_mob">
                            <img src="/img1/mobile/contactsPhoto_mob.png" alt="img">
                        </div>
                        <div class="contactsSlider__item__person__name_mob">
                            <p>Артыкбаев Айбек</p>
                        </div>
                        <div class="contactsSlider__item__person__position_mob">
                            <p>Помощник заместителя генерального директора</p>
                        </div>
                        <div class="contactsSlider__item__line_mob"></div>
                        <div class="contactsSlider__item__person__email_mob">
                            <a href="#"><img src="/img1/mobile/contactsSlider__item__person__email_mob.png" alt="img">Aibek_hse@mail.ru</a>
                        </div>
                        <div class="contactsSlider__item__person__phone_mob">
                            <a href="#"><img src="/img1/mobile/contactsSlider__item__person__phone_mob.png" alt="img">+7 7132 90 53 24; +7 727 354 33 74</a>
                        </div>
                        <div class="contactsSlider__item__person__mobilePhone_mob">
                            <a href="#"><img src="/img1/mobile/contactsSlider__item__person__mobilePhone_mob.png" alt="img">+7 777 760 08 04</a>
                        </div>
                    </div>   -->
                    <?php if ($count%2 == 0): ?>
                        </div>
                    <?php endif; ?>
                <?php $count++; endforeach; ?>
            <!-- <div class="contactsSlider_item_mob">
                <div class="contactsSlider__item__person_mob">
                    <div class="contactsSlider__item__person__photo_mob">
                        <img src="/img1/mobile/contactsPhoto_mob.png" alt="img">
                    </div>
                    <div class="contactsSlider__item__person__name_mob">
                        <p>Артыкбаев Айбек</p>
                    </div>
                    <div class="contactsSlider__item__person__position_mob">
                        <p>Помощник заместителя генерального директора</p>
                    </div>
                    <div class="contactsSlider__item__line_mob"></div>
                    <div class="contactsSlider__item__person__email_mob">
                        <a href="#"><img src="/img1/mobile/contactsSlider__item__person__email_mob.png" alt="img">Aibek_hse@mail.ru</a>
                    </div>
                    <div class="contactsSlider__item__person__phone_mob">
                        <a href="#"><img src="/img1/mobile/contactsSlider__item__person__phone_mob.png" alt="img">+7 7132 90 53 24; +7 727 354 33 74</a>
                    </div>
                    <div class="contactsSlider__item__person__mobilePhone_mob">
                        <a href="#"><img src="/img1/mobile/contactsSlider__item__person__mobilePhone_mob.png" alt="img">+7 777 760 08 04</a>
                    </div>
                </div>
                <div class="contactsSlider__item__person_mob">
                    <div class="contactsSlider__item__person__photo_mob">
                        <img src="/img1/mobile/contactsPhoto_mob.png" alt="img">
                    </div>
                    <div class="contactsSlider__item__person__name_mob">
                        <p>Артыкбаев Айбек</p>
                    </div>
                    <div class="contactsSlider__item__person__position_mob">
                        <p>Помощник заместителя генерального директора</p>
                    </div>
                    <div class="contactsSlider__item__line_mob"></div>
                    <div class="contactsSlider__item__person__email_mob">
                        <a href="#"><img src="/img1/mobile/contactsSlider__item__person__email_mob.png" alt="img">Aibek_hse@mail.ru</a>
                    </div>
                    <div class="contactsSlider__item__person__phone_mob">
                        <a href="#"><img src="/img1/mobile/contactsSlider__item__person__phone_mob.png" alt="img">+7 7132 90 53 24; +7 727 354 33 74</a>
                    </div>
                    <div class="contactsSlider__item__person__mobilePhone_mob">
                        <a href="#"><img src="/img1/mobile/contactsSlider__item__person__mobilePhone_mob.png" alt="img">+7 777 760 08 04</a>
                    </div>
                </div>
            </div> -->
            <!-- <div class="contactsSlider_item_mob">
                <div class="contactsSlider__item__person_mob">
                    <div class="contactsSlider__item__person__photo_mob">
                        <img src="/img1/mobile/contactsPhoto_mob.png" alt="img">
                    </div>
                    <div class="contactsSlider__item__person__name_mob">
                        <p>Артыкбаев Айбек</p>
                    </div>
                    <div class="contactsSlider__item__person__position_mob">
                        <p>Помощник заместителя генерального директора</p>
                    </div>
                    <div class="contactsSlider__item__line_mob"></div>
                    <div class="contactsSlider__item__person__email_mob">
                        <a href="#"><img src="/img1/mobile/contactsSlider__item__person__email_mob.png" alt="img">Aibek_hse@mail.ru</a>
                    </div>
                    <div class="contactsSlider__item__person__phone_mob">
                        <a href="#"><img src="/img1/mobile/contactsSlider__item__person__phone_mob.png" alt="img">+7 7132 90 53 24; +7 727 354 33 74</a>
                    </div>
                    <div class="contactsSlider__item__person__mobilePhone_mob">
                        <a href="#"><img src="/img1/mobile/contactsSlider__item__person__mobilePhone_mob.png" alt="img">+7 777 760 08 04</a>
                    </div>
                </div>
                <div class="contactsSlider__item__person_mob">
                    <div class="contactsSlider__item__person__photo_mob">
                        <img src="/img1/mobile/contactsPhoto_mob.png" alt="img">
                    </div>
                    <div class="contactsSlider__item__person__name_mob">
                        <p>Артыкбаев Айбек</p>
                    </div>
                    <div class="contactsSlider__item__person__position_mob">
                        <p>Помощник заместителя генерального директора</p>
                    </div>
                    <div class="contactsSlider__item__line_mob"></div>
                    <div class="contactsSlider__item__person__email_mob">
                        <a href="#"><img src="/img1/mobile/contactsSlider__item__person__email_mob.png" alt="img">Aibek_hse@mail.ru</a>
                    </div>
                    <div class="contactsSlider__item__person__phone_mob">
                        <a href="#"><img src="/img1/mobile/contactsSlider__item__person__phone_mob.png" alt="img">+7 7132 90 53 24; +7 727 354 33 74</a>
                    </div>
                    <div class="contactsSlider__item__person__mobilePhone_mob">
                        <a href="#"><img src="/img1/mobile/contactsSlider__item__person__mobilePhone_mob.png" alt="img">+7 777 760 08 04</a>
                    </div>
                </div>
            </div> -->

        </div>
        <div class="licenseSliderNav_mob">
            <button class="HSE_Slider_mob_owl_control prev"><img class="slider_nav slider_nav_left_main" src="..//img1/slider_nav_left_main.png" alt="img"></button>
            <button class="HSE_Slider_mob_owl_control next"><img class="slider_nav slider_nav_right_main" src="..//img1/slider_nav_right_main.png" alt="img"></button>
        </div>

        <div class="contactsPage__map_mob">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2906.961057195145!2d76.95786056576152!3d43.23127612913797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x30cc361a848fcb6b!2z0JHQpiDQmtC-0LrRgtC10Lwg0JPRgNCw0L3QtA!5e0!3m2!1sru!2skz!4v1580679204830!5m2!1sru!2skz" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
        <div class="contactsData_mob">
            <div class ="contactsData__item_mob">
                <a href="tel:87132905324"><img src="/img1/mobile/contactsData__phoneImg_mob.png" alt="img">+7 (7132) 55 70 41 <br> +7 (7132) 90 53 24</a>
            </div>
            <div class ="contactsData__item_mob">
                <a href="tel:87771499444"><img src="/img1/mobile/contactsData__phoneMobileImg_mob.png" alt="img">+7 (777) 149 94 44 <br> +7 (701) 819 87 52</a>
            </div>
            <div class ="contactsData__item_mob">
                <a href="#"><img src="/img1/mobile/contactsData__geoImg_mob.png" alt="img">РК, г.Актобе, пр-т А.Молдагуловой, 46/55 БЦ «Capital Plaza» офис 509</a>
            </div>
            <div class ="contactsData__item_mob">
                <a href="#"><img src="/img1/mobile/contactsData__geoImg_mob.png" alt="img">РК, г Алматы пр-т Достык 210 БЦ Коктем Гранд, блок 2 офис 28</a>
            </div>

            <div class="contactsData__socialBlock_mob">
                <a href="#">
                    <img src="/img1/mobile/contactsData__VK_mob.png" alt="img">
                </a>
                <a href="#">
                    <img src="/img1/mobile/contactsData__instagramm_mob.png" alt="img">
                </a>
                <a href="#">
                    <img src="/img1/mobile/contactsData__facebook_mob.png" alt="img">
                </a>
            </div>

            <a class="get_btn contactsPage__btn_mob hseBtn_normal_mob" href="#">
                Заказать звонок
            </a>
        </div>
    </div>
</section>
<?php include "footer.php"; ?>
