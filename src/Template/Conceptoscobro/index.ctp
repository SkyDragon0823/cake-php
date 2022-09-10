<div class="app-title">
    <div>
        <h1><i class="fa fa-receipt"></i> Conceptos cobro</h1>
        <p>Registro Conceptos</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> Orden de compra</li>
        <li class="breadcrumb-item"><a href="#">Conceptos</a></li>
    </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
    <div class="tile-title-w-btn">
        <div class="col-lg-8">
        <?= $this->Form->create('',['class' => 'form-horizontal','type' => 'get']) ?>
            <!-- <div class="form-group row">
                <label class="control-label col-md-2">Clientes</label>
                <div class="col-md-6">
                    <?= $this->Form->control('search', [
                        'options' => $clientes,
                        'class' => 'form-control', 'required' => true, 'label' => false, 'empty' => 'Clientes'
                    ]); ?>
                </div>
                    <button class="btn btn-primary icon-btn mr-2"><i class="fas fa-search fa-fw"></i> Buscar</button>
            </div> -->
            <div class="form-group row">
                <?= $this->Form->end() ?>
                <p><?= $this->Html->link('<i class="fas fa-plus-circle fa-fw"></i> Nuevo concepto', ['action' => 'add'],['escape' => false, 'class' => 'btn btn-primary icon-btn']) ?></p>
            </div>
        </div>
    </div>
    <?php if(isset($conceptocobro)){ ?>
        <div class="tile-body">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                        <th>Orden Compra</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Descripción</th>
                        <th>Proveedor</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($conceptocobro as $conceptocobro): ?>
                    <tr>
                        <td> <?= h($conceptocobro->idOrdenCompra) ?> </td>
                        <td> <?= h($conceptocobro->marca) ?> </td>
                        <td> <?= h($conceptocobro->modelo) ?> </td>
                        <td> <?= h($conceptocobro->descripcion) ?> </td>
                        <td> <?= h($conceptocobro->idProveedor) ?> </td>
                        <td> <?= h($conceptocobro->precio) ?> </td>
                        <td> <?= h($conceptocobro->cantidad) ?> </td>
                        <?php echo '<td>'. $this->Html->link('<i class="far fa-edit"></i>', ['action' => 'edit', $conceptocobro->idOrdenCompra],['rel' => 'tooltip', 'escape' => false]) .'</td>' ?>
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