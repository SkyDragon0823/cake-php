<div class="app-title">
    <div>
        <h1><i class="fa fa-file-alt"></i> Nueva Orden</h1>
        <p>Registro Ordenes de compra</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i>Ordenes de compra</li>
        <li class="breadcrumb-item"><a href="#">Agregar Orden</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-md-12">
                    <legend><?= __('Nueva Orden de compra') ?></legend>
                    <hr>
                </div>
                <div class="col-lg-12">
                    <?= $this->Form->create($ordencompra,['class' => 'form-horizontal']) ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Ticket</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('idTicket',['class' => 'form-control', 'required' => true, 'placeholder' => 'Ticket','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Nombre del solicitante</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('solicitante',['class' => 'form-control', 'required' => true, 'placeholder' => 'CR','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Lugar de entrega</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('lugarEntrega',['class' => 'form-control', 'required' => true, 'placeholder' => 'Lugar de entrega','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Responsable</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('responsable',['class' => 'form-control', 'required' => true, 'placeholder' => 'Responsable','label' => false]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                            </div>
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

<?php
            echo $this->Form->control('idTicket');
            echo $this->Form->control('solicitante');
            echo $this->Form->control('departamento');
            echo $this->Form->control('lugarEntrega');
            echo $this->Form->control('responsable');
            echo $this->Form->control('total');
        ?>