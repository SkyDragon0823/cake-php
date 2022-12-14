<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sucursale $sucursale
 */
?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-building"></i> Nueva Sucursal</h1>
        <p>Registro sucursales</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> Clientes</li>
        <li class="breadcrumb-item"><a href="#">Sucursal</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-md-12">
                    <legend><?= __('Nueva Sucursal') ?></legend>
                    <hr>
                </div>
                <div class="col-lg-12">
                    <?= $this->Form->create($sucursal,['class' => 'form-horizontal']) ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Cliente</label>
                                    <div class="col-md-8">
                                        <?php if ($data != null)
                                        {
                                            echo  $this->Form->control('idCliente', ['options' => $clientes, 'class' => 'form-control', 'required' => true, 'label' => false, 'value' => $data, 'readonly' => true,'style' => 'pointer-events:none']);
                                        }
                                        else{ 
                                            echo  $this->Form->control('idCliente', ['options' => $clientes, 'class' => 'form-control', 'required' => true, 'label' => false, 'empty' => 'Cliente']);
                                         } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Sucursal</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('sucursal',['class' => 'form-control', 'required' => true, 'placeholder' => 'Sucursal','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">CR</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('cr',['class' => 'form-control', 'required' => true, 'placeholder' => 'CR','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Direcci??n</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('direccion',['class' => 'form-control', 'required' => true, 'placeholder' => 'Direcci??n','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Localidad</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('localidad',['class' => 'form-control', 'required' => true, 'placeholder' => 'Localidad','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Estado</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('estado',['class' => 'form-control', 'required' => true,'label' => false,'empty' => 'Estado']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">C??digo Postal</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('codigoPostal',['class' => 'form-control', 'required' => true, 'placeholder' => 'C??digo Postal','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Colonia</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('colonia',['class' => 'form-control', 'required' => true, 'placeholder' => 'Colonia','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Lada</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('lada',['class' => 'form-control', 'required' => true, 'placeholder' => 'Lada','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Tel??fono</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('telefono',['class' => 'form-control', 'required' => true, 'placeholder' => 'Tel??fono','label' => false]); ?>
                                    </div>
                                </div>
                                <?= $this->Form->control('estatus',['hidden' => true, 'value' => 1, 'label' => false]) ?>
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