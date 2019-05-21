<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DarajalarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Darajalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="darajalar-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'nomi',
            'min_oylik',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <p class="text-right">
        <?= Html::a('Daraja yaratish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
