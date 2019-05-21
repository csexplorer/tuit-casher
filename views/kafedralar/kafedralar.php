<?php

use yii\helpers\Html;

?>

<div class="row">
  <? foreach ($kafedralar as $kafedra) { ?>
    <div class="col-lg-12 col-xs-12">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?= $kafedra->nomi ?></h3>

          <p><?= $kafedra->mudir_fio ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-shopping-cart"></i>
        </div>
        <?= Html::a('More info &nbsp;<i class="fa fa-arrow-circle-right"></i>', ['darajalar/daraja-list', 'kafedra_id' => $kafedra->id], ['class' => 'small-box-footer']) ?>
      </div>
    </div>
  <? } ?>
  <!-- ./col -->
</div>