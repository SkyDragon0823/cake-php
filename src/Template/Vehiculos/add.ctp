<div class="app-title">
    <div>
        <h1><i class="fa fa-car"></i> Vehículos</h1>
        <p>Registro y edición de vehículos</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> Vehículos</li>
        <li class="breadcrumb-item"><a href="#"> Agregar</a></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-md-12">
                    <legend><?= __('Nuevo vehículo') ?></legend>
                    <hr>
                </div>
                <div class="col-lg-12">
                    <?= $this->Form->create($vehiculo,['class' => 'form-horizontal']) ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Marca</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('marca',['class' => 'form-control', 'required' => true, 'placeholder' => 'Marca','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Modelo</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('modelo',['class' => 'form-control', 'required' => true, 'placeholder' => 'Modelo','label' => false]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Placa</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('placa',['class' => 'form-control', 'required' => true, 'placeholder' => 'Placa','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Rastreador</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('idRastreador',['class' => 'form-control', 'required' => true,'label' => false]); ?>
                                    </div>
                                </div>
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