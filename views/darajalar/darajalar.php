<?php

use yii\helpers\Html;

//var_dump(Yii::$app->request->get('kafedra_id')); exit;

?>

<div class="row">
  <? foreach ($darajalar as $daraja) { ?>
    <div class="col-lg-12 col-xs-">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?= $daraja->nomi ?></h3>
        </div>
        <div class="icon">
          <i class="fa fa-shopping-cart"></i>
        </div>
        <?= Html::a('More info &nbsp;<i class="fa fa-arrow-circle-right"></i>', ['oqituvchilar/index', 'kafedra_id' => Yii::$app->request->get('kafedra_id'), 'daraja_id' => $daraja->id], ['class' => 'small-box-footer']) ?>
      </div>
    </div>
  <? } ?>
  <!-- ./col -->
</div>

