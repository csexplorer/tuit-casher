<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OqituvchilarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oqituvchilar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ismi') ?>

    <?= $form->field($model, 'familiyasi') ?>

    <?= $form->field($model, 'otasining_ismi') ?>

    <?= $form->field($model, 'fani') ?>

    <?php // echo $form->field($model, 'fakultet_id') ?>

    <?php // echo $form->field($model, 'kafedra_id') ?>

    <?php // echo $form->field($model, 'darajasi') ?>

    <div class="form-group">
        <?= Html::submitButton('Qidirish', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Qayta sozlash', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
