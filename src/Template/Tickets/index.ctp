<div class="app-title">
    <div>
        <h1><i class="fa fa-ticket-alt"></i> Tickets</h1>
        <p>Registro tickets</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> Tickets</li>
    </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
        <div class="tile-title-w-btn">
            <div class="col-lg-8">
                <?php if($current_user['tipoUsuario'] != 4) : ?>
                    <?= $this->Form->create('',['class' => 'form-horizontal','type' => 'get']) ?>
                        <div class="form-group row">
                            <label class="control-label col-md-2">Clientes</label>
                            <div class="col-md-6">
                                <?= $this->Form->control('search', [
                                    'id' => 'formIdClienteTicket',
                                    'options' => $clientes,
                                    'class' => 'form-control js-example-responsive', 'label' => false, 'empty' => 'Clientes'
                                ]); ?>
                            </div>
                            <button class="btn btn-primary icon-btn mr-2"><i class="fas fa-search fa-fw"></i> Buscar</button>
                        </div>
                    <?= $this->Form->end() ?>
                <?php endif; ?>
                <?php if($current_user['tipoUsuario'] != 5) { ?>
                <div class="form-group row">
                    <p><?= $this->Html->link('<i class="fas fa-plus-circle fa-fw"></i> Nuevo ticket', ['action' => 'add'],['escape' => false, 'class' => 'btn btn-primary icon-btn']) ?></p>
                </div>

                <?php } ?>
            </div>
        </div>
        <?php if(isset($tickets)){ ?>
        <div class="tile-body">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Cliente</th>
                        <th>Sucursal</th>
                        <th>Fecha de creación</th>
                        <th>Estatus</th>
                        <th style="width:50px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tickets as $ticket): ?>
                        <tr>
                            <td><?= $ticket->folio ?></td>
                            <td><?= $ticket->has('idCliente') ? $ticket->idCliente->nombre : ''  ?></td>
                            <td><?= $ticket->has('idSucursal') ? $ticket->idSucursal->sucursal : '' ?></td>
                            <td><?= $ticket->has('created') ? $ticket->created->i18nFormat('dd-MMMM-yyyy hh:mm a') : 'es/ES' ?></td>
                            <td><?= $ticket->has('estatus') ? $ticket->estatus->estatus : '' ?></td>
                            <td>
                                <?php if($current_user['tipoUsuario'] != 4) : ?>
                                    <?php if($ticket->estatus->id == 1 || $ticket->estatus->id == 2 && $current_user['tipoUsuario'] != 3 && $current_user['tipoUsuario'] != 4) { ?> <?= $this->Html->link('<i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Editar"></i>', ['action' => 'edit', $ticket->id],['class' =>"mx-1",'rel' => 'tooltip', 'escape' => false]); } ?>
                                    <?php if($ticket->estatus->id == 3 && $current_user['tipoUsuario'] == 5) { ?> <?= $this->Html->link('<i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Editar"></i>', ['action' => 'edit', $ticket->id],['class' =>"mx-1",'rel' => 'tooltip', 'escape' => false]); } ?>
                                    <?php if($ticket->estatus->id == 2) { ?> <?= $this->Html->link('<i class="fa fa-ticket-alt" data-toggle="tooltip" data-placement="top" title="Agregar Intervención"></i>', ['controller' => 'intervenciones','action' => 'add', $ticket->id],['class' =>"mx-1",'rel' => 'tooltip', 'escape' => false]); } ?>
                                    <?php if($ticket->estatus->id == 2) { ?> <?= $this->Html->link('<i class="far fa-file-alt" data-toggle="tooltip" data-placement="top" title="Agregar reportes"></i>', ['controller' => 'Reportetecnico','action' => 'add', $ticket->id],['class' =>"mx-1 ",'rel' => 'tooltip', 'escape' => false]); } ?>
                                    <?php if($ticket->estatus->id == 2) { ?> <?= $this->Html->link('<i class="fa fa-dollar-sign" data-toggle="tooltip" data-placement="top" title="Agregar gastos"></i>', ['controller' => 'gastos','action' => 'add', $ticket->id],['class' =>"mx-1 ",'rel' => 'tooltip', 'escape' => false]); } ?>
                                    <?= $this->Html->link('<i class="far fa-eye" data-toggle="tooltip" data-placement="top" title="Detalles"></i>', ['action' => 'view', $ticket->id],['class' =>"mx-1",'rel' => 'tooltip', 'escape' => false]) ?>
                                <?php endif; ?>
                                <?php if($current_user['tipoUsuario'] == 4) : ?>
                                    <?= $this->Html->link('<i class="far fa-eye" data-toggle="tooltip" data-placement="top" title="Detalles"></i>', ['action' => 'view', $ticket->id],['class' =>"mx-1",'rel' => 'tooltip', 'escape' => false]) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <?php } ?>
    </div>
  </div>
</div>
<?= $this->Html->script(array('plugins/jquery.dataTables.min.js','plugins/dataTables.bootstrap.min.js','plugins/select2.min.js')) ?>
<script type="text/javascript">
    $('document').ready(function(){
        $('#sampleTable').DataTable({
            "order": [[ 1, "desc" ]]
        });

        $(".js-example-responsive").select2({
            width: 'resolve' // need to override the changed default
        });

        $("#formIdClienteTicket").prepend(new Option("TODOS", -1));
    });
</script>