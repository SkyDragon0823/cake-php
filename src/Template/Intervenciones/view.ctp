<?= $this->Froala->plugin();?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-ticket-alt"></i> Intervenciones</h1>
        <p> Detalles Intervenciones</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> Intervenciones</li>
        <li class="breadcrumb-item"><a href="#"> Detalles</a></li>
    </ul>
</div>
<div class="row">
<?php if($current_user['tipoUsuario'] == 5) :?>
<div class="position-fixed p-2 alert alert-danger" style="z-index:999;right:0;top:131px"> <h5>Estatus: <?= $intervencione->estatus->estatus ?>  </h5> </div>
<?php endif;?>
    <div class="col-md-12">
        <div class="tile">
            <section class="invoice">
                <div class="row mb-4">
                    <div class="col-6">
                        <input type="text" id="ticketIdComent" hidden value="<?= $intervencione->idTicket ?>">
                        <input type="text" id="autorComent" hidden value="<?= $current_user['id'] ?>">
                        <h4 class="page-header"> <?php foreach ($ticketCliente as $ticketCliente) :?> <?= $ticketCliente ?> <?php endforeach; ?> </h4>
                    </div>
                    <div class="col-6">
                        <h5 class="text-right">Folio:  <?= $intervencione->folio ?></h5>
                    </div>
                </div>
                <div class="row invoice-info">
                    <?php foreach($ticketSucursal as $ticketSucursal) : ?>
                        <div class="col-12">
                            <p><b>Sucursal:</b> <?= $ticketSucursal->has('cr') ? $ticketSucursal->cr . ' - ' : '' ?> <?= $ticketSucursal->has('sucursal') ? $ticketSucursal->sucursal : '' ?> </p>
                        </div>
                    <?php endforeach;?>
                    <div class="col-12">
                        <p><b>Descripción:</b> <?= $intervencione->descripcion?> </p>
                    </div>
                    <div class="col-4">
                        <p><b>Vehículo:</b> <?= $intervencione->has('idVehiculo') ? ' <b>Marca:</b> '. $intervencione->idVehiculo->marca .' <b>Modelo:</b> '. $intervencione->idVehiculo->modelo .' <b>Placa:</b> '. $intervencione->idVehiculo->placa : '<b class="text-danger">Vehículo no asignado </b>'?></p>
                    </div>
                    <div class="col-4">
                        <p><b>Folio Apertura:</b> <?= $intervencione->folioApertura ?></p>
                    </div>
                    <div class="col-4">
                        <p><b>Folio Cierre:</b> <?= $intervencione->folioCierre ?></p>
                    </div>
                    <div class="col-md-12">
                        <p> <b>Servicios:</b>
                            <?php foreach($serviciosAsig as $serviciosAsig) : ?>
                            <br>
                                    <?= $serviciosAsig->has('cantidad') ? 'Cantidad: '. $serviciosAsig->cantidad .' - ' : '' ?>
                                    <?= $serviciosAsig->has('idServicio') ? $serviciosAsig->idServicio->descripcion : '' ?>
                            <?php endforeach; ?>
                        </p>
                    </div>
                    <?php if($current_user['tipoUsuario'] != 3) : ?>
                        <div class="col-4">
                            <p><b>Solicito:</b> <?= $intervencione->has('idSolicitante') ? $intervencione->idSolicitante->nombre .' '. $intervencione->idSolicitante->apellido1 .' '. $intervencione->idSolicitante->apellido2 : '' ?></p>
                        </div>
                        <?php foreach ($ticketCoordinador as $ticketCoordinador): ?>
                            <div class="col-4">
                                <p><b>Coordinador:</b> <?= $ticketCoordinador->has('nombre') ? $ticketCoordinador->nombre : '' ?> <?= $ticketCoordinador->has('apellido1') ? $ticketCoordinador->apellido1 : '' ?></p>
                            </div>
                        <?php endforeach;?>
                        <div class="col-4">
                            <p><b>Estatus:</b> <?= $intervencione->estatus->estatus ?>  </p>
                        </div>
                    <?php endif; ?>
                  
                </div>
                <?php if($current_user['tipoUsuario'] != 4 && $current_user['tipoUsuario'] != 3) { if($intervencione->estatus->id == 1 || $intervencione->estatus->id == 2) { ?>
                <div class="row d-print-none mt-2">
                    <div class="col-12 text-right">
                        <?= $this->Html->link('<i class="far fa-edit"></i> Editar', ['action' => 'edit', $intervencione->id],['class' => 'btn btn-primary','rel' => 'tooltip', 'escape' => false]) ?>
                    </div>
                </div>
                <?php } } ?>
            </section>
        </div>
    </div>
</div>
<?php if($current_user['tipoUsuario'] != 3) :?>
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
        var id = <?= $intervencione->id ?>;
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