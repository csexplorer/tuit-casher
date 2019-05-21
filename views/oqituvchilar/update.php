<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Oqituvchilar */

$this->title = 'O\'qituvchini yangilash: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'O\'qituvchilar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->familiyasi . " " . $model->ismi, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Yangilash';
?>
<div class="oqituvchilar-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>


<?php
$script = <<<JS

    var loadFile = function(event) {
        var output = document.getElementById('oqituvchilar-file');
        console.log(output);
        output.src = URL.createObjectURL(event.target.files[0]);
    };
        
JS;
$this->registerJs($script);
?>