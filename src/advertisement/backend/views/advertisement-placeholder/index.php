<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel ant\advertisement\models\AdvertisementPlaceholderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Advertisement Placeholders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertisement-placeholder-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Advertisement Placeholder', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'handle',
            'setting:ntext',
            'status',

            ['class' => 'ant\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
