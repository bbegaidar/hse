<main class="main">
          <div class="main-wrap d-flex">
            <div class="address-wrap d-flex">
              <div class="aktobe-wrap">
                <div class="address">
                  <p class="address-title cursive"><?= Yii::t('static','Address') ?></p>
                  <p>РК, г.Актобе,</p>
                  <p>пр-т А.Молдагуловой, 46/55 БЦ «Capital Plaza» офис 509</p>
                </div>
                <div class="phone">
                  <div class="phone-title cursive"><?= Yii::t('static','Phone') ?></div>
                  <ul>
                    <li>+7 (7132) 55 70 41</li>
                    <li>+7 (7132) 90-53-24</li>
                    <li>+7 (777) 149 94 44</li>
                    <li>+7 (701) 819 87 52</li>
                  </ul>
                </div>

                <div class="btn-wrap-clone"></div>
                <div class="btn-wrap pos-absolute animated opacity0">
                  <a href="javascript:void(0);"  onclick="aqtobe();" class="neon-btn neon-btn-normal neon-btn-with-icon">
                    <img class="btn-icon" src="/img/btn-icons/icon-address-point.png" alt="icon pen">
                    <?= Yii::t('static','Aqtobe') ?></a>
                </div>
              </div>
              <div class="almaty-wrap">
                <div class="address">
                  <p class="address-title cursive"></p>
                  <p>РК, г.Алматы,</p>
                  <p>пр-т Достык 210 БЦ Коктем Гранд, блок 2 офис 28</p>
                </div>
                <div class="phone">
                  <div class="phone-title cursive"></div>
                  <ul>
                    <li>+7 (7132) 55 70 41</li>
                    <li>+7 (7132) 90-53-24</li>
                    <li>+7 (777) 149 94 44</li>
                    <li>+7 (701) 819 87 52</li>
                  </ul>
                </div>

                <div class="btn-wrap-clone"></div>
                <div class="btn-wrap pos-absolute animated opacity0">
                  <a href="javascript:void(0);" onclick="almaty();" class="neon-btn neon-btn-normal neon-btn-with-icon">
                    <img class="btn-icon"  src="/img/btn-icons/icon-address-point.png" alt="icon pen">
                    <?= Yii::t('static','Almaty') ?></a>
                </div>
              </div>
            </div>
            <div class="map-wrap">
              <div class="map-container">
                <img  id="map1" src="/img/contacts/aqtobe.png" alt="Map">
                <img  id="map2" style="display:none;" src="/img/contacts/almaty.png" alt="Map">
              </div>
            </div>
          </div>


          <div class="footer">
            <img class="bg-footer pc" src="/img/contacts/bg-contacts-bottom.png" alt="bg bottom">
            <img class="bg-footer mob" src="/img/contacts/mob-bg-contacts-bottom.png" alt="bg bottom">
            <div class="footer-wrap">
              <div class="line-wrap pc">
                <img class="line-img" src="/img/contacts/line-1.png" alt="Line">
              </div>
              <div class="ray-wrap pc animated slower flash infinite">
                <div class="ray ray-1"></div>
                <div class="ray ray-2"></div>
                <div class="ray ray-3"></div>
                <div class="ray ray-4"></div>
                <div class="ray ray-5"></div>
              </div>
              <div class="text-wrap">
                <p class="pc"><?= Yii::t('static', 'We look forward to your<br>questions and feedback on the<br>work of HSE consulting group!') ?></p>
                <p class="mob"><?= Yii::t('static', 'We look forward to your questions') ?></p>
                <p class="mob lowercase"><?= Yii::t('static', 'and feedback on the work of HSE consulting group!') ?></p>
              </div>

              <div class="send-message-block-wrap pc">
                <div class="send-message-block">
                  <div class="loader transform">
                  </div>
                  <ul class="form-wrap d-flex">
                    <div class="p-r-l">
                      <li class="input-wrap">
                        <div class="input-title"><?= Yii::t('static','Name') ?></div>
                        <input type="text" class="send-message-name">
                      </li>
                      <li class="input-wrap">
                        <div class="input-title"><?= Yii::t('static','Phone') ?></div>
                        <input type="text" class="send-message-phone">
                      </li>
                    </div>
                    <div class="p-r-l">
                      <li class="input-wrap float-r">
                        <div class="input-title input-title-3"><?= Yii::t('static','Message') ?></div>
                        <textarea name="message"></textarea>
                      </li>
                    </div>
                  </ul>
                </div>
              </div>

              <div class="btn-wrap-clone"></div>
              <div class="btn-wrap pos-absolute animated delay-1s opacity0 pc">
                <a href="#" class="neon-btn neon-btn-normal neon-btn-with-icon">
                  <img class="btn-icon" src="/img/btn-icons/icon-mail.png" alt="icon pen">
                  <?= Yii::t('static','Send') ?></a>
              </div>
              <div class="btn-wrap pos-absolute animated delay-1s opacity0 mob">
                <a href="#" class="neon-btn neon-btn-normal neon-btn-with-icon">
                  <img class="btn-icon" src="/img/btn-icons/icon-mail.png" alt="icon pen">
                  <?= Yii::t('static','Send question') ?></a>
              </div>

              <div class="bg-mob mob">
                <div class="icon-wrap">
                  <div class="icon">
                    <img src="/img/main-page/program/icon-insta.png" alt="Instagram icon">
                  </div>
                  <div class="icon">
                    <img src="/img/main-page/program/icon-fb.png" alt="Facebook icon">
                  </div>
                </div>
                <div class="maint-wrap">
                  <div class="icon">
                    <img src="/img/main-page/program/icon-maint.png" alt="Maint.kz icon">
                  </div>
                </div>
              </div>
            </div>


        </main>
      </div>
      
      
      
      
      
   