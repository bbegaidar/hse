<?php 
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
?>
<div class="modal" id="<?= $id ?>">
<div class="bgmod">

  <main class="main">

    <div class="modal-wrap animated delay-500ms">
      <div class="close-icon">
        <img src="/img/popup/close-icon.png" alt="close">
      </div>

      <div class="nav-wrap">
        <p><?= Yii::t('static','Order service') ?></p>
      </div>

       <?php Pjax::begin() ?>
        <?php $form = ActiveForm::begin([
            'id' => 'ord-form',
            'action'=>['site/form-callback'],
            'options' => [
                'class' => 'reg-wrap',
                'data-pjax' => true,
            ]
        ]); ?>
        <input type="hidden" name="type" value="3">
        <ul class="form-wrap d-flex">
          <div class="p-r-l">
            <li class="input-wrap">
              <div class="input-title"><?= Yii::t('static','Name') ?></div>
              <input type="text" name="sender-name" class="send-message-name" required>
            </li>
            <li class="input-wrap">
              <div class="input-title"><?= Yii::t('static','Phone') ?></div>
              <input type="text" name="sender-phone" class="send-message-phone" required>
            </li>
          </div>
        </ul>

        <div class="btn">
          <div class="btn-wrap" style="left:auto;bottom:auto;">
            <button class="neon-btn neon-btn-normal neon-btn-with-icon icon-mail"><?= Yii::t('static','Send') ?></button>
          </div>
        </div>
       <?php ActiveForm::end(); ?>
        <?php Pjax::end() ?>
    </div>

  </main>
</div>
</div>