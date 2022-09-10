<div class="app-title">
    <div>
        <h1><i class="fa fa-receipt"></i> Conceptos cobro</h1>
        <p>Registro Conceptos</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> Orden de compra</li>
        <li class="breadcrumb-item"><a href="#">Conceptos</a></li>
        <li class="breadcrumb-item"><a href="#">Editar</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-md-12">
                    <legend><?= __('Editar Concepto') ?></legend>
                    <hr>
                </div>
                <div class="col-lg-12">
                    <?= $this->Form->create($conceptocobro,['class' => 'form-horizontal']) ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Marca</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('marca',['class' => 'form-control', 'required' => true, 'placeholder' => 'Marca','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Modelo</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('modelo',['class' => 'form-control', 'required' => true, 'placeholder' => 'Modelo','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Descripción</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('descripcion',['class' => 'form-control', 'required' => true, 'placeholder' => 'Descripción','label' => false]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Proveedor</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('idProveedor',['class' => 'form-control', 'required' => true, 'placeholder' => 'Proveedor','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Precio</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('precio',['class' => 'form-control', 'required' => true, 'placeholder' => 'Precio','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Cantidad</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('cantidad',['class' => 'form-control', 'required' => true, 'placeholder' => 'Cantidad','label' => false]); ?>
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
        <?php
            echo $this->Form->control('cantidad');
            echo $this->Form->control('marca');
            echo $this->Form->control('modelo');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('idProveedor');
            echo $this->Form->control('precio');
        ?>