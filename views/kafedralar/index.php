<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KafedralarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kafedralar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kafedralar-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nomi',
            // 'fakultet_id',
            [
                'attribute' => 'fakultet_id',
                'value' => 'fakultet.nomi'
            ],
            'mudir_fio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p class="text-right">
        <?= Html::a('Kafedra yaratish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
