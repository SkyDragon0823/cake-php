<div class="app-title">
    <div>
        <h1><i class="fa fa-ticket-alt"></i> Reporte tecnico</h1>
        <p>Registro reportes</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Reporte Tecnico</a></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-title-w-btn">
                <p><?= $this->Html->link('<i class="fas fa-plus-circle fa-fw"></i> Nuevo Reporte', ['action' => 'add'],['escape' => false, 'class' => 'btn btn-primary icon-btn']) ?></p>
            </div>
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>Ticket</th>
                            <th>Intervención</th>
                            <th>Usuario</th>
                            <th>Fecha de creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($reportetecnico as $reportetecnico): ?>
                        <tr>
                            <td> <?= $reportetecnico->idTicket->folio ?> </td>
                            <td> <?= $reportetecnico->has('idIntervencion') ? $reportetecnico->idIntervencion->folio : '' ?> </td>
                            <td> <?= $reportetecnico->idUsuario->nombre . ' ' . $reportetecnico->idUsuario->apellido1?> </td>
                            <td> <?= $reportetecnico->created ?> </td>
                            <td> 
                                <?= $this->Html->link('<i class="fas fa-file-signature"></i>', ['action' => 'edit', $reportetecnico->id],['rel' => 'tooltip', 'escape' => false]) ?> 
                                <?= $this->Html->link('<i class="far fa-eye"></i>', ['action' => 'view', $reportetecnico->id],['rel' => 'tooltip', 'escape' => false]) ?> 
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>