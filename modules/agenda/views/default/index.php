<?php
/* @var $this yii\web\View */
$this->registerAssetBundle(\app\assets\FullCalendarAsset::class);

$this->title = 'Cadejur - Agenda';
?>
<style>
    .modificado {
        background: #85c1e9 !important;
    }
</style>

<script>
   
    
    let horariosMedicoServicioActual = [];
    let calendar;

    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'es',
            plugins: ['dayGrid', 'interaction'],
            events: {
                url: '/api/evento/index',
                extraParams: function () { // a function that returns an object
                    if(horariosMedicoServicioActual.length<1){
                        return {};
                    }
                    const primerRegistro = horariosMedicoServicioActual[0];

                    return {
                        s: primerRegistro.servicioid,
                        m: primerRegistro.medicoid
                    };
                },

            },
            dayRender: function (dayRenderInfo) {
                let dia = parseInt(moment(dayRenderInfo.date).format('e')) + 1;
                let td = dayRenderInfo.el;
                horariosMedicoServicioActual.forEach(function(horario){
                     if(dia == horario.dia_semana){
                         td.classList.add('modificado')
                     }    
                });
            },
            eventClick: function (info) {
                //alert('Event: ' + info.event.title);
                //alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                //alert('View: ' + info.view.type);

                // change the border color just for fun
                //info.el.style.borderColor = 'red';
                abrirFormularioEdicionEvento(info.event);


            },
            dateClick: function (info) {
                if(horariosMedicoServicioActual.length < 1 ){
                    alert('Debe seleccionar un médico');
                    return;
                }
                
                abrirFormularioNuevoEvento(info.dateStr);
                //$('#myModal').modal('show');                
                //alert('Clicked on: ' + info.dateStr);
                //alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                //alert('Current view: ' + info.view.type);
                // change the day's background color just for fun
                //info.dayEl.style.backgroundColor = 'red';
            }
        });

        calendar.render();
    });
    
    function abrirFormularioNuevoEvento(dia){
        const primerRegistro = horariosMedicoServicioActual[0];
        const nombreMedico = primerRegistro.medico.persona.apellido || 'S/I';
        const nombreServicio = primerRegistro.servicio.descripcion || 'S/I';
        const textoTitulo = 'Nuevo turno para ' + nombreMedico+ ' en el servicio ' + nombreServicio; 
        $('#myModalLabel').html(textoTitulo);
        $('#eventoid').val(''); // lo seteo en nulo porque es un agregado
        $('#diaseleccionado').val(dia);
        $('#descripcionDia').html(moment(dia).format('DD/MM/YYYY'))
        $('#medicoid').val(primerRegistro.medicoid);
        $('#servicioid').val(primerRegistro.servicioid);
        $('#btnCancelarEvento').hide();

        $('#myModal').modal('show');                

    }
    
    function abrirFormularioEdicionEvento(evento){
                console.log(evento);
                console.log(evento.extendedProps);
                const infoEvento = evento.extendedProps.adicionales;
                const primerRegistro = horariosMedicoServicioActual[0];
                const nombreMedico = primerRegistro.medico.persona.apellido || 'S/I';
                const nombreServicio = primerRegistro.servicio.descripcion || 'S/I';
                const textoTitulo = 'Editando turno ' + nombreMedico+ ' en el servicio ' + nombreServicio; 
                $('#myModalLabel').html(textoTitulo);
                $('#eventoid').val(infoEvento.id); // lo seteo en nulo porque es un agregado
                $('#diaseleccionado').val(moment(infoEvento.fechahora_desde).format('YYYY-MM-DD'));
                $('#horario').val(moment(infoEvento.fechahora_desde).format('HHmm'))
                $('#descripcionDia').html(moment(infoEvento.fechahora_desde).format('DD/MM/YYYY'))
                $('#medicoid').val(infoEvento.medicoid);
                $('#servicioid').val(infoEvento.servicioid);
                $('#pacienteid').val(infoEvento.pacienteid);
                $('#version').val(infoEvento.version)
                $('#btnCancelarEvento').show();

                $('#myModal').modal('show');
    }
    
    
    function actualizarAgenda(servicio, medico){
        $(".list-group-item").removeClass("active");
        $(window.event.target).addClass("active");
        $.ajax({
            dataType: "json",
            url: '/api/evento/medico-servicio-info',
            data: {s:servicio, m:medico},
            success: function(data){
                horariosMedicoServicioActual = data;
                calendar.changeView('dayGrid'); // la única forma que encontre para forzar el day render
                calendar.changeView('dayGridMonth');
                calendar.refetchEvents()
                //console.log(data)
            },
            error: function(data){
                console.log(data);
                alert('error');
            }
        });
    }
    
    function guardarCambios(){
        const data = $('#formularioEvento').serialize();
        $.ajax({
            method: 'post',
            dataType: "json",
            url: '/api/evento/guardar-cambios',
            data: data,
            success: function(data){
                calendar.refetchEvents()
                $('#myModal').modal('hide');
                
                alert('ok');
                //console.log(data)
            },
            error: function(data){
                console.log(data);
                alert('error');
            }
        });        
    }
    
    function cancelarEvento(){
        idevento = $('#eventoid').val(); // lo seteo en nulo porque es un agregado
        versionevento = $('#version').val(); // lo seteo en nulo porque es un agregado
        
        $.ajax({
            method: 'post',
            dataType: "json",
            url: '/api/evento/cancelar-evento',
            data: {
                eventoid: idevento,
                version: versionevento
            },
            success: function(data){
                calendar.refetchEvents()
                $('#myModal').modal('hide');
                
                alert('ok');
                //console.log(data)
            },
            error: function(data){
                console.log(data);
                alert('error');
            }
        });       
    }

</script>
<div>
    <div class="col-md-3">
        <?php
        foreach($servicios as $servicio):
            /** @var app\models\Servicio $servicio */
        ?>
        <div class="panel panel-default">
            <div class="panel-heading"><?= $servicio->descripcion ?></div>
            <div class="panel-body">
                <div class="list-group">
                    <?php
                        foreach($servicio->medicosEnServicio as $medico):
                            /** @var app\models\Medico $medico */
                    ?>
                    <button type="button" class="list-group-item" onclick="actualizarAgenda(<?= $servicio->id.','.$medico->personaid ?>)"><?= $medico->persona->apellido ?></button>
                    <?php
                        endforeach; // fin de médicos
                    ?>
                </div>
            </div>
        </div>
        <?php endforeach; // fin de servicios ?>
    </div>
    <div class="col-md-9" id='calendar'></div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
          <form id="formularioEvento">
              <input type="hidden" id="eventoid" name="eventoid">
              <input type="hidden" id="diaseleccionado" name="diaseleccionado">
              <input type="hidden" id="medicoid" name="medicoid">
              <input type="hidden" id="servicioid" name="servicioid">
              <input type="hidden" id="version" name="version">
              <div>
                <span id="descripcionDia">DD/MM/AAAA</span>
                <select id="horario" name="horario">
                    <option value="1000">10:00</option>
                    <option value="1100">11:00</option>
                    <option value="1200">12:00</option>
                </select>
              </div>
              <div>
                <?=
                   yii\bootstrap\Html::dropDownList('pacienteid', '',
                           yii\helpers\ArrayHelper::map(
                                   \app\models\Paciente::find()->where(['activo'=>1])->all(),
                                   'personaid',
                                   function(\app\models\Paciente $p){
                                        return $p->persona->apellido;
                                   }
                           ), 
                           [
                               'prompt'=>'Elija un paciente',
                               'id'=>'pacienteid'
                           ]
                           )
                ?>
              </div>    
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <button type="button" class="btn btn-primary" id="btnGuardarCambiosEvento" onclick="guardarCambios()">Guardar</button>
        <button type="button" class="btn btn-danger" id="btnCancelarEvento" onclick="cancelarEvento()">CANCELAR</button>
      </div>
    </div>
  </div>
</div>