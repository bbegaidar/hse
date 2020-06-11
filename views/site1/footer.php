        <footer class="footer">
            <div class="container footer-page flex web">
                <div class="logo_footer">
                    <a href = "index"><img src="/img1/logo_text2.png"/></a>
                </div>
                <div class="map_of_site">
                    <p class = "blue_words">Карта сайта</p>
                    <ul>
                        <li class = "menu-items"><a href = "index">Главная</a></li>
                        <li class = "menu-items"><a href = "about">О компании</a></li>
                        <li class = "menu-items"><a href = "schedulle">Расписание</a></li>
                        <li class = "menu-items"><a href = "photo_gallery">Фотогалерея</a></li>
                        <li class = "menu-items"><a href = "contacts">Контакты</a></li>
                    </ul>
                </div>
                <div class="services">
                    <p class = "blue_words">Услуги</p>
                    <ul>
                        <?php foreach ($services as $service): ?>
                            <li class = "menu-items"><a href="/site1/services?page=<?=$service->url?>"><?=$service->content->title?></a></li>
                        <?php endforeach; ?>                        
                        <!-- <li class = "menu-items"><a href="delivery">Повышения квалификации</a></li>
                        <li class = "menu-items"><a href="delivery">Онлайн обучение</a></li>
                        <li class = "menu-items"><a href="delivery">Экспертиза промышленной безопастности</a></li>
                        <li class = "menu-items"><a href="delivery">Аттестация строителей</a></li>
                        <li class = "menu-items"><a href="delivery">Видео обучение</a></li>
                        <li class = "menu-items"><a href="delivery">Проектирование</a></li> -->
                    </ul>
                </div>
                <div class="contacts">
                    <p class = "blue_words">Телефон:</p>
                    <ul>
                    <li class = "number-items"><a href="tel:87132557041">+7(7132) 55 70 41</a></li>
                    <li class = "number-items"><a href="tel:87132905324">+7(7132) 90 53 24</a></li>
                    <li class = "number-items"><a href="tel:87771499444">+7(777) 149 94 44</a></li>
                    <li class = "number-items"><a href="tel:87778198752">+7(701) 819 87 52</a></li>
                    </ul>
                    <p class = "blue_words">Адрес:</p>
                    <p class = "address">РК,г.Актобе,пр-т А.Молдагуловой,<br> 46/55 БЦ "Capital plaza" офис 509</a>
                    <p class = "blue_words">E-mail:</p>
                    <a class = "address" href="mailto:hseconsulting@mail.ru">hseconsulting@mail.ru</a>
                    <a class = "address" href="mailto:manager1@hsecompany.kz">manager1@hsecompany.kz</a>
                </div>
                <div class="btn-icons">
                    <?php if (!Yii::$app->user->isGuest) { ?>
                        <!-- <button onclick="location.href='/account/index'" class ='enter'>
                            <p class = 'sign-in'>Личный кабинет</p>
                        </button>-->
                        <button onclick="location.href='/account/index'" class = "enter">Личный кабинет</button>
                    <?php } else { ?>
                        <button onclick="location.href='/site/login'" class = "enter">ВОЙТИ</button>
                    <?php } ?>
                    <div class = 'social_media flex'>
                        <a href="https://vk.com/" class = "social_media__a"><img class = "vk"src="/img1/media/vk.png"/></a>
                        <a href="https://www.instagram.com/hsecompany.kz/" class = "social_media__a"><img class = "instagram" src="/img1/media/instagram.png"/></a>
                        <a href="https://www.facebook.com/" class = "social_media__a"><img class = "facebook" src="/img1/media/facebook.png"/></a>
                    </div>
                    <div class= "logo_maint">
                        <a href="https://maint.kz/"><img src="/img1/maint.png"/></a>
                    </div>
                </div>
            </div>
            <div class="footer_line web"></div>
            <div class="footerWrap_mob mobile_flex">
                <div class="footer_byMaint_mob">
                    <a href="https://maint.kz/"><img src="/img1/mobile/byMaint_mob.png" alt="img"></a>
                </div>
                <div class="footer_line_mob"></div>
            </div>
        </footer>
        <script src="/js1/jquery.js"></script>        
        <script src = "/js1/owl.js"></script>
        <script src = "/js1/tilt.js"></script>
        <script src="/js1/main.js"></script>
    </main>
    </body>
</html>