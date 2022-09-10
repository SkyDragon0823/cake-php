<div class="app-title">
    <div>
        <h1><i class="fa fa-ticket-alt"></i> Ticket</h1>
        <p> Detalles tickets</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> Tickets</li>
        <li class="breadcrumb-item"><a href="#"> Detalles</a></li>
    </ul>
</div>
<div class="row">
<?php if ($ticket->estatus->id == 3) { ?>
    <div class="position-fixed p-2 alert alert-danger" style="z-index:999;right:0;top:131px"> <h5>Estatus: <?= $ticket->estatus->estatus ?>  </h5> </div>
<?php } elseif($ticket->estatus->id == 4) {?>
    <div class="position-fixed p-2 alert alert-success" style="z-index:999;right:0;top:131px"> <h5>Estatus: <?= $ticket->estatus->estatus ?>  </h5> </div>
<?php } ?>
    <div class="col-md-12">
        <div class="tile">
            <section class="invoice">
                <div class="row mb-4">
                    <div class="col-6">
                        <h4 class="page-header"> <?= $ticket->has('idCliente') ? $ticket->idCliente->nombre : '' ?> </h4>
                    </div>
                    <div class="col-6">
                        <h5 class="text-right">Folio: <?= $ticket->folio ?>  </h5>
                    </div>
                </div>
                <div class="row invoice-info">
                    <div class="col-4">
                        <p><b>Fecha de atención:</b> <?= $ticket->has('fechaAtencion') ? $ticket->fechaAtencion->i18nFormat('dd-MMMM-yyyy hh:mm a') :  '' ?> </p>
                    </div>
                    <div class="col-4">
                        <p><b>Ingresos totales:</b> <?= $ticket->has('costoTotal') ? '$'. $ticket->costoTotal :  '' ?> </p>
                    </div>
                    <div class="col-4">
                        <p><b>Costo comercial:</b> <?= $ticket->has('gastototal') ? '$'. $ticket->gastototal :  '' ?> </p>
                    </div>
                </div>
                <?php if(iterator_count($serviciosAsig)) : ?>
                    <div class="col-12 my-5">
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
                                    <?php foreach ($serviciosAsig as $serviciosAsig): ?>
                                        <tr>
                                            <td><?=  $serviciosAsig->has('idServicio') ? $serviciosAsig->idServicio->descripcion : '' ?> <br></td>
                                            <td><?=  $serviciosAsig->has('cantidad') ? $serviciosAsig->cantidad : '' ?> <br></td>
                                            <td><?=  $serviciosAsig->has('idServicio') ? '$'. $serviciosAsig->idServicio->costo : '' ?> <br></td>
                                            <td class="subtotalServ"><?= $serviciosAsig->has('idServicio') ? $serviciosAsig->idServicio->costo * $serviciosAsig->cantidad : '' ?> <br></td>
                                        </tr>
                                    <?php endforeach; ?>
                            </tbody>
                            <tfoot style="border: 1px solid white;">
                                <tr>
                                    <th style="border:none!important"></th><th style="border:none!important"></th>
                                    <th>Total</th>
                                    <th id="totalPrint">$</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                <?php endif; ?>
                <?php if(iterator_count($infoGastos)) : ?>
                    <div class="col-12 my-5">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Gastos</th>
                                    <th>Concepto</th>
                                    <th  width="150px">Monto Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php foreach ($infoGastos as $gasto): ?>
                                        <tr>
                                            <td><?=  $gasto->has('tiposGasto') ? $gasto->tiposGasto : '' ?> <br></td>
                                            <td><?=  $gasto->has('conceptoGasto') ? $gasto->conceptoGasto : '' ?> <br></td>
                                            <td class="subtotalGastos"><?=  $gasto->has('montoTotal') ? $gasto->montoTotal : '' ?> <br></td>
                                        </tr>
                                    <?php endforeach; ?>
                            </tbody>
                            <tfoot style="border: 1px solid white;">
                                <tr>
                                    <th  style="border:none!important;"></th>
                                    <th  style="border:none!important;text-align:right">Total</th>
                                    <th id="totalGastosPrint">$</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                <?php endif; ?>
                <?php if(iterator_count($cuadrilla)) : ?>
                    <div class="col-12 my-5">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Técnico</th>
                                    <th width="150px">Costo</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php foreach ($cuadrilla as $cuadrilla): ?>
                                        <tr>
                                            <td><?=  $cuadrilla->has('idTecnico') ? $cuadrilla->idTecnico->nombre : '' ?> <br></td>
                                            <td class="subtotalTecnicos"><?=  $cuadrilla->has('idTecnico') ? $cuadrilla->idTecnico->sueldo : '' ?> <br></td>
                                        </tr>
                                    <?php endforeach; ?>
                            </tbody>
                            <tfoot style="border: 1px solid white;">
                                <tr>
                                    <th  style="border:none!important;text-align:right">Total</th>
                                    <th id="totalTecnicosPrint">$</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                <?php endif; ?>
                <?php if(iterator_count($infoSubcontrata)) : ?>
                    <div class="col-12 my-5">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Tecnico Subcontrata</th>
                                    <th  width="150px">Costo</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    <?php foreach ($infoSubcontrata as $subcontrata): ?>
                                        <tr>
                                            <td><?=  $subcontrata->has('nombre') ? $subcontrata->nombre .' '. $subcontrata->apellido1 : '' ?> <br></td>
                                            <td class="subtotalSubcon"><?=  $ticket->has('costoTecnicoSub') ? $ticket->costoTecnicoSub : '' ?> <br></td>
                                        </tr>
                                    <?php endforeach; ?>
                                
                            </tbody>
                            <tfoot style="border: 1px solid white;">
                                <tr>
                                    <th  style="border:none!important;text-align:right">Total</th>
                                    <th id="totalSubconPrint">$</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                <?php endif;?>
            </section>
        </div>
    </div>
</div>

<!-- <div class="row">
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
                                        <th>Intervencion Id</th>
                                        <th>Cuadrilla</th>
                                        <th>Vehículo</th>
                                        <th>Problema Reportado</th>
                                        <th>Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($intervenciones as $intervencion): ?>
                                        <tr>
                                            <td><?= $intervencion->id ?></td>
                                            <td><?= $intervencion->idCuadrilla ?></td>
                                            <td><?= $intervencion->idFlotilla ?></td>
                                            <td><?= $intervencion->problemaReportado ?></td>
                                            <td><?= $intervencion->estatus->estatus ?></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        <?php } else {?>
                            <div class="row mb-4">
                                <div class="col-3">
                                    <h5 class="font-weight-normal">No hay intervenciones asignadas</h5>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div> -->

<?= $this->Html->script(array('plugins/select2.min.js')) ?>
<script type="text/javascript">
$('document').ready(function(){
    $(".js-example-basic-single").select2({
        width: 'resolve'
    });
});

var totalServ = 0;
$('.subtotalServ').each(function(){
    totalServ += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
});

var totalGastos = 0;
$('.subtotalGastos').each(function(){
    totalGastos += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
    totalGastos = totalGastos || 0;
});

var totalTecnicos = 0;
$('.subtotalTecnicos').each(function(){
    totalTecnicos += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
    totalTecnicos = totalTecnicos || 0;
});

var totalSubcon = 0;
$('.subtotalSubcon').each(function(){
    totalSubcon += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
    totalSubcon = totalSubcon || 0;
});

$('#totalPrint').append(totalServ.toFixed(2));
$('#totalTecnicosPrint').append(totalTecnicos.toFixed(2));
$('#totalGastosPrint').append(totalGastos.toFixed(2));
$('#totalSubconPrint').append(totalSubcon.toFixed(2));

</script>