<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Oqituvchilar */

$this->title = 'O\'qituvchi yaratish';
$this->params['breadcrumbs'][] = ['label' => 'O\'qituvchilar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oqituvchilar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
