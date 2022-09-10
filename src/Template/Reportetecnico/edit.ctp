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
                    <legend><?= __('Editar Reporte') ?></legend>
                    <hr>
                </div>
                <div class="col-lg-12">
                <?= $this->Form->create($reportetecnico,['class' => 'form-horizontal']) ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Ticket <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <?php if(isset($ticket) && $ticket != '') : ?>
                                                <?php foreach ($ticket as $ticket): ?>
                                                    <?= $this->Form->control('idTicketFolio',['readonly' => true,'class' => 'form-control', 'required' => true, 'placeholder' => 'Ticket','label' => false, 'value' => $ticket->folio ]); ?>
                                                    <?= $this->Form->control('idTicket',['hidden' => 'hidden','readonly' => true,'class' => 'form-control', 'required' => true, 'placeholder' => 'Ticket','label' => false, 'value' => $ticket->id ]); ?>
                                                <?php endforeach;?>
                                            <?php endif; ?>
                                            <?php if(!isset($ticket)) : ?>
                                                <?= $this->Form->control('idTicket',['options' => $tickets,'class' => 'form-control', 'required' => true, 'placeholder' => 'Ticket','label' => false,'empty' => 'Tickets']); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if(iterator_count($intervenciones)) : ?>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Intervencion</label>
                                            <div class="col-md-8">
                                                <?= $this->Form->control('idIntervencion',['options' => $intervenciones,'class' => 'form-control','placeholder' => 'Intervencion','label' => false,'empty' => 'Intervenciones']); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Fecha de atención <span class="text-danger">*</span></label>
                                        <?= $this->Form->control('fechaAtencion',['class' => 'form-control','label' => false]); ?>
                                        <!-- <div class="input-group mb-3 col-md-8">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input class="form-control" id="fechaAtencion" name="fechaAtencion" type="text" placeholder="Selecciona la fecha" aria-describedby="basic-addon1">
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3"> Descripción del reporte <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <?= $this->Form->control('descripcionReporte',['required' => true,'class' => 'form-control', 'placeholder' => 'Descripción','label' => false,'type' => 'textarea']); ?>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label class="control-label col-md-3">Comprobante Finalización</label>
                                        <div class="col-md-8">
                                            <?= $this->Form->control('comprobanteReporte',['class' => 'form-control', 'placeholder' => 'Reporte','label' => false, 'type' => 'file']); ?>
                                        </div>
                                    </div> -->
                                </div>
                                <?= $this->Form->control('idUsuario',['hidden' => true, 'value' => $current_user['id'], 'label' => false]) ?>
                            </div>
                            <div class="tile-footer">
                                <?= $this->Html->link('<i class="fas fa-chevron-left fa-fw"></i> Regresar', ['action' => 'index'],['escape' => false, 'class' => 'btn btn-primary']) ?>
                                <?= $this->Form->button(_('<i class="fa fa-plus-circle fa-lg fa-fw"></i> Guardar'),['class' => 'btn btn-primary']); ?>
                            </div>
                        <?= $this->Form->end() ?>
                </div>
        </div>
    </div>
</div>