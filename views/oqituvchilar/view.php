<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Oqituvchilar */

$this->title = $model->familiyasi . " " . $model->ismi;
$this->params['breadcrumbs'][] = ['label' => 'O\'qituvchilar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

//echo "<pre>";var_dump(!empty($model->avatar)); exit;
?>
<div class="oqituvchilar-view">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <img class="profile-user-img img-responsive img-circle" src="<?= !empty($model->avatar) ? $model->avatar : 'dist/img/user.png' ?>" alt="O'qituvchi fotosurati">

                    <h3 class="profile-username text-center"><?= $model->fio ?></h3>

                    <p class="text-muted text-center"><?= $model->darajasi0->nomi ?></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="pull-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="pull-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="pull-right">13,287</a>
                        </li>
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b><?= $model->jamiOylik($model)?></b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Ustamalari</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title"><?= $model->familiyasi . " " . $model->ismi ?>ning qo'shimcha ustamalari</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <tr>
                                        <th style="width: 20px">#</th>
                                        <th>Ustama nomi</th>
                                        <th style="width: 120px">Ustama qiymati</th>
                                    </tr>
                                    <?php if ($ustamalar) { 
                                        $i = 1;
                                        foreach($ustamalar as $ustama) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $ustama->nomi ?></td>
                                        <td align="center"><span class="badge bg-green"><?= $ustama->ustama . " %" ?></span></td>
                                    </tr>
                                    <?php $i++; } } ?>
                                    <tr>
                                        <td colspan="2" align="right"><b>Jami ustama :</b></td>
                                        <td align="center"><span class="badge bg-yellow"><?= $jami_ustama . " %" ?></span></td>
                                    </tr>

                                    </tr>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>