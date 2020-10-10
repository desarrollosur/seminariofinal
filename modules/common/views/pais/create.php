<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Pais $model
*/

$this->title = Yii::t('models', 'Pais');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Pais'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud pais-create">

    <h1>
        <?= Yii::t('models', 'Pais') ?>
        <small>
                        <?= Html::encode($model->id) ?>
        </small>
    </h1>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?=             Html::a(
            'Cancel',
            \yii\helpers\Url::previous(),
            ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <hr />

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
