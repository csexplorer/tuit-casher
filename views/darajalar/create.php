<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Darajalar */

$this->title = 'Daraja yaratish';
$this->params['breadcrumbs'][] = ['label' => 'Darajalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="darajalar-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
