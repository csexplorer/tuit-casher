<?php

use yii\helpers\Html;

?>
<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
<!--        <div class="user-panel">
            <div class="pull-left image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>-->
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <?= Html::a('<i class="fa fa-dashboard"></i> <span>Dashboard</span>', ['site/index']) ?>
            </li>
            <li>
                <?= Html::a('<i class="fa fa-book"></i> <span>Fakultetlar</span>', ['fakultetlar/fakultet-list']) ?>
            </li>
            <li>
                <?= Html::a('<i class="fa fa-th"></i> <span>Kafedralar</span>', ['kafedralar/index']) ?>
            </li>
            <li>
                <?= Html::a('<i class="fa fa-share"></i> <span>Darajalar</span>', ['darajalar/index']) ?>
            </li>
            <li>
                <?= Html::a('<i class="fa fa-users"></i> <span>O\'qituvchilar</span>', ['oqituvchilar/index']) ?>
            </li>
            <li>
                <?= Html::a('<i class="fa fa-star"></i> <span>Ustamalar</span>', ['ustamalar/index']) ?>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->