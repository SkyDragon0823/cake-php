<?= $this->Froala->plugin();?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-ticket-alt"></i> Tickets</h1>
        <p> Detalles Ticket</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> Tickets</li>
        <li class="breadcrumb-item"><a href="#"> Detalles</a></li>
    </ul>
</div>
<div class="row">
<?php if($current_user['tipoUsuario'] == 5) :?>
<div class="position-fixed p-2 alert alert-danger" style="z-index:999;right:0;top:131px"> <h5>Estatus: <?= $ticket->estatus->estatus ?>  </h5> </div>
<?php endif;?>
    <div class="col-md-12">
        <div class="tile">
            <section class="invoice">
                <div class="row mb-4">
                    <div class="col-6">
                        <input type="text" id="ticketIdComent" hidden value="<?= $ticket->id ?>">
                        <input type="text" id="autorComent" hidden value="<?= $current_user['id'] ?>">
                        <h4 class="page-header"> <?= $ticket->idCliente->nombre ?> </h4>
                    </div>
                    <div class="col-6">
                        <h5 class="text-right">Folio:  <?= $ticket->folio ?></h5>
                    </div>
                </div>
                <div class="row invoice-info">
                    <div class="col-4">
                        <p><b>Sucursal:</b> <?= $ticket->has('idSucursal') ? $ticket->idSucursal->cr .'-'. $ticket->idSucursal->sucursal : '<b class="text-danger">Sucursal no asignada </b>'?></p>
                    </div>
                    <div class="col-8">
                        <p><b>Dirección:</b> <?= $ticket->has('idSucursal') ? $ticket->idSucursal->direccion : '<b class="text-danger">Dirección no registrada </b>'?></p>
                    </div>
                    <div class="col-4">
                        <p><b>Coordiador:</b> <?= isset($coordinador) ? $coordinador : '<b class="text-danger">Coordinador no asignado </b>'?>  </p>
                    </div>
                    <?php if($current_user['tipoUsuario'] != 5) { ?>
                    <div class="col-4">
                        <p>
                            <b>Cuadrilla:</b><br>
                            <?php if(iterator_count($cuadrilla)){ ?>
                                <?php foreach ($cuadrilla as $cuadrilla): ?>
                                    <?= $cuadrilla->idTecnico->nombre .' '. $cuadrilla->idTecnico->apellido1 .' '. $cuadrilla->idTecnico->apellido2?> <br>
                                <?php endforeach; ?>
                            <?php } else {?>
                                <b class="text-danger">Cuadrilla no asignada </b>
                            <?php } ?>
                        </p>
                    </div>
                    <div class="col-4">
                        <p>
                            <b>Servicio:</b> <br>
                            <?php if(iterator_count($serviciosAsig)){ ?>
                                <?php foreach ($serviciosAsig as $serviciosAsig): ?>
                                    <?=  $serviciosAsig->has('tipoServicio') ? $serviciosAsig->tipoServicio->servicio : '' .' - ' . $serviciosAsig->idServicio->descripcion .' - Cantidad: '.  $serviciosAsig->cantidad ?> <br>
                                <?php endforeach; ?>
                            <?php } else {?>
                                <b class="text-danger">Servicio no asignado </b>
                            <?php } ?>
                        </p>
                    </div>
                    <div class="col-12">
                        <p><b>Descripción:</b> <?= $ticket->descripcion?> </p>
                    </div>
                    <div class="col-4">
                        <p><b>Vehículo:</b> <?= $ticket->has('idVehiculo') ? ' <b>Marca:</b> '. $ticket->idVehiculo->marca .' <b>Modelo:</b> '. $ticket->idVehiculo->modelo .' <b>Placa:</b> '. $ticket->idVehiculo->placa : '<b class="text-danger">Vehículo no asignado </b>'?></p>
                    </div>
                    <div class="col-4">
                        <p><b>Folio Apertura:</b> <?= $ticket->folioApertura ?></p>
                    </div>
                    <div class="col-4">
                        <p><b>Folio Cierre:</b> <?= $ticket->folioCierre ?></p>
                    </div>
                    <div class="col-4">
                        <p><b>Solicito:</b> <?= $ticket->idSolicitante->nombre .' '. $ticket->idSolicitante->apellido1 .' '. $ticket->idSolicitante->apellido2  ?></p>
                    </div>
                    <div class="col-4">
                        <p><b>Estatus:</b> <?= $ticket->estatus->estatus ?>  </p>
                    </div>
                    <?php } else{ ?>
                        <div class="col-12">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                            <th>Servicios</th>
                                            <th width="150px">Cantidad</th>
                                            <th width="150px">Costo unitario</th>
                                            <th width="150px">Costo Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(iterator_count($serviciosAsig)) : ?>
                                            <?php foreach ($serviciosAsig as $serviciosAsig): ?>
                                                <tr>
                                                    <td><?=  $serviciosAsig->has('idServicio') ? $serviciosAsig->idServicio->descripcion : '' ?> <br></td>
                                                    <td><?=  $serviciosAsig->has('cantidad') ? $serviciosAsig->cantidad : '' ?> <br></td>
                                                    <td><?=  $serviciosAsig->has('idServicio') ? '$'. $serviciosAsig->idServicio->costo : '' ?> <br></td>
                                                    <td class="subtotalServ"><?= $serviciosAsig->has('idServicio') ? $serviciosAsig->idServicio->costo * $serviciosAsig->cantidad : '' ?> <br></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                    <tfoot style="border: 1px solid white;">
                                        <tr>
                                            <th style="border:none!important"></th><th style="border:none!important"></th>
                                            <th>Subtotal</th>
                                            <th id="subTotalPrint">$</th>
                                        </tr>
                                        <tr>
                                            <th style="border:none!important"></th><th style="border:none!important"></th>
                                            <th>Iva</th>
                                            <th id="ivaPrint">$</th>
                                        </tr>
                                        <tr>
                                            <th style="border:none!important"></th><th style="border:none!important"></th>
                                            <th>Total</th>
                                            <th id="totalPrint">$</th>
                                        </tr>
                                    </tfoot>
                            </table>
                    </div>
                    
                    <?php } ?>
                </div>
                <?php if($current_user['tipoUsuario'] != 4 && $current_user['tipoUsuario'] != 3) { 
                    if($ticket->estatus->id == 1 || $ticket->estatus->id == 2) { ?>
                        <div class="row d-print-none mt-2">
                            <div class="col-12 text-right">
                                <?= $this->Html->link('<i class="far fa-edit"></i> Editar', ['action' => 'edit', $ticket->id],['class' => 'btn btn-primary','rel' => 'tooltip', 'escape' => false]) ?>
                            </div>
                        </div>
                <?php } } ?>
            </section>
        </div>
    </div>
</div>
<?php if($current_user['tipoUsuario'] != 5) : ?>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <section class="invoice">
                <div class="row">
                    <div class="mb-4 col-md-12">
                        <h4 class="page-header"> INTERVENCIONES </h4>
                    </div>
                    <div class="col-12 table-responsive">
                        <?php if(isset($intervenciones)) {?>
                            <table class="table table-striped" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>Folio intervencion</th>
                                        <th>Descripción</th>
                                        <th>Estatus</th>
                                        <?php if($current_user['tipoUsuario'] == 1 || $current_user['tipoUsuario'] == 2) : ?>
                                            <th>Acciones</th>
                                        <?php endif;?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($intervenciones as $intervencion): ?>
                                        <tr>
                                            <td><?= $intervencion->folio ?></td>
                                            <td><?= $intervencion->descripcion ?></td>
                                            <td><?= $intervencion->estatus->estatus ?></td>
                                            <td>
                                                <?php if($current_user['tipoUsuario'] != 4) { if($current_user['tipoUsuario'] == 1 || $current_user['tipoUsuario'] == 2) : ?>
                                                    <?= $this->Html->link('<i class="far fa-edit"></i>', ['controller' => 'intervenciones','action' => 'edit', $intervencion->id],['rel' => 'tooltip', 'escape' => false]) ?>
                                                <?php endif; }?>
                                                <!-- <?= $this->Html->link('<i class="far fa-file-alt" data-toggle="tooltip" data-placement="top" title="Agregar reportes"></i>', ['controller' => 'Reportetecnico','action' => 'add', $intervencion->id],['rel' => 'tooltip', 'escape' => false]) ?>
                                                <?= $this->Html->link('<i class="fa fa-dollar-sign" data-toggle="tooltip" data-placement="top" title="Agregar gastos"></i>', ['controller' => 'gastos','action' => 'add', $intervencion->id],['rel' => 'tooltip', 'escape' => false]) ?> -->
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        <?php } else {?>
                            <div class="row mb-4">
                                <div class="col-3">
                                    <h5 class="font-weight-normal">No hay intervenciones asignadas</h5>
                                </div>
                                <?php if($ticket->estatus->id == 2) { ?>
                                    <div class="col-6">
                                    <?= $this->Html->link('<i class="far fa-edit"></i> Agregar Intervención', ['controller' => 'intervenciones','action' => 'add', $ticket->id],['class' => 'btn btn-primary','rel' => 'tooltip', 'escape' => false]) ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php endif; 
if ($current_user['tipoUsuario'] != 3) :?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <section class="invoice">
                    <div class="row">
                        <div class="mb-4 col-md-12">
                            <h4 class="page-header"> COMENTARIOS </h4>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12 m-1 mb-4" id="coments">
                            </div>
                            <textarea name="comentario" id="comentarios"></textarea>
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <button type="button" id="btnComment" class="btn btn-primary"> Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
<?php endif; ?> 
<?= $this->Html->script(array('plugins/select2.min.js')) ?>
<script type="text/javascript">
$('document').ready(function(){
    $('.fr-wrapper div a').css('display','none');
    getComment();
    // $('#logo').css('display','none');
    var totalServ = 0;
    $('.subtotalServ').each(function(){
        totalServ += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
    });
    
    var subTotalServ = totalServ / 1.16; 
    var ivaServ = subTotalServ * .16;
    $('#subTotalPrint').append(subTotalServ.toFixed(2));
    $('#ivaPrint').append(ivaServ.toFixed(2));
    $('#totalPrint').append(totalServ);

    $(".js-example-basic-single").select2({
        width: 'resolve'
    });
    
    $( "#btnComment" ).click(function() {
        comment();
    });

    function comment() {
        var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
        var data = $('#comentarios').val();
        var id = $('#ticketIdComent').val();
        var autor = $('#autorComent').val();
        $.ajax({
            headers: {
                'X-CSRF-Token': csrfToken
            },
            async:true,
            method: 'post',
            url : "<?= $this->Url->build( ['controller' => 'Comentarios','action' => 'add' ] ); ?>",
            data: {
                idTicket:id,
                autor:autor,
                comentario:data
                },
            success: function( response )
            {
                getComment();
            }
        });
    }

    function getComment(){
        var getId = $('#ticketIdComent').val();
        $.ajax({
            async:true,
            method: 'get',
            url : "<?= $this->Url->build( ['controller' => 'Comentarios','action' => 'index' ] ); ?>",
            data: { keyword:getId },
            success: function( response )
            {
                $('#coments').html(response);
                var myDiv = $('p[data-f-id="pbf"]');
                myDiv.css('display','none');
            }
        });
        
    }

    $('#btnPagar').click( function() {
        var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
        var id = <?= $ticket->id ?>;
        $.ajax({
            headers: {
                'X-CSRF-Token': csrfToken
            },
            async:true,
            method: 'post',
            url : "<?= $this->Url->build( ['action' => 'changestatus' ] ); ?>",
            data: {id:id, estatus:4},
            error: function () {
                Swal.fire('¡Error!', 'Ocurrio un error al cambiar el estatus del ticket, Por favor intente de nuevo.','error');
            },
            success: function( response )
            {
                Swal.fire('','Se cambio el estatus del ticket.','success');
            }
        });
    });

});
</script>
<?= $this->Froala->editor('#comentarios');?>