<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Oqituvchilar */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="oqituvchilar-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'ismi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'familiyasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otasining_ismi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fani')->textInput() ?>

    <?=
    $form->field($model, 'fakultet_id')->dropDownList(
            ArrayHelper::map(app\models\Fakultetlar::find()->all(), 'id', 'nomi'),
            ['prompt' => '--- Fakultetni tanlang ---']
    )
    ?>

    <?=
    $form->field($model, 'kafedra_id')->dropDownList(
            ArrayHelper::map(app\models\Kafedralar::find()->all(), 'id', 'nomi'),
            ['prompt' => '--- Kafedrani tanlang ---']
    )
    ?>

    <?=
    $form->field($model, 'darajasi')->dropDownList(
            ArrayHelper::map(app\models\Darajalar::find()->all(), 'id', 'nomi'),
            ['prompt' => '--- Darajani tanlang ---']
    )
    ?>

    <?=
    $form->field($model, 'multi_ustamalar')->widget(Select2::className(), [
        'data' => ArrayHelper::map(app\models\Ustamalar::find()->all(), 'id', 'nomi'),
        'options' => ['placeholder' => 'Ustama turlarini tanlang', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])
    ?>

<?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
<?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>



