<div class="app-title">
    <div>
        <h1><i class="fa fa-users"></i> Gastos</h1>
        <p>Gastos registrados</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Gastos</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>Ticket Folio</th>
                            <th>Tipo Gasto</th>
                            <th>Concepto</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($gasto as $gasto): ?>
                            <tr>
                                <td> <?= $gasto->ticket->folio ?> </td>
                                <td> <?= $gasto->tiposGasto ?> </td>
                                <td> <?= $gasto->conceptoGasto ?> </td>
                                <td> <?= $gasto->created ?> </td>
                                <td>
                                    <?= $this->Html->link('<i class="far fa-edit"></i>', ['action' => 'edit', $gasto->id],['rel' => 'tooltip', 'escape' => false]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script(array('plugins/jquery.dataTables.min.js','plugins/dataTables.bootstrap.min.js')) ?>
<script type="text/javascript">$('#sampleTable').DataTable();</script>