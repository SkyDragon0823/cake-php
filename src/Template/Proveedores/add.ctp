<div class="app-title">
    <div>
        <h1><i class="fa fa-book"></i>Nuevo Proveedor</h1>
        <p>Registro proveedores</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i>Proveedores</li>
        <li class="breadcrumb-item"><a href="#">Registrar</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-md-12">
                    <legend><?= __('Nuevo Proveedor') ?></legend>
                    <hr>
                </div>
                <div class="col-lg-12">
                    <?= $this->Form->create($proveedore,['class' => 'form-horizontal']) ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Nombre</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('nombre',['class' => 'form-control', 'required' => true, 'placeholder' => 'Nombre','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Servicio</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('servicio',['class' => 'form-control', 'required' => true, 'placeholder' => 'Servicio','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">RFC</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('rfc',['class' => 'form-control', 'required' => true, 'placeholder' => 'RFC','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Direcci??n</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('direccion',['class' => 'form-control', 'required' => true, 'placeholder' => 'Direcci??n','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Localidad</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('localidad',['class' => 'form-control', 'required' => true, 'placeholder' => 'Localidad','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Estado</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('estado',['class' => 'form-control', 'required' => true,'label' => false,'empty' => 'Estado']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Pais</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('pais',['class' => 'form-control', 'required' => true, 'placeholder' => 'Pais','label' => false, 'value' => 146]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Contacto</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('contacto',['class' => 'form-control', 'required' => true, 'placeholder' => 'Contacto','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Correo</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('correo',['class' => 'form-control', 'required' => true, 'placeholder' => 'Correo','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Tel??fono</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('telefono',['class' => 'form-control', 'required' => true, 'placeholder' => 'Tel??fono','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Celular</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('celular',['class' => 'form-control', 'required' => true, 'placeholder' => 'Celular','label' => false]); ?>
                                    </div>
                                </div>
                                <?= $this->Form->control('estatus',['hidden' => true, 'value' => 1, 'label' => false]) ?>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <?= $this->Html->link('<i class="fas fa-chevron-left fa-fw"></i> Regresar', ['action' => 'index'],['escape' => false, 'class' => 'btn btn-primary']) ?>
                            <?= $this->Form->button(_('Guardar'),['class' => 'btn btn-primary']); ?>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
        </div>
    </div>
</div>