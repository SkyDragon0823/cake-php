<div class="app-title">
    <div>
        <h1><i class="fa fa-file-alt"></i> Orden de Compra</h1>
        <p>Ordenes de compra</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i>Ordenes de compra</li>
    </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
    <div class="tile-title-w-btn">
        <div class="col-lg-8">
        <?php // $this->Form->create('',['class' => 'form-horizontal','type' => 'get']) ?>
            <!-- <div class="form-group row">
                <label class="control-label col-md-2">Cliente</label>
                <div class="col-md-6">
                    <?php /* $this->Form->control('search', [
                        'options' => $clientes,
                        'class' => 'form-control', 'required' => true, 'label' => false, 'empty' => 'Clientes'
                    ]); */?>
                </div>
                    <button class="btn btn-primary icon-btn mr-2"><i class="fas fa-search fa-fw"></i> Buscar</button>
            </div> -->
        <?php // $this->Form->end() ?>
            <div class="form-group row">
                <p><?= $this->Html->link('<i class="fas fa-plus-circle fa-fw"></i> Nueva Orden', ['action' => 'add'],['escape' => false, 'class' => 'btn btn-primary icon-btn']) ?></p>
            </div>
        </div>
    </div>
    <?php if(isset($ordencompra)){ ?>
        <div class="tile-body">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                        <th>Número Compra</th>
                        <th>Ticket</th>
                        <th>Solicitante</th>
                        <th>Responsable</th>
                        <th>Lugar de entrega</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($ordencompra as $ordencompra): ?>
                    <tr>
                        <td><?= h($ordencompra->id) ?></td>
                        <td><?= h($ordencompra->idTicket) ?></td>
                        <td><?= h($ordencompra->nombre) ?></td>
                        <td><?= h($ordencompra->responsable) ?></td>
                        <td><?= h($ordencompra->lugarEntrega) ?></td>
                        <td><?= $this->Html->link('<i class="far fa-edit"></i>', ['action' => 'edit', $ordencompra->id],['rel' => 'tooltip', 'escape' => false]) ?></td>
                        <?php endforeach;?>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php } ?>
    </div>
  </div>
</div>
<?= $this->Html->script(array('plugins/jquery.dataTables.min.js','plugins/dataTables.bootstrap.min.js')) ?>
<script type="text/javascript">$('#sampleTable').DataTable();</script>