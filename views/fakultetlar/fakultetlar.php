<?php

use yii\helpers\Html;

?>

<div class="row">
  <? foreach ($fakultetlar as $fakultet) { ?>
    <div class="col-lg-12 col-xs-">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?= $fakultet->nomi ?></h3>

          <p><?= $fakultet->dekan_fio ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-shopping-cart"></i>
        </div>
        <?= Html::a('More info &nbsp;<i class="fa fa-arrow-circle-right"></i>', ['kafedralar/kafedra-list', 'fakultet_id' => $fakultet->id], ['class' => 'small-box-footer']) ?>
      </div>
    </div>
  <? } ?>
  <!-- ./col -->
</div>