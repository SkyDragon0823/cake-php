<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sucursale[]|\Cake\Collection\CollectionInterface $sucursales
 */
?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-building"></i>Sucursales</h1>
        <p>Registro sucursales</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i>Clientes</li>
        <li class="breadcrumb-item"><a href="#">Sucursal</a></li>
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
                <div class="form-group row">
                <?= $this->Form->end() ?>
                    <p><?= $this->Html->link('<i class="fas fa-plus-circle fa-fw"></i> Nueva Sucursal', ['action' => 'add'],['escape' => false, 'class' => 'btn btn-primary icon-btn']) ?></p>
                </div>
            </div>
        </div>
        <?php if(isset($sucursales)){ ?>
        <div class="tile-body">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Sucursal</th>
                        <th>CR</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sucursales as $sucursal): ?>
                        <tr>
                            <td><?= $sucursal->cliente->nombre ?></td>
                            <td><?= $sucursal->sucursal ?></td>
                            <td><?= $sucursal->cr ?></td>
                            <td><?= $sucursal->direccion ?></td>
                            <td><?= $sucursal->telefono ?></td>
                            <td><?= $this->Html->link('<i class="far fa-edit"></i>', ['action' => 'edit', $sucursal->id],['rel' => 'tooltip', 'escape' => false]) ?></td>
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
<script type="text/javascript">$('#sampleTable').DataTable();
$(".js-example-responsive").select2({
            width: 'resolve' // need to override the changed default
        });
</script>