<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ant\advertisement\models\AdvertisementPlaceholder */

$this->title = 'Update Advertisement Placeholder: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Advertisement Placeholders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="advertisement-placeholder-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
