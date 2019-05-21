<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ustamalar */

$this->title = 'Ustama yaratish';
$this->params['breadcrumbs'][] = ['label' => 'Ustamalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ustamalar-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
