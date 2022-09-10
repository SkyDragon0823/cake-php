<div class="app-title">
    <div>
        <h1><i class="fa fa-comments-dollar"></i>Tabuladores</h1>
        <p>Registro tabuladores</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i>Tabulador</li>
        <!-- <li class="breadcrumb-item"><a href="#"></a></li> -->
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
                        'class' => 'form-control js-example-basic-single', 'required' => true, 'label' => false, 'empty' => 'Clientes'
                    ]); ?>
                </div>
                    <button class="btn btn-primary icon-btn mr-2"><i class="fas fa-search fa-fw"></i> Buscar</button>
            </div>
            <div class="form-group row">
                <?= $this->Form->end() ?>
                <p><?= $this->Html->link('<i class="fas fa-plus-circle fa-fw"></i> Nuevo registro', ['action' => 'add'],['escape' => false, 'class' => 'btn btn-primary icon-btn']) ?></p>
            </div>
        </div>
    </div>
    <?php if(isset($tabulador)){ ?>
        <div class="tile-body">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Clave</th>
                        <th>Descripción</th>
                        <th>Costo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($tabulador as $tabulador): ?>
                    <tr>
                        <?php echo '<td>'. $tabulador['cliente'] .'</td>' ?>
                        <td><?= h($tabulador->clave) ?></td>
                        <td><?= h($tabulador->descripcion) ?></td>
                        <td><?= $this->Number->format($tabulador->costo) ?></td>
                        <td><?= $this->Html->link('<i class="far fa-edit"></i>', ['action' => 'edit', $tabulador->id],['rel' => 'tooltip', 'escape' => false]) ?></td>
                        <?php endforeach;?>
                    </tr>
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
    $('#sampleTable').DataTable();
    $(".js-example-basic-single").select2({
        width: 'resolve'
    });
});
</script>