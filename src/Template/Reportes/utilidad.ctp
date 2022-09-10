<div class="app-title">
    <div>
        <h1><i class="fa fa-file-invoice"></i> Utilidad</h1>
        <p>Consulta reportes gastos y utilidades</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> Reportes</li>
        <li class="breadcrumb-item"> Utilidad</li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-title-w-btn">
                <div class="col-lg-8">
                    <?= $this->Form->create('',['class' => 'form-horizontal','type' => 'get']) ?>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Clientes</label>
                        <div class="col-md-7">
                            <?= $this->Form->control('cliente', [
                                'options' => $clientesData,
                                'class' => 'form-control js-example-responsive', 'label' => false, 'empty' => 'Clientes'
                            ]); ?>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label class="control-label col-md-2">Servicio</label>
                        <div class="col-md-6">
                            <?= $this->Form->control('tabulador', [
                                'options' => $tabuladorData,
                                'class' => 'form-control', 'label' => false, 'empty' => 'Servicios'
                            ]);?>
                        </div>
                    </div> -->
                    <!-- <div class="form-group row">
                        <label class="control-label col-md-2">Ticket</label>
                        <div class="col-md-6">
                            <?=  $this->Form->control('ticket',['class' => 'form-control', 'placeholder' => 'Ticket','label' => false]); ?>
                        </div>
                    </div> -->
                    <!-- <div class="form-group row">
                        <label class="control-label col-md-2">Fechas</label>
                        <div class="col-md-9 row">
                            <div class="input-group mb-3 col-md-6">
                                <small class="form-text text-muted col-md-12 pl-0">Fecha Inicial</small>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input class="form-control" id="fDate" name="fDate" type="text" placeholder="Selecciona la fecha" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3 col-md-6">
                                <small class="form-text text-muted col-md-12 pl-0">Fecha final</small>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input class="form-control" id="lDate" name="lDate" type="text" placeholder="Selecciona la fecha" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div> -->
                    <button class="btn btn-primary icon-btn mr-2"><i class="fas fa-search fa-fw"></i> Buscar</button>
                    <?= $this->Form->end() ?>
                </div>
            </div>
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Cliente</th>
                            <th>Sucursal</th>
                            <th>Utilidad</th>
                            <th>Fecha de solicitud</th>
                            <th>Estatus</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ticketsData as $tickets): ?>
                            <tr>
                                <td><?= $tickets->folio ?></td>
                                <td><?= $tickets->has('idCliente') ? $tickets->idCliente->nombre : '' ?></td>
                                <td><?= $tickets->has('idSucursal') ? $tickets->idSucursal->sucursal :'' ?></td>
                                <td>$ <?= $tickets->costoTotal - $tickets->gastototal  ?> </td>
                                <td><?= $tickets->created ?></td>
                                <td><?= $tickets->has('estatus') ? $tickets->estatus->estatus : '' ?></td>
                                <td>
                                    <?= $this->Html->link('<i class="far fa-eye" data-toggle="tooltip" data-placement="top" title="Detalles"></i>', ['action' => 'view', $tickets->id],['rel' => 'tooltip', 'escape' => false]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <!-- <?php foreach ($intervencionesData as $intervenciones): ?>
                            <tr>
                                <td><?= $intervenciones->folio ?></td>
                                <td><?= $intervenciones->has('idCliente') ? $intervenciones->idCliente->nombre : '' ?></td>
                                <td><?= $intervenciones->has('idSucursal') ? $intervenciones->idSucursal->sucursal :'' ?></td>
                                <td></td>
                                <td><?= $intervenciones->created ?></td>
                                <td>
                                    <?= $this->Html->link('<i class="far fa-eye" data-toggle="tooltip" data-placement="top" title="Detalles"></i>', ['action' => 'view', $intervenciones->id],['rel' => 'tooltip', 'escape' => false]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script(array('plugins/jquery.dataTables.min.js','plugins/dataTables.bootstrap.min.js')) ?>
<?= $this->Html->script(array('plugins/bootstrap-datepicker.min.js','plugins/select2.min.js','plugins/bootstrap-datepicker.min.js')) ?>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<script type="text/javascript">
    $('#sl').click(function(){
    $('#tl').loadingBtn();
    $('#tb').loadingBtn({ text : "Signing In"});
    });
    
    $('#el').click(function(){
    $('#tl').loadingBtnComplete();
    $('#tb').loadingBtnComplete({ html : "Sign In"});
    });
    
    $('#fDate').datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
    todayHighlight: true
    });
    $('#lDate').datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
    todayHighlight: true
    });
    
    $('#demoSelect').select2();

    $(".js-example-responsive").select2({
        width: 'resolve' // need to override the changed default
    });
</script>