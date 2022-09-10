<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gasto $gasto
 */
?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-users"></i> Gastos</h1>
        <p>Registro y asignación de gastos</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> Gastos</li>
        <li class="breadcrumb-item"><a href="#">Editar Gasto</a></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-md-12">
                    <legend><?= __('Editar Gasto') ?></legend>
                    <hr>
                </div>
                <div class="col-lg-12">
                    <?= $this->Form->create($gasto,['class' => 'form-horizontal']) ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Ticket</label>
                                    <div class="col-md-8">
                                        <?php foreach ($ticket as $ticket): ?>
                                            <?= $this->Form->control('idTicketFolio',['id' => 'addGastoFolio','readonly' => true,'class' => 'form-control', 'required' => true, 'placeholder' => 'Ticket','label' => false, 'value' => $ticket->folio ]); ?>
                                            <?= $this->Form->control('idTicket',['id' => 'addGastoIdTicket','hidden' => 'hidden','readonly' => true,'class' => 'form-control', 'required' => true, 'placeholder' => 'Ticket','label' => false, 'value' => $ticket->id ]); ?>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Tipo de gasto</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->select('tiposGasto',
                                        [
                                            'consumibles' => 'Consumibles',
                                            'hospedaje' => 'Hospedaje',
                                            'trasnporte' => 'Trasnporte',
                                            'caseta' => 'Caseta',
                                            'combustible' => 'Combustible',
                                            'alimentacion' => 'Alimentación',
                                            'paqueteria' => 'Paquetería',
                                        ],
                                        ['class' => 'form-control', 'required' => true, 'placeholder' => 'Tipo de gasto','label' => false]); ?>
                                        <!-- <?= $this->Form->control('tiposGasto',['class' => 'form-control', 'required' => true, 'placeholder' => 'Tipo de gasto','label' => false]); ?> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Concepto</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('conceptoGasto',['class' => 'form-control', 'required' => true, 'placeholder' => 'Concepto gasto  ','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Folio Fiscal</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('UIDFactura',['class' => 'form-control', 'placeholder' => 'Folio fiscal','label' => false,'require' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Proveedor</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('idProveedor',['class' => 'form-control', 'required' => true, 'placeholder' => 'Proveedor','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Monto sin Iva</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('montoSinIva',['class' => 'form-control', 'required' => true, 'placeholder' => 'Monto sin iva','label' => false]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Monto total</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('montoTotal',['class' => 'form-control', 'required' => true, 'placeholder' => 'Monto total','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Detalles</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('detalles',['class' => 'form-control', 'required' => true, 'placeholder' => 'Detalles','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Deducible</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('deducible', [
                                            'options' => [1 => 'Si', 2 => 'No'],
                                            'class' => 'form-control', 'required' => true, 'label' => false
                                        ]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <?= $this->Html->link('<i class="fas fa-chevron-left fa-fw"></i> Regresar', ['action' => 'index'],['escape' => false, 'class' => 'btn btn-primary']) ?>
                            <?= $this->Form->button(_('Editar'),['class' => 'btn btn-primary']); ?>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
        </div>
    </div>
</div>