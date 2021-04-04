<?php

use yii\bootstrap\Html;

/* @var $this yii\web\View */
$this->title = 'Nueva Actividad';
$this->params['breadcrumbs'][] = ['label' => 'Actividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="text-center"><h1>Nueva Actividad</h1></div>

<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal">
            <div class="form-group">
                <label for="dificultad" class="col-sm-2 control-label">Dificultad</label>
                <div class="col-sm-10">
                    <input id="dificultad" type="number">
                </div>
            </div>
            <div class="form-group">
                <label for="categoria" class="col-sm-2 control-label">Categoría</label>
                <div class="col-sm-10">
                    <?= Html::dropDownList('categoria', 'Geometría', ['Geometría'], ['class' => 'form-control', 'id' => 'categoria']); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="subcategoria" class="col-sm-2 control-label">Subcategoría</label>
                <div class="col-sm-10">
                    <?= Html::dropDownList('subcategoria', 'Ángulos', ['Ángulos'], ['class' => 'form-control', 'id' => 'subcategoria']); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
                <div class="col-sm-10">
                    <?= Html::textarea('subcategoria', 'Ejemplo descripción', ['Ángulos'], ['class' => 'form-control', 'id' => 'descripcion', 'spellcheck' => false]); ?>
                </div>
            </div>
        </form>        
    </div>
    <div class="col-md-6" style='border-color: black; border-width: 1px; border-style: solid'>
        <img src="/images/angulo_recto.png" style='height: 100%; width: 100%; object-fit: contain'/> 
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <button class="btn btn-default" style="margin-bottom: 30px">Agregar opción</button>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>
                        Opción  
                    </th>
                    <th>
                        Descripción
                    </th>
                    <th>
                        Mensaje
                    </th>
                    <th>
                        Correcta
                    </th>
                    <th>
                        Borrar
                    </th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        1
                    </td>
                    <td>
                        Agudo
                    </td>
                    <td>
                        Repasar material
                    </td>
                    <td>
                        <?= Html::checkbox('seleccionar'); ?>
                    </td>
                    <td>
                        <?= Html::a('X', '#'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        2
                    </td>
                    <td>
                        Recto
                    </td>
                    <td>
                        ¡Correcta!
                    </td>
                    <td>
                        <?= Html::checkbox('seleccionar', true); ?>
                    </td>
                    <td>
                        <?= Html::a('X', '#'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        3
                    </td>
                    <td>
                        Obtuso
                    </td>
                    <td>
                        Repasar material
                    </td>
                    <td>
                        <?= Html::checkbox('seleccionar'); ?>
                    </td>
                    <td>
                        <?= Html::a('X', '#'); ?>
                    </td>
                </tr>                
            </tbody>
        </table>
    </div>
    <div class="col-md-4 text-center" style="height: 150px">
        <button type="submit" class="btn btn-lg btn-primary" style="margin-top: 75px">Guardar</button>
    </div>
</div>
<?php
$this->registerJs("$('#dificultad').rating({language: 'es'})");
?>
