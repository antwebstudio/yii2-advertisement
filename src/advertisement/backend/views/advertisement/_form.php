<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use ant\file\widgets\Upload;
use ant\advertisement\models\AdvertisementPlaceholder;

/* @var $this yii\web\View */
/* @var $model ant\advertisement\models\Advertisement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advertisement-form">

    <?php $form = ActiveForm::begin() ?>

		<?php if (!isset($model->placeholder_id)): ?>
			<?= $form->field($model, 'placeholder_id')->widget(Select2::class, [
				'data' => ArrayHelper::map(AdvertisementPlaceholder::find()->asArray()->all(), 'id', 'name'),
				'options' => ['placeholder' => ''],
			]) ?>

			<div class="form-group">
				<?= Html::submitButton('Next', ['class' => 'btn btn-success']) ?>
			</div>
		<?php else: ?>
			<label><?= $model->getAttributeLabel('placeholder_id') ?></label>
			<p><?= $model->placeholder->name ?></p>
			
			<?= $form->field($model, 'placeholder_id')->hiddenInput()->label(false) ?>

			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'source_url')->textInput(['maxlength' => true]) ?>
			
			<?= $form->field($model, 'file')->widget(Upload::class, [
				'multiple' => true,
			])?>

			<?= $form->field($model, 'target_url')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

			<?= $form->field($model, 'type')->dropDownList([0 => 'Image', 1 => 'Video']) ?>

			<?php /*
			<?= $form->field($model, 'status')->textInput() ?>
			
			<?= $form->field($model, 'order')->textInput() ?>
			*/?>

			<div class="form-group">
				<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
			</div>
		<?php endif ?>
		
    <?php ActiveForm::end() ?>

</div>
