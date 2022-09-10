<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reportetecnico $reportetecnico
 */
?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-ticket-alt"></i> Reporte tecnico</h1>
        <p>Registro reportes</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> Reporte Tecnico</li>
        <li class="breadcrumb-item"><a href="#">Editar reporte</a></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-md-12">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h4 class="page-header"> Ticket: <?= $reporteTicket ?> </h4>
                        </div>
                        <div class="col-6">
                            <h6 class="text-right">  <?= $reportetecnico->fechaAtencion->i18nFormat('dd-MM-yyyy hh:mm a') ?></h6>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h5>Descripción</h5>
                        <p><?= $reportetecnico->descripcionReporte ?></p>
                    </div>
                </div>
        </div>
    </div>
</div>