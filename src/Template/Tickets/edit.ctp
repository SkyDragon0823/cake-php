<div class="app-title">
    <div>
        <h1><i class="fa fa-ticket-alt"></i> Ticket</h1>
        <p>Registro tickets</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i>Tickets</li>
        <li class="breadcrumb-item"><a href="#">Editar Ticket</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-md-12">
                    <legend><?= __('Editar Ticket') ?></legend>
                    <hr>
                </div>
                <div class="col-lg-12">
                    <?= $this->Form->create($ticket,['class' => 'form-horizontal']) ?>
                        <div class="row">
                            <div class="col-lg-6">
                            <div id="totalPrint"></div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Coordinador</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('idCoordinador',['id' => 'coordinador','options' => $coordinadores,'class' => 'form-control js-example-responsive rdonly','label' => false, 'empty' => 'Coordinador']); ?>
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="control-label col-md-3">Cliente</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('idCliente',['disabled' => true,'id' => 'idCliente','options' => $clientes,'id'=>'idCliente','class' => 'rdonly form-control js-example-responsive', 'required' => true,'label' => false, 'empty' => 'Clientes']); ?>
                                    </div>
                                </div>
                                <div class="form-group row" id="sucursalAdd">
                                    <label class="control-label col-md-3">Sucursal</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('idSucursal',['id'=>'idSucursal','options' => $sucursales,'class' => 'form-control js-example-responsive rdonly', 'required' => true,'label' => false, 'empty' => 'Sucursal']); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Subcontrata</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('subcontrata',['options' => ['No','Si'],'id' => 'subcontrata','class' => 'form-control rdonly', 'empty' => 'Subcontrata','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row" id="subcontrataAdd" hidden>
                                    <label class="control-label col-md-3">Técnico Subcontratado</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('idTecnicoSub',['id' => 'idTecnicoSub','options' => $tSubcontrata,'class' => 'form-control js-example-responsive rdonly','label' => false, 'empty' => 'Técnico Subcontrata']); ?>
                                    </div>
                                </div>
                                <div class="form-group row" id="costoSubcontrataAdd" hidden>
                                    <label class="control-label col-md-3">Costo Subcontrata</label>
                                    <div class="col-auto col-md-8">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">$</div>
                                            </div>
                                            <?= $this->Form->control('costoTecnicoSub',['id' => 'costoTecnicoSub','class' => 'form-control rdonly','label' => false, 'empty' => 'Técnico Subcontrata']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" id="liderAdd">
                                    <label class="control-label col-md-3">Técnico Lider</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('idTecnicoLider',['id' => 'idTecnicoLider','options' => $tLider,'class' => 'form-control js-example-responsive rdonly','label' => false, 'empty' => 'Técnico lider']); ?>
                                    </div>
                                </div>
                                <div class="form-group row" id="cuadrillaAdd">
                                    <label class="control-label col-md-3">Cuadrilla</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('idTecnico',['id' => 'idTecnico','options' => $tecnicos,'class' => 'form-control js-example-basic-multiple rdonly','label' => false, 'multiple' =>'multiple']); ?>
                                    </div>
                                </div>
                                <div class="form-group row" id="vehiculoAdd">
                                    <label class="control-label col-md-3">Vehículo</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('idVehiculo',['options' => $vehiculos,'class' => 'form-control js-example-responsive rdonly','label' => false, 'empty' => 'Vehículos']); ?>
                                    </div>
                                </div>
                                <div class="form-group row" id="slasAdd">
                                    <label class="control-label col-md-3">Sla's</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('slas',['options' => $slas,'class' => 'form-control js-example-responsive rdonly','label' => false, 'empty' => 'Sla\'s']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Detalles de Servicio</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('descripcion',['class' => 'form-control rdonly','type' => 'textarea', 'placeholder' => 'Descripción','label' => false]); ?>
                                    </div>
                                </div>
                                <?php if($current_user['tipoUsuario'] != 5) : ?>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Fecha de Atención</label>
                                        <div class="col-md-8">
                                            <?= $this->Form->control('fechaAtencion',['id'=>'fechaAtencion','class' => 'form-control rdonly','label' => false]); ?>
                                        </div>
                                    </div>
                                <?php endif;?>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Folio de apertura</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('folioApertura',['class' => 'form-control rdonly', 'placeholder' => 'Folio de apertura','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Folio de cierre</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('folioCierre',['class' => 'form-control rdonly', 'placeholder' => 'Folio de cierre','label' => false]); ?>
                                    </div>
                                </div>
                                <?php if($current_user['tipoUsuario'] == 5 && $ticketInfo->estatus->id == 3) : ?>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Días de credito</label>
                                        <div class="col-md-8">
                                            <?= $this->Form->control('diasCredito',['class' => 'form-control ', 'placeholder' => 'Días de credito','label' => false]); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Estatus</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('estatus',['id' => 'estatusTicket','options' => $estatus,'class' => 'form-control rdonly', 'required' => true, 'placeholder' => 'estatus','label' => false]); ?>
                                    </div>
                                </div>
                                <?php if($current_user['tipoUsuario'] != 4 && $current_user['tipoUsuario'] != 3 && $current_user['tipoUsuario'] != 5 ) : ?>
                                    <?= $this->Form->control('gastototal',['hidden' => true,'id ' => 'gastototalTicket' ,'label' => false]); ?>
                                    <?= $this->Form->control('costoTotal',['hidden' => true,'id' => 'costoTotalTicket' ,'label' => false]); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if($current_user['tipoUsuario'] != 5 && $current_user['tipoUsuario'] != 4) : ?>
                            <div id="addServiciosTicket">
                                <hr>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group row col-md-4 ">
                                                <small class="form-text text-muted col-md-10 pl-0">Servicio *</small>
                                                <div class="col-md-10" id="addServicio">
                                                    <?= $this->Form->control('idProblemaReportado',['options' => $tabulador, 'id' => 'ticketIdServicio' ,'class' => 'form-control js-example-responsive','label' => false, 'empty' => 'Servicios']); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row col-md-2 formAddCantid">
                                                <small class="form-text text-muted col-md-12 pl-0">Cantidad *</small>
                                                <div class="col-md-8">
                                                    <input type="number" id="formAddServiceCantidad" placeholder="Cantidad">
                                                </div>
                                            </div>
                                            <div class="col-md-2 m-auto">
                                                <button type="button" onclick="serviceUpdate()" id="btnFormAddProducto" class="btn btn-primary"> <i class="fa fa-plus-circle fa-lg fa-fw"></i> Agregar</button>
                                            </div>
                                        </div>
                                    </div>
                                <legend>Servicios</legend>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover table-bordered" id="tablaServicios">
                                            <thead>
                                                <tr>
                                                    <th>Servicio</th>
                                                    <th class="formAddCantid">Cantidad</th>
                                                    <th style="width: 50px;">Acciones</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-primary" id="btnSaveServices"> Guardar Servicio/s</button>
                                            <button type="button" class="btn btn-primary deleteRow"> Eliminar Servicio/s</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tecnicosYservicios">
                                <hr>
                                <legend><?= __('Cuadrilla Registrada') ?></legend>
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                            <th>Técnicos</th>
                                            <th class="rdonlyhidde">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabCuadrillaRegist">
                                    </tbody>
                                </table>
                                <legend><?= __('Servicios Registrados') ?></legend>
                                <table class="table table-hover table-bordered mb-5" id="sampleTable">
                                    <thead>
                                        <tr>
                                            <th>Servicio</th>
                                            <th>Cantidad</th>
                                            <th class="rdonlyhidde">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabServiciosRegist">
                                    </tbody>
                                </table>
                            </div>
                        <?php endif;?>
                        <div class="tile-footer">
                            <?= $this->Html->link('<i class="fas fa-chevron-left fa-fw"></i> Regresar', ['action' => 'index'],['escape' => false, 'class' => 'btn btn-primary']) ?>
                            <?= $this->Form->button(_('<i class="fa fa-plus-circle fa-lg fa-fw"></i> Guardar'),['class' => 'btn btn-primary rdonlyhidde']); ?>
                            <?php if($current_user['tipoUsuario'] != 5): echo $this->Form->button(_('<i class="fas fa-envelope-open-text"></i> Correo'),['class' => 'btn btn-primary','data-toggle' => 'modal', 'data-target' => '#exampleModalLong','type' => 'button']); endif; ?>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
        </div>
    </div>
    <?php if($current_user['tipoUsuario'] != 3 && $current_user['tipoUsuario'] != 4) { ?>
        <?php foreach ($serviciosTicket as $serviciosTicket): ?>
            <div hidden class="subtotalServ"><?= $serviciosTicket->has('idServicio') ? $serviciosTicket->idServicio->costo * $serviciosTicket->cantidad : '' ?> <br></div>
        <?php endforeach; ?>
        <?php foreach ($cuadrillaTicket as $cuadrillaTicket): ?>
            <div hidden class="subtotalCuad"><?= $cuadrillaTicket->has('idTecnico') ? $cuadrillaTicket->idTecnico->sueldo : 0 ?> <br></div>
        <?php endforeach; ?>
        <?php foreach ($infoGastos as $infoGastos): ?>
            <div hidden class="subtotalGastos"><?= $infoGastos->has('montoTotal') ? $infoGastos->montoTotal : 0 ?> <br></div>
        <?php endforeach; ?>
    <?php }?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Correo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="prepararCorreo">
        <p>Estimado (a): 
            <br/>Te confirmo la presencia de mi personal para atención de servicio,
            <br/>Sucursal: <b> <?= $ticketInfo->has('idSucursal') ? $ticketInfo->idSucursal->sucursal : ''  ?> </b> , <?php if($ticketInfo->has('idSucursal') ? $ticketInfo->idSucursal->cr != null : ''){?>CR: <b><?= $ticketInfo->has('idSucursal') ? $ticketInfo->idSucursal->cr : ''   ?></b> <?php } ?>
            <br/>Nombre del Correo de Solicitud de Servicio: <b><?php ?></b>
            <br/>Cliente que Solicita: <b><?= $ticketInfo->has('idCliente') ? $ticketInfo->idCliente->nombre : '' ?></b>
            <br/>Dirección Sucursal: <b><?= $ticketInfo->has('idSucursal') ? $ticketInfo->idSucursal->direccion : '' ?></b>
        </p>

        <p>Fecha de Solicitud de Servicio:
            <b><?= $ticket->created->i18nFormat('dd-MM-yyyy hh:mm a') ?></b>
            <br/>Fecha de Atención: <b><?= $ticketInfo->has('fechaAtencion') ?  $ticketInfo->fechaAtencion->i18nFormat('dd-MM-yyyy') : '' ?></b>
            <br/>Hora de Atención: <b><?= $ticketInfo->has('fechaAtencion') ?  $ticketInfo->fechaAtencion->i18nFormat('hh:mm a') : '' ?></b>
            <br/>Nombre de Técnico (s):
            <br/>
            <b>
                <?php foreach ($cuadrilla as $cuadrilla): ?>
                    <?= $cuadrilla->has('idTecnico') ? $cuadrilla->idTecnico->nombre .' '. $cuadrilla->idTecnico->apellido1 .' '. $cuadrilla->idTecnico->apellido2 : '<b class="text-danger">Cuadrilla no asignada </b>'?> <br/>
                <?php endforeach; ?>
            </b>
        </p>

        <p>En base a tu solicitud y lo que me informan en sucursal el problema es el siguiente:
            <br/><b><?= $ticketInfo->has('descripcion') ? $ticketInfo->descripcion : '' ?></b>
        </p>
        <p>Se asigna por parte de BTV el Ticket: <b>#<?= $ticket->folio ?></b>
            <br/>Adjunto IFE para control de Acceso.
            <br/>Te mantendré informado en todo momento.
            <br/>Quedo a tus órdenes.
            <br/>Saludos.
        </p>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary copypaste" >Copiar</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<?= $this->Html->script(array('plugins/select2.min.js')) ?>
<script type="text/javascript">
$('document').ready(function(){
    getServicios();
    getCuadrilla();
    valSubcontrata();
    var sucursalLength = $('#idSucursal').children('option').length;
    if(sucursalLength == 1) {
        $('#idSucursal').removeAttr('required');
        $('#sucursalAdd').attr('hidden','hidden');
    }

    $(".js-example-basic-single").select2({
        width: 'resolve'
    });
    
    var dataCliente = $('#idCliente').val();
    
    if(dataCliente != ''){
        $('#ticketClientesForm').css('pointer-events','none');
        $('.hidden').removeAttr('hidden');
    }

    $('.select2.select2-container.select2-container--default').css('width','100%');


});

$('#estatusTicket').change(function(){
    getGastoCosto();
});

$(".js-example-responsive").select2({
    width: 'resolve' // need to override the changed default
});
$(".js-example-basic-multiple").select2({
    placeholder: "Selecciona un técnico"
});

function getGastoCosto(){
    var estatus = $('#estatusTicket').val(); 
    if(estatus == 3) {
        var totalServ = 0;
        $('.subtotalServ').each(function(){
            totalServ += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
        });
        
        var totalCuadr = 0;
        $('.subtotalCuad').each(function(){
            totalCuadr += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
            totalCuadr = totalCuadr || 0
        });
        
        var totalCuadrSubcon = $('#costoTecnicoSub').val();
        totalCuadrSubcon = totalCuadrSubcon || 0
        totalCuadrSubcon = parseFloat(totalCuadrSubcon);
        // $('#costoTecnicoSub').each(function(){
        //     totalCuadrSubcon += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
        //     totalCuadrSubcon = totalCuadrSubcon || 0
        // });
        
        var totalGa = 0;
        $('.subtotalGastos').each(function(){
            totalGa += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
            totalGa = totalGa || 0
        });

        totalGastos = 0;
        totalGastos = totalCuadr + totalCuadrSubcon + totalGa;

        $('#gastototalTicket').val(totalGastos);
        $('#costoTotalTicket').val(totalServ);
    }
}


function getServicios(){

    var data = <?= $ticket->id ?>;
    
    $.ajax({
        method: 'get',
        url : "<?= $this->Url->build( ['action' => 'getservicios' ] ); ?>",
        data: {keyword:data},
        success: function( response )
        {
            $('#tabServiciosRegist').html(response);
        }
    });
}

function getCuadrilla(){

    var data = <?= $ticket->id ?>;
    
    $.ajax({
        method: 'get',
        url : "<?= $this->Url->build( ['action' => 'getcuadrilla' ] ); ?>",
        data: {keyword:data},
        success: function( response )
        {
            $('#tabCuadrillaRegist').html(response);
        }
    });
}


function serviceUpdate() {
    serviceAddToTable();
    
    formClear();
}

function serviceAddToTable() {
    if ($("#tablaServicios tbody").length == 0) {
        $("#tablaServicios").append("<tbody id='tabServiciosAdd'></tbody>");
    }
    cliente = $('#idCliente').val();
    dataServ = $('#ticketIdServicio').val();

    if(dataServ == '') {
        Swal.fire({type:'error',text:'Completa el campo de servicios'});
        return false;
    }
    else {
        tablaData();
    }

    function tablaData() {
            $("#tablaServicios tbody").append(
                "<tr>" +
                    "<td hidden> <input name='idTicket' value='<?= $ticket->id ?>'> </td>" +
                    "<td> <input hidden name='idServicio' value='"+ $('#ticketIdServicio').val() +"' >" + $("#ticketIdServicio").find('option:selected').text() + "</td>" +
                    "<td> <input name='cantidad' value='"+ $('#formAddServiceCantidad').val() +"' >" +
                    "<td>" + "<input type='checkbox' name='record'>" +
                    "</td>" +
                "</tr>"
            );
    }
}

function formClear() {
    $("#ticketIdServicio").val("");
    $("#formAddServiceCantidad").val("");
}

$(".deleteRow").click(function(){
    $("#tablaServicios tbody").find('input[name="record"]').each(function(){
        if($(this).is(":checked")){
            $(this).parents("tr").remove();
        }
    });
});

$('#subcontrata').change(function(){
    valSubcontrata();
});

function valSubcontrata() {
    var subcontrata = $('#subcontrata').val();
    if(subcontrata == 1) {
        $('#liderAdd').attr('hidden','hidden');
        $('#idTecnicoLider').val('');
        $('#cuadrillaAdd').attr('hidden','hidden');
        $('#idTecnico').val('');
        $('#subcontrataAdd').removeAttr('hidden');
        $('#costoSubcontrataAdd').removeAttr('hidden');
        $('#vehiculoAdd').attr('hidden','hidden');
        $('#slasAdd').attr('hidden','hidden');
    } else {
        $('#liderAdd').removeAttr('hidden');
        $('#cuadrillaAdd').removeAttr('hidden');
        $('#subcontrataAdd').attr('hidden','hidden');
        $('#costoSubcontrataAdd').attr('hidden','hidden');
        $('#idTecnicoSub').val('');
        $('#costoTecnicoSub').val('');
        $('#vehiculoAdd').removeAttr('hidden');
        $('#slasAdd').removeAttr('hidden');
    }
}

function deleteCuadrilla(idTecnico) {
    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
    Swal.fire({
        title: '¿Esta seguro que desea eliminar al técnico?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Si, eliminar técnico',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.value) {
            $.ajax({
                headers: {
                'X-CSRF-Token': csrfToken
                },
                method: 'delete',
                url : "<?= $this->Url->build( ['controller' => 'Cuadrilla','action' => 'delete' ] ); ?>",
                data: {id:idTecnico},
                error: function () {
                    Swal.fire(
                        '¡Error!',
                        'Ocurrio un error al eliminar al técnico, Por favor intente de nuevo.',
                        'error'
                    )
                },
                success: function( )
                {
                    getCuadrilla();
                    Swal.fire(
                        '¡Eliminado!',
                        'El técnico fue eliminado.',
                        'success'
                    )
                }
            });
            
        }
    });
}

function deleteServicios(idServicio) {
    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
    Swal.fire({
        title: '¿Esta seguro que desea eliminar el servicio?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Si, eliminar servicio',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.value) {
            $.ajax({
                headers: {
                'X-CSRF-Token': csrfToken
                },
                method: 'delete',
                url : "<?= $this->Url->build( ['controller' => 'Serviciosticket','action' => 'delete' ] ); ?>",
                data: {id:idServicio},
                error: function () {
                    Swal.fire(
                        '¡Error!',
                        'Ocurrio un error al eliminar el servicio, Por favor intente de nuevo.',
                        'error'
                    )
                },
                success: function( )
                {
                    getGastoCosto();
                    getServicios();
                    Swal.fire(
                        '¡Eliminado!',
                        'El Servicio fue eliminado.',
                        'success'
                    )
                }
            });
            
        }
    });
}

$('#btnSaveServices').click(function() {
    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;

    var arr = $("#tablaServicios tr").get().map(function (tr) {
        return $('input', tr).get().reduce(function (obj, input) {
            obj[input.name.replace(/\[.*\]/,'')] = input.value;
            return obj;
        }, {});
    });

    $.ajax({
        headers: {
            'X-CSRF-Token': csrfToken
        },
        method: 'post',
        url : "<?= $this->Url->build( ['controller' => 'Serviciosticket','action' => 'addjs' ] ); ?>",
        data: {servicios:arr},
        error: function () {
            Swal.fire(
                '¡Error!',
                'Ocurrio un error al eliminar el servicio, Por favor intente de nuevo.',
                'error'
            )
        },
        success: function( )
        {
            getServicios();
            $('#tabServiciosAdd').empty();
            Swal.fire(
                '',
                'Los servicios se guardaron correctamente.',
                'success'
            );
            
        }
    });

});

if (<?=$ticket->estatus?> == 3) {
    $('.rdonlyhidde').attr('hidden','hidden');
    $('.rdonly').attr('disabled',true);
}
if (<?= $current_user['tipoUsuario'] ?> == 5) {
    $('#estatusTicket').removeAttr('disabled');
    $('.rdonlyhidde').removeAttr('hidden');
}

$('#estatus').change(function (){
    var idCoordniador =   $('#coordinador').val();
    var estatus = $('#estatus').val();
    switch (estatus) {
        case '2':
            if (idCoordniador == '' || idCoordniador == null) {
                Swal.fire('','No se puede cambiar de estatus sin un coordinador','error');
                $('#estatus').val(<?=$ticket->estatus?>);
                return false;
            }
            break;
        default:
            break;
    }
});


</script>