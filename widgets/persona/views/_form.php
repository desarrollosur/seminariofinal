<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var app\models\Persona $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="persona-form">

    <div class="">

        <p>
            <!-- attribute nombre -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Nombre</label>  
            <div class="col-md-4">
                <?= Html::activeInput('text', $model, 'nombre', ['class' => 'form-control input-md']) ?>
            </div>
        </div>            
            <!-- attribute nombre -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Apellido</label>  
            <div class="col-md-4">
                <?= Html::activeInput('text', $model, 'apellido', ['class' => 'form-control input-md']) ?>
            </div>
        </div>            
            <!-- attribute nombre -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Tipo DNI</label>  
            <div class="col-md-4">
                <?= Html::activeDropDownList($model, 'tipo_dniid', yii\helpers\ArrayHelper::map(\app\models\TipoDni::find()->activo()->all(), 'id', 'descripcion'), ['class' => 'form-control', 'prompt'=>'Elija una opción']) ?>
            </div>
        </div>            
            <!-- attribute nombre -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">DNI</label>  
            <div class="col-md-4">
                <?= Html::activeInput('text', $model, 'dni', ['class' => 'form-control input-md']) ?>
            </div>
        </div>            
            <!-- attribute nombre -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Nacionalidad</label>  
            <div class="col-md-4">
                <?= Html::activeDropDownList($model, 'nacionalidadid', yii\helpers\ArrayHelper::map(\app\models\Pais::find()->activo()->all(), 'id', 'descripcion'), ['class' => 'form-control', 'prompt'=>'Elija una opción']) ?>
            </div>
        </div>            
            <!-- attribute nombre -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Activo</label>  
            <div class="col-md-4">
                <?= Html::activeCheckbox($model, 'activo') ?>
            </div>
        </div>            
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Fecha de Nacimiento</label>  
            <div class="col-md-4">
                <?= Html::activeInput('text', $model, 'xfecha_nacimiento', ['class' => 'form-control input-md', 'prompt'=>'DD/MM/AAAA']) ?>
            </div>
        </div>            
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Teléfono</label>  
            <div class="col-md-4">
                <?= Html::activeInput('text', $model, 'telefono', ['class' => 'form-control input-md']) ?>
            </div>
        </div>            
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Domicilio</label>  
            <div class="col-md-4">
                <?= Html::activeInput('text', $model, 'domicilio', ['class' => 'form-control input-md']) ?>
            </div>
        </div>            
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Email</label>  
            <div class="col-md-4">
                <?= Html::activeInput('text', $model, 'email', ['class' => 'form-control input-md']) ?>
            </div>
        </div>            
        <?= Html::activeInput('hidden', $model, 'id') ?>
        <?= Html::activeInput('hidden', $model, 'version') ?>

        </p>


        <hr/>

        <?php echo Html::errorSummary($model) ?>

    </div>

</div>