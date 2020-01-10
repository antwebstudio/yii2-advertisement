<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use ant\file\models\FileAttachment;

/* @var $this yii\web\View */
/* @var $searchModel ant\advertisement\models\AdvertisementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Advertisements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertisement-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Advertisement', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
				'attribute' => 'placeholder.name',
				'label' => 'Placeholder',
			],
            'name',
			[
				'format' => 'raw',
				'attribute' => 'file',
				'value' => function($model) {
					return  Html::img(FileAttachment::getFirstUrl($model->file), ['height' => 150]);
				}
			],
            //'source_url:url',
            'target_url:url',
            //'content:ntext',
            //'type',
            //'status',
            //'order',

            [
				'class' => 'ant\grid\ActionColumn',
				'template' => '{update} {delete}',
			],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
