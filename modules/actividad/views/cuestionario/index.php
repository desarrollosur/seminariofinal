<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
$this->title = 'Listado de Cuestionarios';
$this->params['breadcrumbs'][] = ['label' => 'Cuestionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="table-responsive">
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
            'class' => yii\widgets\LinkPager::className(),
            'firstPageLabel' => 'First',
            'lastPageLabel' => 'Last',
        ],
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'headerRowOptions' => ['class' => 'x'],
        'columns' => [
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{ejecutar}',
                'buttons' => [
                    'ejecutar' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-play"></span>', Url::to(['realizar-cuestionario','id'=>$model->id]));
                    }
                ],
                'contentOptions' => ['nowrap' => 'nowrap']
            ],
            'descripcion',
            'activo:boolean'
        ]
    ]);
    ?>
</div>