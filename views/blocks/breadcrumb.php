<?php

use yii\widgets\Breadcrumbs;

?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= $this->title ?>
<!--    <small>it all starts here</small>-->
  </h1>
<!--  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Blank page</li>
  </ol>-->
<?= Breadcrumbs::widget([
//    'itemTemplate' => '<li><a href="#">{link}</a></li>',
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
</section>

