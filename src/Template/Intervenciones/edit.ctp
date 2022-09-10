<div class="app-title">
    <div>
        <h1><i class="fa fa-building"></i> Intervenciones</h1>
        <p>Registro Intervenciones</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i>Tickets</li>
        <li class="breadcrumb-item"><a href="#"> Intervenciones</a></li>
        <li class="breadcrumb-item"><a href="#"> Editar Intervención</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-md-12">
                    <legend><?= __('Editar Intervención') ?></legend>
                    <hr>
                </div>
                <div class="col-lg-12">
                    <?= $this->Form->create($intervencione,['class' => 'form-horizontal']) ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Ticket folio</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" readonly value="<?= $intervencione->idTicket->folio ?>">
                                        <?= $this->Form->control('idTicket',['hidden' => true,'class' => 'form-control', 'placeholder' => 'Problema','label' => false,'value' => $intervencione->idTicket->id]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Folio</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('folio',['class' => 'form-control', 'placeholder' => 'Problema','label' => false,'readonly' => true]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Subcontrata</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('subcontrata',['options' => ['No','Si'],'id' => 'subcontrata','class' => 'form-control', 'empty' => 'Subcontrata','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row" id="subcontrataAdd" hidden>
                                    <label class="control-label col-md-3">Técnico Subcontratado</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('idTecnicoSub',['id' => 'idTecnicoSub','options' => $tSubcontrata,'class' => 'form-control w-100','label' => false, 'empty' => 'Técnico Subcontrata']); ?>
                                    </div>
                                </div>
                                <div class="form-group row" id="liderAdd">
                                    <label class="control-label col-md-3">Técnico Lider</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('idTecnicoLider',['id' => 'idTecnicoLider','options' => $tLider,'class' => 'form-control js-example-responsive','label' => false, 'empty' => 'Técnico lider']); ?>
                                    </div>
                                </div>
                                <div class="form-group row" id="cuadrillaAdd">
                                    <label class="control-label col-md-3">Cuadrilla</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('idTecnico',['options' => $tecnicos,'class' => 'form-control js-example-basic-multiple','label' => false, 'multiple' =>'multiple']); ?>
                                    </div>
                                </div>
                                <div class="form-group row" id="vehiculoAdd">
                                    <label class="control-label col-md-3">Vehículo</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('idVehiculo',['options' => $vehiculos,'class' => 'form-control', 'required' => true, 'placeholder' => 'Vehículo','label' => false, 'empty' => 'Vehículos']); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Descripción del servicio</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('descripcion',['class' => 'form-control', 'required' => true, 'placeholder' => 'Descripción del servicio','label' => false,'type' => 'textarea']); ?>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Fecha de Atención</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('fechaAtencion',['class' => 'form-control','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Sla's</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('slas',['class' => 'form-control', 'required' => true, 'placeholder' => 'Slas','label' => false, 'empty' => 'Slas']); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Folio de apertura</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('folioApertura',['class' => 'form-control', 'placeholder' => 'Folio de apertura','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Folio de cierre</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('folioCierre',['class' => 'form-control', 'placeholder' => 'Folio de cierre','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Estatus</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('estatus',['options' => $estatus,'class' => 'form-control', 'required' => true, 'placeholder' => 'estatus','label' => false]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="addServiciosTicket">
                            <hr>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group row col-md-4 ">
                                            <small class="form-text text-muted col-md-10 pl-0">Servicio *</small>
                                            <div class="col-md-10" id="addServicio">
                                                <?= $this->Form->control('idProblemaReportado',['options' => $tabulador, 'id' => 'interIdServicio' ,'class' => 'form-control js-example-responsive','label' => false, 'empty' => 'Servicios']); ?>
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
                                <tbody id="tabInterCuadrillaRegist">
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
                                    <tbody id="tabInterServiciosRegist">
                                    </tbody>
                                </table>
                        </div>
                        <div class="tile-footer">
                            <?= $this->Html->link('<i class="fas fa-chevron-left fa-fw"></i> Intervenciones', ['action' => 'index'],['escape' => false, 'class' => 'btn btn-primary']) ?>
                            <?= $this->Form->button(_('<i class="fa fa-plus-circle fa-lg fa-fw"></i> Editar'),['class' => 'btn btn-primary']); ?>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
        </div>
    </div>
</div>
<?= $this->Html->script(array('plugins/select2.min.js')) ?>
<script type="text/javascript">
getServicios();
getCuadrilla();
valSubcontrata();
$(".js-example-responsive").select2({
    width: 'resolve' // need to override the changed default
});
$(".js-example-basic-multiple").select2({
    placeholder: "Selecciona un tecnico"
});

function serviceUpdate() {
    serviceAddToTable();
    formClear();
}

function formClear() {
    $("#interIdServicio").val("");
    $("#formAddServiceCantidad").val("");
}

function getServicios(){

    var data = <?= $intervencione->id ?>;

    $.ajax({
        method: 'get',
        url : "<?= $this->Url->build( ['action' => 'getservicios' ] ); ?>",
        data: {keyword:data},
        success: function( response )
        {
            $('#tabInterServiciosRegist').html(response);
        }
    });
}

function getCuadrilla(){

var data = <?= $intervencione->id ?>;

$.ajax({
    method: 'get',
    url : "<?= $this->Url->build( ['action' => 'getcuadrilla' ] ); ?>",
    data: {keyword:data},
    success: function( response )
    {
        $('#tabInterCuadrillaRegist').html(response);
    }
});
}


function serviceAddToTable() {
    if ($("#tablaServicios tbody").length == 0) {
        $("#tablaServicios").append("<tbody id='tabInterServiciosAdd'></tbody>");
    }
    
    dataServ = $('#interIdServicio').val();

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
                    "<td hidden> <input name='idIntervencion' value='<?= $intervencione->id ?>'> </td>" +
                    "<td> <input hidden name='idServicio' value='"+ $('#interIdServicio').val() +"' >" + $("#interIdServicio").find('option:selected').text() + "</td>" +
                    "<td> <input name='cantidad' value='"+ $('#formAddServiceCantidad').val() +"' >" +
                    "<td>" + "<input type='checkbox' name='record'>" +
                    "</td>" +
                "</tr>"
            );
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
            $('#tabInterServiciosAdd').empty();
            Swal.fire(
                '',
                'Los servicios se guardaron correctamente.',
                'success'
            )
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
        $('#vehiculoAdd').attr('hidden','hidden');
        $('#idVehiculo').val('');
        $('#subcontrataAdd').removeAttr('hidden');
    } else {
        $('#liderAdd').removeAttr('hidden');
        $('#cuadrillaAdd').removeAttr('hidden');
        $('#vehiculoAdd').removeAttr('hidden');
        $('#subcontrataAdd').attr('hidden','hidden');
        $('#idTecnicoSub').val('');
      
    }
}

</script>