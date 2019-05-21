<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Fakultetlar;

/* @var $this yii\web\View */
/* @var $model app\models\Kafedralar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kafedralar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fakultet_id')->dropDownList(
        ArrayHelper::map(Fakultetlar::find()->all(), 'id', 'nomi'),
        ['prompt' => '--- Fakultetni tanlang ---']
    ) ?>

    <?= $form->field($model, 'mudir_fio')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
