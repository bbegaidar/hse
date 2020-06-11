<?php
include 'main/header.php';

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::$app->name.' - '.Yii::t('static', 'My account');
// $headerMenu = $this->render('main/_header.php',['pageName' => Yii::t('static', 'My account')]);
// $headerMenuPc = $this->render('main/_header.php',['pageName' => Yii::t('static', 'My account'), 'pc'=>'pc']);
// $headerMenu = $this->render('main')
?>
 <section class="cd-section visible" id="login">
        <div class="bg">
            <?php //echo $headerMenu ?>
            <main class="main">
        <div class="main-container">
          <div class="nav-wrap d-flex">
            <ul class="d-flex">
              <li class="btn-login"><?= Yii::t('static', 'Log-in') ?>
                <div class="ray-wrap ray-wrap-hover">
                  <div class="ray ray-hover">
                    <img class="pc" src="/img/menu/bg-ray.png" alt="Ray line">
                  </div>
                </div>
              </li>

              <li class="btn-reg"><?= Yii::t('static', 'Registration') ?>
                <div class="ray-wrap ray-wrap-hover">
                  <div class="ray ray-hover">
                    <img class="pc" src="/img/menu/bg-ray.png" alt="Ray line">
                  </div>
                </div>
              </li>

            </ul>
          </div>
          <div class="login-container">
            
                
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class'=>'login-wrap'],
                'fieldConfig' => [
                        'options' => ['class' => 'input-wrap'],
                        'labelOptions' => ['class' => 'input-title'],
                        'template' => '{label}{input}'
                    ]
            ]); ?>
            <div class="form-wrap d-flex">
                <div class="p-r-l">
                    <?= $form->field($modelLogin, 'email')->textInput(['autofocus' => true,'placeholder' => 'Email']) ?>
                    <?= $form->field($modelLogin, 'password')->passwordInput(['placeholder' => 'Пароль']) ?>
                </div>
            </div>
            <div class="text-link-wrap">
                <a href="#" class="password"><?= Yii::t('static', 'Forgot password') ?></a>
                <a href="#" class="registration"><?= Yii::t('static', 'Register') ?></a>
            </div>
            <div class="btn">
                <div class="btn-wrap pos-absolute animated delay-1s opacity0">
                    <?= Html::submitButton(Yii::t('static', 'Login to your account'), ['class' => 'neon-btn neon-btn-normal neon-btn-with-icon icon-sign', 'name' => 'login-button']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
            
            
                
                <?php $form = ActiveForm::begin([
                    'id' => 'reg-form',
                    'options' => ['enctype' => 'multipart/form-data','class'=>'reg-wrap opacity0 d-none'],
                    'fieldConfig' => [
                        'options' => ['class' => 'input-wrap'],
                        'labelOptions' => ['class' => 'input-title'],
                        'template' => '{label}{input}'
                    ]
                    ]); ?>
                    <div class="form-wrap d-flex">
                        <div class="p-r-l">
                            <?= $form->field($modelReg, 'name')->textInput(['placeholder' => 'Имя']) ?>
                            <?= $form->field($modelReg, 'surname')->textInput(['placeholder' => 'Фамилия']) ?>
                            <?= $form->field($modelReg, 'patronymic')->textInput(['placeholder' => 'Отчество']) ?>
                            <?= $form->field($modelReg, 'email')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'email']])->textInput(['placeholder' => 'Email']) ?>
                        </div>
                        <div class="p-r-l">
                            <?= $form->field($modelReg, 'phone')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '+ 9 ( 999 ) 999 - 9999'])->textInput(['placeholder' => 'Телефон']) ?>
                            <?= $form->field($modelReg, 'organization')->textInput(['placeholder' => 'Организация']) ?>
                            <?= $form->field($modelReg, 'password')->passwordInput(['placeholder' => 'Пароль']) ?>
                            <?= $form->field($modelReg, 'idCard')->fileInput() ?>
                            <button class="sverhbut">Удостоверение</button>
                        </div>
                    </div>
                    <div class="btn">
                        <div class="btn-wrap pos-absolute animated delay-1s opacity0">
                            <?= Html::submitButton(Yii::t('static','Register'), ['class' => 'neon-btn neon-btn-normal neon-btn-with-icon icon-sign']) ?>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
              
            
          </div>
        </div>

        <!-- bg lines and points -->
        <div class="bg-lines">
          <div class="bg-line-1">
            <img src="/img/main-page/sign-up/bg-line-1.png" alt="BG lines">
          </div>
          <div class="bg-line-2">
            <img src="/img/main-page/sign-up/bg-line-2.png" alt="BG lines">
          </div>
          <div class="bg-line-3">
            <img src="/img/yellow-line-3.png" alt="BG lines">
          </div>
        </div>
        <div class="ray-wrap">
          <div class="ray-wrap-1 animated slower flash infinite">
            <div class="ray ray-1"></div>
            <div class="ray ray-2"></div>
          </div>
          <div class="ray-wrap-2 animated slower flash infinite">
            <div class="ray ray-3"></div>
            <div class="ray ray-4"></div>
          </div>
        </div>
      </main>
        </div>
</section>
	
	<?php 

$script = <<< JS
  
    $(document).ready(function(){
        document.getElementById('reg-form').reset()
        document.getElementById('login-form').reset()
      $('.nav-wrap').on('click', '.btn-login', function(){
        $('.login-wrap').removeClass('opacity0').css('display', 'block');
        $('.reg-wrap').addClass('opacity0').css('display', 'none');
        document.getElementById('reg-form').reset()
        $('.btn-login').css('opacity', '1');
        $('.btn-reg').css('opacity', '0.7');
      });
      $('.nav-wrap').on('click', '.btn-reg', function(){
        console.log('sasa')
        $('.reg-wrap').removeClass('opacity0').css('display', 'block');
        $('.login-wrap').addClass('opacity0').css('display', 'none');
        document.getElementById('login-form').reset()
        $('.btn-reg').css({'opacity': '1'});
        $('.btn-login').css('opacity', '0.7');
      });
    })

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>