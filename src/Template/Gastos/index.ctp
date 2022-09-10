<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gasto[]|\Cake\Collection\CollectionInterface $gastos
 */
?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-users"></i> Gastos</h1>
        <p>Registro y asignación de gastos</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Gastos</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-title-w-btn">
                <p><?= $this->Html->link('<i class="fas fa-plus-circle fa-fw"></i> Nuevos Gastos ', ['action' => 'add'],['escape' => false, 'class' => 'btn btn-primary icon-btn']) ?></p>
            </div>
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($gastos as $gasto): ?>
                            <tr>
                                <td> <?= $gasto->has('ticket') ? $gasto->ticket->folio : $gasto->idIntervencion ?> </td>
                                <td> <?= $gasto->created ?> </td>
                                <td>
                                    <!-- <?= $this->Html->link('<i class="far fa-edit"></i>', ['action' => 'edit', $gasto->id],['rel' => 'tooltip', 'escape' => false]) ?> -->
                                    <?= $this->Html->link('<i class="far fa-eye" data-toggle="tooltip" data-placement="top" title="Detalles"></i>', ['action' => 'view', $gasto->idTicket],['rel' => 'tooltip', 'escape' => false]) ?>
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