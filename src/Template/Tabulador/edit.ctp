<div class="app-title">
    <div>
        <h1><i class="fa fa-comments-dollar"></i>Tabuladores</h1>
        <p>Registro tabuladores</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i>Tabulador</li>
        <li class="breadcrumb-item"><a href="#">Editar</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-md-12">
                    <legend><?= __('Editar Tabulador') ?></legend>
                    <hr>
                </div>
                <div class="col-lg-12">
                    <?= $this->Form->create($tabulador,['class' => 'form-horizontal']) ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Cliente</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('cliente', ['options' => $clientes, 'class' => 'form-control', 'required' => true, 'label' => false, 'redonly' => true,'empty' => 'Cliente','style' => 'pointer-events:none']); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Clave</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('clave',['class' => 'form-control', 'required' => true, 'placeholder' => 'Clave','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Descripción</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('descripcion',['class' => 'form-control', 'required' => true, 'placeholder' => 'Descripción','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Costo</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('costo',['class' => 'form-control', 'required' => true, 'placeholder' => 'costo','label' => false]); ?>
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