<?php
$textoLorem = <<<EOL
        Lorem Ipsum is simply dummy text of the printing and typesetting 
        industry. Lorem Ipsum has been the industry's standard dummy text
        ever since the 1500s, when an unknown printer took a galley of type
        and scrambled it to make a type specimen book. It has survived not
        only five centuries, but also the leap into electronic typesetting
        remaining essentially unchanged. It was popularised in the 1960s with
        the release of Letraset sheets containing Lorem Ipsum passages, 
        and more recently with desktop publishing software like Aldus PageMaker
        including versions of Lorem Ipsum
        EOL;

use yii\bootstrap\Html;

/* @var $this yii\web\View */
$this->title = 'Nuevo Cuestionario';
$this->params['breadcrumbs'][] = ['label' => 'Cuestionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .modal-dialog {
        position: absolute;
        top: -10px;
        right: -850px;
        bottom: 0;
        left: 0;
        z-index: 10040;
        overflow: auto;
        overflow-y: auto;
    }
    .modal-backdrop {
        opacity: 0.2 !important;
    }
</style>
<div class="text-center"><h1>Nuevo Cuestionario</h1></div>

<div class="row">
    <div class="col-md-3">
        <label for="descripcion">Descripción</label>
        <?= Html::textarea('descripcion', $textoLorem, ['id' => 'descripcion', 'spellcheck' => false]); ?>
    </div>
    <div class="col-md-6">
        <div class="row">
            <?=
            Html::button('Nueva Actividad', [
                'data-toggle' => 'modal', 'data-target' => '#myModal'
            ]);
            ?>
        </div>
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            Actividad
                        </th>
                        <th>
                            Descripción
                        </th>
                        <th>
                            Quitar
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            Actividad 1
                        </td>
                        <td>
                            Descripción de la actividad 1
                        </td>
                        <td>
<?= Html::a('X', '#'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Actividad 2
                        </td>
                        <td>
                            Descripción de la actividad 2
                        </td>
                        <td>
<?= Html::a('X', '#'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Actividad 3
                        </td>
                        <td>
                            Descripción de la actividad 3
                        </td>
                        <td>
<?= Html::a('X', '#'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Actividad 4
                        </td>
                        <td>
                            Descripción de la actividad 4
                        </td>
                        <td>
<?= Html::a('X', '#'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Actividad 1
                        </td>
                        <td>
                            Descripción de la actividad 5
                        </td>
                        <td>
<?= Html::a('X', '#'); ?>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="row">
<?= Html::button('Crear Cuestionario'); ?>
        </div>        
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Buscar actividades</h4>
            </div>
            <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                    Categoría  
                                </th>
                                <th>
                                    Subcategoría
                                </th>
                                <th>
                                    Descripción
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                  <?= Html::dropDownList('categoria', 'Geometría', ['Geometría']); ?>
                                </td>
                                <td>
                                  <?= Html::dropDownList('subcategoria', 'Ángulos', ['Ángulos']); ?>
                                </td>
                                <td>
                                  <?= Html::textInput('descripcion'); ?>
                                </td>
                            </tr>
                        </tbody>                      
                    </table>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                    Actividad  
                                </th>
                                <th>
                                    Descripción
                                </th>
                                <th>
                                    Seleccionar
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Actividad 1
                                </td>
                                <td>
                                    Descripción Actividad 1
                                </td>
                                <td>
                                    <?= Html::checkbox('seleccionar'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Actividad 2
                                </td>
                                <td>
                                    Descripción Actividad 2
                                </td>
                                <td>
                                    <?= Html::checkbox('seleccionar'); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <div class="modal-footer">
                <div class="text-left">
                <button type="button" class="btn btn-default" data-dismiss="modal">Seleccionar</button>
                <button type="button" class="btn btn-primary">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>