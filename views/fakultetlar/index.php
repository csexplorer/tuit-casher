<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FakultetlarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fakultetlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fakultetlar-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nomi',
            'dekan_fio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p class="text-right">
        <?= Html::a('Fakultet yaratish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
