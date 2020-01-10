<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ant\advertisement\models\Advertisement */

$this->title = 'Update Advertisement: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Advertisements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="advertisement-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
