<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UstamalarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ustamalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ustamalar-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'nomi',
            'ustama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <p>
        <?= Html::a('Ustama yaratish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


</div>
