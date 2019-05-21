<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kafedralar */

$this->title = 'Kafedra yaratish';
$this->params['breadcrumbs'][] = ['label' => 'Kafedralar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kafedralar-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
