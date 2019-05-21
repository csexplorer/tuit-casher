<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fakultetlar */

$this->title = 'Fakultetni yangilash: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fakultetlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fakultetlar-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
