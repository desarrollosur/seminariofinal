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
                    <?= Html::dropDownList('categoria', 'Geometría', ['Geometría'], ['class'=>'form-control', 'id'=>'categoria']); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="subcategoria" class="col-sm-2 control-label">Subcategoría</label>
                <div class="col-sm-10">
                    <?= Html::dropDownList('subcategoria', 'Ángulos', ['Ángulos'],['class'=>'form-control', 'id'=>'subcategoria']); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
                <div class="col-sm-10">
                    <?= Html::textarea('subcategoria', 'Ejemplo descripción', ['Ángulos'],['class'=>'form-control', 'id'=>'descripcion', 'spellcheck'=>false]); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Sign in</button>
                </div>
            </div>
        </form>        
    </div>
    <div class="col-md-6">

    </div>

</div>
<?php

$this->registerJs("$('#dificultad').rating({language: 'es'})");

?>
