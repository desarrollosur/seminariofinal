<?php

use app\models\Actividad;
use app\models\Cuestionario;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\web\View;

/** @var Cuestionario $model */
/** @var Actividad $preguntaActual */
/** @var View $this */
?>
<div class="text-center" style="margin-bottom: 20px">
    <h1>Realizando Cuestionario #<?= $cuestionario->id?> </h1>
</div>
<div id="wizard" role="application" class="wizard clearfix vertical">
    <div class="content clearfix">
        <h3 id="wizard-h-0" tabindex="-1" class="title current">Step 1 Title</h3>
        <section id="wizard-p-0" role="tabpanel" aria-labelledby="wizard-h-0" class="body current" aria-hidden="false">
            <h5 class="bd-wizard-step-title">Pregunta #<?= $preguntaActual->id ?></h5>
            <h2 class="section-heading"><?= $preguntaActual->descripcion ?> </h2>
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= Url::to(['actividad/imagen-actividad', 'id'=>$preguntaActual->id])?>" style='height: 100%; width: 100%; object-fit: contain'/> 
                </div>
                <div class="col-md-6 vcenter">
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
                                    Elección
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             foreach($preguntaActual->actividadOpcions as $opcion){
                                 /** @var ActividadOpcion $opcion */
                            ?>
                            <tr>
                                <td>
                                    <?= $opcion->id ?>
                                </td>
                                <td>
                                    <?= $opcion->pregunta ?>
                                </td>
                                <td>
                                    <?= Html::radio("opcion", false, ['value'=>$opcion->id]); ?>
                                </td>
                            </tr>
                            <?php
                             }
                            ?>
                        </tbody>
                    </table>
                </div>             
            </div>
        </section>
    </div>
    <div class="actions clearfix">
        <ul role="menu" aria-label="Pagination">
            <li class="disabled" aria-disabled="true"><a href="#previous" role="menuitem">Previous</a></li>
            <li aria-hidden="false" aria-disabled="false"><button class="btn btn-primary" onclick="siguientePregunta(event)">Siguiente </button></li>
            <li style="display: none;" aria-hidden="true"><a href="#finish" role="menuitem">Finish</a></li>
        </ul>
    </div>
</div>

<script>
    function siguientePregunta(e){
        const valor = $("input[name='opcion']:checked").val();
        if(!valor){
            e.preventDefault();
            alert('seleccione un valor');
            return false;
        }
        const url = '<?= Url::to(['siguiente-pregunta', 'cuestionario'=>$cuestionario->id])?>';
        $.post(url, {valor: valor});
    }
</script>