<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ant\advertisement\models\AdvertisementPlaceholder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advertisement-placeholder-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'handle')->textInput(['maxlength' => true]) ?>

	<?php /*
    <?= $form->field($model, 'setting')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>
	*/?>
	
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
