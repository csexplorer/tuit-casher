<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fakultetlar */

$this->title = 'Fakultet yaratish';
$this->params['breadcrumbs'][] = ['label' => 'Fakultetlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fakultetlar-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
