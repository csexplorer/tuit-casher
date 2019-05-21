<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OqituvchilarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'O\'qituvchilar';
$this->params['breadcrumbs'][] = $this->title;

//echo "<pre>";var_dump($dataProvider->models[0]->oqituvchiUstamalaris); exit;
?>

<div class="oqituvchilar-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'label' => 'FISH',
            'attribute' => 'ismi',
            'value' => 'fio',
            'footer' => 'Jami ustamalar soni'
        ]
    ];
    $ustamalarimiz = \app\models\Ustamalar::find()->all();
    foreach ($ustamalarimiz as $ustama) {
        $gridColumns[] = [
            'label' => $ustama->nomi . "(%)",
            'value' => function($model, $key, $index, $widget) use ($ustama) {
                foreach ($model->oqituvchiUstamalaris as $ou) {
                    if ($ustama->id == $ou->ustama_id) {
                        $widget->footer += $ustama->ustama / $ustama->ustama;
                        return $ustama->ustama;
                    }
                }
                return 0;
            },
        ];
    }
    $gridColumns[] = [
        'label' => 'Daraja',
        'attribute' => 'darajasi',
        'value' => 'darajasi0.nomi'
    ];
    $gridColumns[] = [
        'label' => 'Jami Oylik',
        'value' => function($model) {
            return $model->jamiOylik($model);
        }
    ];
    $gridColumns[] = ['class' => 'kartik\grid\ActionColumn'];

    $fullExportMenu = ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
                'target' => ExportMenu::TARGET_BLANK,
                'pjaxContainerId' => 'kv-pjax-container',
                'showConfirmAlert' => false,
                'exportContainer' => [
                    'class' => 'btn-group',
                    'style' => 'margin-right: 50px;'
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_CSV => false,
                    ExportMenu::FORMAT_TEXT => false,
                    ExportMenu::FORMAT_HTML => false,
                ],
                'dropdownOptions' => [
                    'label' => 'Excel',
                    'class' => 'btn btn-secondary',
                    'itemsBefore' => [
                        '<div class="dropdown-header">Export All Data</div>',
                    ],
                ],
    ]);

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
//        'responsive' => true,
        'hover' => true,
        'pjax' => true,
//        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<h3 class="panel-title"><i class="fas fa-book"></i> O\'qituvchilar</h3>',
        ],
        'export' => [
            'label' => 'Export To',
            'showConfirmAlert' => false,
            'fontAwesome' => true
        ],
        'exportConfig' => [
            GridView::HTML => ['label' => 'HTML'],
            GridView::CSV => ['label' => 'CSV'],
            GridView::PDF => ['label' => 'PDF'],
            GridView::EXCEL => ['label' => 'Excel'],
        ],
//        'exportContainer' => [
//            'class' => 'btn-group',
//            'style' => 'margin-right: 20px;'
//        ],
        'toolbar' => [
//            $fullExportMenu,
            '{export}',
        ],
        'showFooter' => true
    ]);
    ?>

    <p class="text-left">
        <?= Html::a('O\'qituvchi yaratish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


</div>
