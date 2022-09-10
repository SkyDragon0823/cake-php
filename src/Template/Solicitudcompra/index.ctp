<div class="app-title">
    <div>
        <h1><i class="fa fa-folder-open"></i>Solicitudes Compra</h1>
        <p>Solicitud Compra</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> Solicitud Compra</li>
    </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
    <div class="tile-title-w-btn">
        <div class="col-lg-8">
        <?php //$this->Form->create('',['class' => 'form-horizontal','type' => 'get']) ?>
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
                <?php /*$this->Form->end()*/ ?>
                <p><?= $this->Html->link('<i class="fas fa-plus-circle fa-fw"></i> Nueva Solicitud', ['action' => 'add'],['escape' => false, 'class' => 'btn btn-primary icon-btn']) ?></p>
            </div>
        </div>
    </div>
    <?php if(isset($solicitudcompra)){ ?>
        <div class="tile-body">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                        <th>Ticket</th>
                        <th>Fecha emisión</th>
                        <th>Solicitante</th>
                        <th>Departamento</th>
                        <th>Lugar de Entrega</th>
                        <th>Responsable</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($solicitudcompra as $solicitudcompra): ?>
                    <tr>
                        <?php echo '<td>'. $solicitudcompra['idTicket'] .'</td>' ?>
                        <?php echo '<td>'. $solicitudcompra->created->format('d-m-Y') .'</td>' ?>
                        <?php echo '<td>'. $solicitudcompra['solicitante'] .'</td>' ?>
                        <?php echo '<td>'. $solicitudcompra['departamento'] .'</td>' ?>
                        <?php echo '<td>'. $solicitudcompra['lugarEntrega'] .'</td>' ?>
                        <?php echo '<td>'. $solicitudcompra['responsable'] . '</td>' ?>
                        <?php echo '<td>'. $this->Html->link('<i class="far fa-edit"></i>', ['action' => 'edit', $solicitudcompra->id],['rel' => 'tooltip', 'escape' => false]) .'</td>' ?>
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