<div class="app-title">
    <div>
        <h1><i class="fa fa-ticket-alt"></i> Intervenciones</h1>
        <p>Registro intervenciones</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> Tickets</li>
        <li class="breadcrumb-item"><a href="#"> Intervenciones</a></li>
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
                        <div class="col-md-6">
                            <?= $this->Form->control('search', [
                                'options' => $clientes,
                                'class' => 'form-control js-example-responsive', 'required' => true, 'label' => false, 'empty' => 'Clientes'
                            ]); ?>
                        </div>
                        <button class="btn btn-primary icon-btn mr-2"><i class="fas fa-search fa-fw"></i> Buscar</button>
                    </div>
                <?= $this->Form->end() ?>
                <div class="form-group row">
                    <p><?= $this->Html->link('<i class="fas fa-plus-circle fa-fw"></i> Nueva intervención', ['action' => 'add'],['escape' => false, 'class' => 'btn btn-primary icon-btn']) ?></p>
                </div>
            </div>
        </div>
        <?php //if(isset($tickets)){ ?>
        <div class="tile-body">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                        <th>Folio Intervención</th>
                        <th>Folio ticket</th>
                        <th>Fecha de creación</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($intervenciones as $intervencion): ?>
                        <tr>
                            <td><?= $intervencion->folio ?></td>
                            <td><?= $intervencion->idTicket->folio ?></td>
                            <td><?= $intervencion->has('created') ? $intervencion->created : '' ?></td>
                            <td><?= $intervencion->estatus->estatus ?></td>
                            <td>
                                <?php if($current_user['tipoUsuario'] != 4 && $current_user['tipoUsuario'] != 3) :
                                    if($intervencion->estatus->id == 1 || $intervencion->estatus->id == 2 && $current_user['tipoUsuario'] != 3 && $current_user['tipoUsuario'] != 4) { ?> <?= $this->Html->link('<i class="far fa-edit"></i>', ['action' => 'edit', $intervencion->id],['rel' => 'tooltip', 'escape' => false]); } ?>
                                <?php endif;?>
                                    <?php if($intervencion->estatus->id == 2) { ?> <?= $this->Html->link('<i class="far fa-file-alt" data-toggle="tooltip" data-placement="top" title="Agregar reportes"></i>', ['controller' => 'Reportetecnico','action' => 'add', $intervencion->idTicket->id],['class' =>"mx-1 ",'rel' => 'tooltip', 'escape' => false]); } ?>
                                    <?php if($intervencion->estatus->id == 2) { ?> <?= $this->Html->link('<i class="fa fa-dollar-sign" data-toggle="tooltip" data-placement="top" title="Agregar gastos"></i>', ['controller' => 'gastos','action' => 'add', $intervencion->idTicket->id],['class' =>"mx-1 ",'rel' => 'tooltip', 'escape' => false]); } ?>
                                    <?= $this->Html->link('<i class="far fa-eye"></i>', ['action' => 'view', $intervencion->id],['rel' => 'tooltip', 'escape' => false]) ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <?php // } ?>
    </div>
  </div>
</div>
<?= $this->Html->script(array('plugins/jquery.dataTables.min.js','plugins/dataTables.bootstrap.min.js','plugins/select2.min.js')) ?>
<script type="text/javascript">$('#sampleTable').DataTable();
$(".js-example-responsive").select2({
    width: 'resolve' // need to override the changed default
});
</script>