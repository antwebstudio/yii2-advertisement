<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ant\advertisement\models\AdvertisementPlaceholder */

$this->title = 'Create Advertisement Placeholder';
$this->params['breadcrumbs'][] = ['label' => 'Advertisement Placeholders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertisement-placeholder-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
