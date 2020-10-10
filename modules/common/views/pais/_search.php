<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var app\controllers\search\PaisSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="pais-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'descripcion') ?>

		<?= $form->field($model, 'activo')->checkbox() ?>

		<?= $form->field($model, 'fecha_creacion') ?>

		<?= $form->field($model, 'fecha_actualizacion') ?>

		<?php // echo $form->field($model, 'creado_porid') ?>

		<?php // echo $form->field($model, 'actualizado_porid') ?>

		<?php // echo $form->field($model, 'version') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
