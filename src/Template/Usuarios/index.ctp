<div class="app-title">
    <div>
        <h1><i class="fa fa-users"></i> Usuarios</h1>
        <p>Registro y edición de usuarios</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-title-w-btn">
                <p><?= $this->Html->link('<i class="fas fa-plus-circle fa-fw"></i> Nuevo usuario', ['action' => 'add'],['escape' => false, 'class' => 'btn btn-primary icon-btn']) ?></p>
            </div>
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Correo</th>
                            <th>Tipo usuario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($usuarios as $usuarios): ?>
                        <tr>
                            <td> <?= $usuarios->username ?></td>
                            <td> <?= $usuarios->nombre ?></td>
                            <td> <?= $usuarios->apellido1 ?></td>
                            <td> <?= $usuarios->apellido2 ?></td>
                            <td> <?= $usuarios->correo ?></td>
                            <td> <?= $usuarios->tipoUsuario->nombre ?></td>
                            <td> <?= $this->Html->link('<i class="fas fa-user-edit"></i>', ['action' => 'edit', $usuarios->id],['rel' => 'tooltip', 'escape' => false]) ?></td>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script(array('plugins/jquery.dataTables.min.js','plugins/dataTables.bootstrap.min.js')) ?>
<script type="text/javascript">$('#sampleTable').DataTable();</script>