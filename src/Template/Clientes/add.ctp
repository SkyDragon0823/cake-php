<div class="app-title">
    <div>
        <h1><i class="fa fa-building"></i>Nuevo cliente</h1>
        <p>Registro clientes</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i>Clientes</li>
        <li class="breadcrumb-item"><a href="#">Registro</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-md-12">
                    <legend><?= __('Nuevo Cliente') ?></legend>
                    <hr>
                </div>
                <div class="col-lg-12">
                    <?= $this->Form->create($cliente,['class' => 'form-horizontal']) ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Nombre</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('nombre',['class' => 'form-control', 'required' => true, 'placeholder' => 'Nombre','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Prefijo</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('prefijo',['class' => 'form-control', 'required' => true, 'placeholder' => 'Prefijo','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Rfc</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('rfc',['class' => 'form-control', 'required' => true, 'placeholder' => 'Rfc','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Dirección</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('direccion',['class' => 'form-control', 'required' => true, 'placeholder' => 'Dirección','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Estado</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('estado',['class' => 'form-control', 'required' => true,'label' => false,'empty' => 'Estados']); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Municipio</label>
                                    <div class="col-md-8">
                                        <?php //$this->Form->control('municipio',['class' => 'form-control', 'required' => true, 'placeholder' => 'Combobox de estados','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Colonia</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('colonia',['class' => 'form-control', 'required' => true, 'placeholder' => 'Colonia','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Codigo Postal</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('codigoPostal',['class' => 'form-control', 'required' => true, 'placeholder' => 'Codigo Postal','label' => false]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Teléfono</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('telefono',['class' => 'form-control', 'required' => true, 'placeholder' => 'Telefono','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Protocolo</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('protocolo',['class' => 'form-control', 'required' => true, 'placeholder' => 'Protocolo','label' => false, 'type' => 'textarea']); ?>
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