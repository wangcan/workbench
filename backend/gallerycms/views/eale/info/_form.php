<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\widgets\FileUploadUI;
use common\ueditor\UEditor;

$attachmentModel = $model->_newModel('attachment');
$thumb = $attachmentModel->getFieldInfos('sample', 'thumb');

?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => 128]) ?>
    <?= $form->field($model, 'orderlist')->textInput(['maxlength' => 128]) ?>
    <?= $form->field($model, 'thumb')->hiddenInput(); ?>
    <?= FileUploadUI::widget([
        'model' => $attachmentModel,
        'attribute' => 'files[thumb]',
        'url' => ['/eale/gallerycms-upload/index', 'table' => 'sample', 'field' => 'thumb', 'id' => $model->id],
		'gallery' => true,
        'fieldOptions' => [
			'isSingle' => $thumb['isSingle'],
			'idField' => Html::getInputId($model, 'thumb'),
            'accept' => 'image/*'
        ],
        'clientOptions' => [
		    //'dataType' => 'json',
			'maxFileSize' => $thumb['maxSize'] * 1024,
        ],
    ]);
    ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>
    <?= $form->field($model, 'status')->dropDownList($model->statusInfos, ['prompt' => Yii::t('admin-common', 'Select Status')]); ?>
	<?= $form->field($model, 'content')->widget(Ueditor::className(),[]) ?>

	<?= $this->render('@app/views/common/form_button', ['model' => $model]); ?>
    <?php ActiveForm::end(); ?>
</div>