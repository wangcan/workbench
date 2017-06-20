<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>
    <?= $form->field($model, 'merchant_id')->dropDownList($model->getMerchantInfos($this->context->privInfo), ['prompt' => '']); ?>
    <?= $form->field($model, 'manager_id')->dropDownList($model->managerInfos, ['prompt' => '']); ?>
    <?= $form->field($model, 'code')->textInput() ?>
    <?= $form->field($model, 'password_user')->textInput() ?>
    <?= $form->field($model, 'mobile')->textInput() ?>
    <?= $form->field($model, 'mobile_ext')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList($model->statusInfos, ['prompt' => Yii::t('admin-common', 'Select Status')]); ?>
    <?= $form->field($model, 'status_sendmsg')->dropDownList($model->statusSendmsgInfos, ['prompt' => Yii::t('admin-common', 'Select Status_sendmsg')]); ?>

    <?= $this->render('@backend/views/common/form_button', ['model' => $model]); ?>
    <?php ActiveForm::end(); ?>
</div>
