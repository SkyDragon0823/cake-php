<div class="app-title">
    <div>
        <h1><i class="fa fa-car"></i> Vehículos</h1>
        <p>Registro y edición de vehículos</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> Vehículos</li>
        <!-- <li class="breadcrumb-item"><a href="#"></a></li> -->
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-title-w-btn">
                <p><?= $this->Html->link('<i class="fas fa-plus-circle fa-fw"></i> Nuevo vehículo', ['action' => 'add'],['escape' => false, 'class' => 'btn btn-primary icon-btn']) ?></p>
            </div>
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Placa</th>
                            <th>id Rastreador</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($vehiculos as $vehiculo): ?>
                        <tr>
                            <td> <?= $vehiculo->marca ?></td>
                            <td> <?= $vehiculo->modelo ?></td>
                            <td> <?= $vehiculo->placa ?></td>
                            <td> <?= $vehiculo->idRastreador ?></td>
                            <td> <?= $this->Html->link('<i class="fas fa-user-edit"></i>', ['action' => 'edit', $vehiculo->id],['rel' => 'tooltip', 'escape' => false]) ?></td>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script(array('plugins/jquery.dataTables.min.js','plugins/dataTables.bootstrap.min.js')) ?>
<script type="text/javascript">$('#sampleTable').DataTable();</script>