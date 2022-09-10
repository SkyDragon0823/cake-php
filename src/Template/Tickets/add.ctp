<div class="app-title">
    <div>
        <h1><i class="fa fa-ticket-alt"></i> Nuevo Ticket</h1>
        <p> Registro tickets</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> Tickets</li>
        <li class="breadcrumb-item"><a href="#"> Registro</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-md-12">
                    <legend><?= __('Nuevo Ticket') ?></legend>
                    <hr>
                </div>
                <div class="col-lg-12">
                    <?= $this->Form->create($ticket,['class' => 'form-horizontal','id' => 'formAddTickets']) ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <?= $this->Form->control('idSolicitante',['hidden' => true, 'value' => $current_user['id'], 'label' => false]) ?>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Cliente <span class="text-danger">*</span></label>
                                    <div class="col-md-8" id="ticketClientesForm">
                                        <?php if($current_user['tipoUsuario'] == 2 || $current_user['tipoUsuario'] == 1 ) :?>
                                            <?= $this->Form->control('idCliente',['id' => 'ticketIdCliente','options' => $clientes,'class' => 'form-control js-example-basic-single', 'required' => true,'label' => false, 'empty' => 'Clientes']); ?>
                                        <?php endif;?>
                                        <?php if($current_user['tipoUsuario'] == 4) :?>
                                            <?= $this->Form->control('idCliente',['id' => 'ticketIdCliente','options' => $clientes,'class' => 'form-control js-example-basic-single', 'required' => true,'label' => false, 'empty' => 'Clientes', 'value' => $current_user['idCliente']]); ?>
                                        <?php endif;?>
                                    </div>
                                </div>
                                <div class="form-group row hidden" hidden>
                                    <label class="control-label col-md-3">Folio</label>
                                    <div class="col-md-8" id="folioTicketFrom">
                                    </div>
                                </div>
                                <div class="form-group row hidden" id="idSucursalh" hidden>
                                    <label class="control-label col-md-3">Sucursal <span class="text-danger">*</span></label>
                                    <div class="col-md-8" id="addSucursal">
                                    </div>
                                </div>
                                <?php if($current_user['tipoUsuario'] == 2) : ?>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Coordinador</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" value="<?= $current_user['nombre'] . ' ' . $current_user['apellido1'] ?>" readonly>
                                            <?= $this->Form->control('idCoordinador',['hidden' => true, 'value' => $current_user['id'], 'label' => false]) ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Detalles de Servicio</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('descripcion',['class' => 'form-control', 'placeholder' => 'Descripción','label' => false,'type' => 'textarea']); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Folio de apertura</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('folioApertura',['class' => 'form-control','placeholder' => 'Folio de apertura','label' => false]); ?>
                                    </div>
                                </div>
                                <?= $this->Form->control('estatus',['hidden' => true, 'value' => 1, 'label' => false]) ?>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <?= $this->Html->link('<i class="fas fa-chevron-left fa-fw"></i> Regresar', ['action' => 'index'],['escape' => false, 'class' => 'btn btn-primary']) ?>
                            <?= $this->Form->button(_('<i class="fa fa-plus-circle fa-lg fa-fw"></i> Guardar'),['class' => 'btn btn-primary']); ?>
                            <!-- <button id="btnSaveAll" type="button"></button> -->
                        </div>
                    <?= $this->Form->end() ?>
                </div>
        </div>
    </div>
</div>
<?= $this->Html->script(array('plugins/select2.min.js')) ?>
<script type="text/javascript">
$('document').ready(function(){

    $(".js-example-basic-single").select2({
        width: 'resolve'
    });
    
    var dataCliente = $('#ticketIdCliente').val();
    if(dataCliente != ''){
        $('#ticketClientesForm').css('pointer-events','none');
        getFolio();
        getSucursal();
        getServicio();
        $('.hidden').removeAttr('hidden');
    }

    $('#ticketIdCliente').change(function(){
        
        var data = $('#ticketIdCliente').val()
        if (data == ''){
            $('.hidden').attr('hidden','hidden');
            getClient();
            return false;
        } else{
            getSucursal();
            $('.hiddenCliente').attr('hidden','hidden');
            $('.hiddenSucursal').attr('hidden','hidden');
        }
        getClient();
        getFolio();
        if(data == 1 || data == 2) {
        }
        else{
            getServicio();
        }
        $('.hidden').removeAttr('hidden');
    });
    
    $('#formTipoSucursal').change(function(){
        getSucursal();
    });


    function clienteIndirecto(){
        var data = $('#ticketIdCliente').val()
        $.ajax({
            method: 'get',
            url : "<?= $this->Url->build( ['action' => 'clienteindirecto' ] ); ?>",
            data: {keyword:data},
            success: function( response )
            {
                $('#addclienteIndirecto').html(response);
            }
        });
    }

    function getSucursal(){
        var data = $('#ticketIdCliente').val();
        var dataTipo = $('#formTipoSucursal').val();
        
            $.ajax({
                method: 'get',
                url : "<?= $this->Url->build( ['action' => 'dropdown' ] ); ?>",
                data: {keyword:data,tipoSucursal:dataTipo},
                success: function( response )
                {
                    $('#addSucursal').html(response);
                    sucursaulCount();
                }
            });
    }
    
    function getServicio(){
        var data = $('#ticketIdCliente').val();
        data == 2 ? data = 1 : data;
        $.ajax({
            method: 'get',
            url : "<?= $this->Url->build( ['action' => 'dropdowntab' ] ); ?>",
            data: {keyword:data},
            success: function( response )
            {
                $('#addServicio').html(response);
            }
        });
    }
    
    function getFolio(){
        var data = $('#ticketIdCliente').val()
        $.ajax({
            method: 'get',
            url : "<?= $this->Url->build( ['action' => 'getfolio' ] ); ?>",
            data: {keyword:data},
            success: function( response )
            {
                $('#folioTicketFrom').html(response);
            }
        });
    }

    $('#addSucursal').change( function(){

        dataSucursal = $('#addSucursal').val();
        
        $.ajax({
            method: 'get',
            url : "<?= $this->Url->build( ['action' => 'getsucursal' ] ); ?>",
            data: {keyword:dataSucursal},
            success: function( response )
            {
                $('#addSucursalDireccion').html(response);
            }
        });
    });

});

function sucursaulCount() {
    var sucursalLength = $('#ticketIdSucursal').children('option').length;
    if(sucursalLength ==  1){
        $('#ticketIdSucursal').removeAttr('required');
        $('#idSucursalh').attr('hidden','hidden');
    }
} 

//#region agregar servicios
    function getClient(){
        dataCliente = $('#ticketIdCliente').val();
        dataCliente == 2 ? dataCliente = 1 : dataCliente;
        if(dataCliente == '' || dataCliente == 1 ){
             $('#addServiciosTicket').attr('hidden','hidden')
        }
        else{
            $('#addServiciosTicket').removeAttr('hidden')
        }
    }

    // function serviceUpdate() {
    //     serviceAddToTable();
        
    //     formClear();

    //     $("#tablaServicios").focus();
    // }

    // function serviceAddToTable() {
    //     // First check if a <tbody> tag exists, add one if not
    //     if ($("#tablaServicios tbody").length == 0) {
    //         $("#tablaServicios").append("<tbody></tbody>");
    //     }
    //     cliente = $('#ticketIdCliente').val();
    //     dataServ = $('#ticketIdServicio').val();
    //     dataTipo = $('#formAddServiceTipo').val();
    //     dataCantidad = $('#formAddServiceCantidad').val();

    //     function tablaData() {
    //         if(cliente == 3) {
    //             $("#tablaServicios tbody").append(
    //                 "<tr>" +
    //                     "<td> <input hidden name='idServicio' value='"+ $('#ticketIdServicio').val() +"' >"  + $('#ticketIdServicio').find('option:selected').text() + "</td>" +
    //                     "<td> <input hidden name='tipoServicio' value='"+ $('#formAddServiceTipo').val() +"' >" + $("#formAddServiceTipo").find('option:selected').text() + "</td>" +
    //                     "<td> <input hidden name ='cantidad' value='"+ $('#formAddServiceCantidad').val() +"' >" + $("#formAddServiceCantidad").val() + "</td>" +
    //                     "<td>" + "<input type='checkbox' name='record'>" +
    //                     "</td>" +
    //                 "</tr>"
    //             );
    //         } else {
    //             $("#tablaServicios tbody").append(
    //                 "<tr>" +
    //                     "<td> <input hidden name='idServicio' value='"+ $('#ticketIdServicio').val() +"' >" + $("#ticketIdServicio").find('option:selected').text() + "</td>" +
    //                     "<td>" + "<input type='checkbox' name='record'>" +
    //                     "</td>" +
    //                 "</tr>"
    //             );
    //         }
    //     }

    //     if(cliente == 3){
    //         if(dataServ == null || dataServ == '' || dataTipo == '' || dataCantidad == '' ) {
    //             Swal.fire({type:'error',text:'Completa todos los campos'});
    //             return false;
    //         }
    //         else {
    //             tablaData();
    //         }
    //     } else {
    //         if(dataServ == '') {
    //             Swal.fire({type:'error',text:'Completa el campo de servicios'});
    //             return false;
    //         } else {
    //             tablaData();
    //         }
    //     }
        
    // }

    // function formClear() {
    //     $("#formAddServiceTipo").val("");
    //     $("#ticketIdServicio").val("");
    //     $("#formAddServiceCantidad").val("");
    // }

    // $(".deleteRow").click(function(){
    //     $("#tablaServicios tbody").find('input[name="record"]').each(function(){
    //         if($(this).is(":checked")){
    //             $(this).parents("tr").remove();
    //         }
    //     });
    // });
//#endregion

</script>