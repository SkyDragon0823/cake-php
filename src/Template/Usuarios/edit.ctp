 <div class="app-title">
    <div>
        <h1><i class="fa fa-users"></i>Editar usuario</h1>
        <p>Edición de usuarios</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="">Usuarios</a></li>
        <li class="breadcrumb-item"><a href="#">Editar</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-md-12">
                    <legend><?= __('Nuevo usuario') ?></legend>
                    <hr>
                </div>
                <div class="col-lg-12">
                    <?= $this->Form->create($usuario,['class' => 'form-horizontal']) ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Usuario</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('username',['class' => 'form-control', 'required' => true, 'placeholder' => 'Usuario','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Contraseña</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('password',['class' => 'form-control', 'required' => true, 'placeholder' => 'Contraseña','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Nombre</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('nombre',['class' => 'form-control', 'required' => true, 'placeholder' => 'Nombre','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Apellido Paterno</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('apellido1',['class' => 'form-control', 'required' => true, 'placeholder' => 'Apellido Paterno','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Apellido Materno</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('apellido2',['class' => 'form-control', 'placeholder' => 'Apellido Materno','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Cliente relacionado</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('idCliente',['options' => $clientes,'class' => 'form-control js-example-basic-single', 'placeholder' => 'Apellido Materno','label' => false,'empty' => 'Cliente']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Teléfono</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('telefono',['class' => 'form-control', 'placeholder' => 'Telefono','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Celular</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('celular',['class' => 'form-control', 'placeholder' => 'Celular','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Correo</label>
                                    <div class="col-md-8">
                                        <?php echo $this->Form->control('correo',['class' => 'form-control', 'placeholder' => 'Correo','label' => false, 'type' => 'email']); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Puesto</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('puesto',['class' => 'form-control', 'placeholder' => 'Puesto','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Estatus</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('estatus', [
                                            'options' => [1 => 'Activo', 2 => 'Inactivo'],
                                            'class' => 'form-control', 'required' => true, 'label' => false
                                        ]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Tipo usuario</label>
                                    <div class="col-md-8">
                                    <?= $this->Form->control('tipoUsuario', [
                                            'options' => [1 => 'Administrador', 2 => 'Coordinador', 3 => 'Técnico' , 4 => 'Solicitante', 5 => 'Ventas'],
                                            'class' => 'form-control', 'required' => true, 'label' => false
                                        ]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <?= $this->Html->link('<i class="fas fa-chevron-left fa-fw"></i> Regresar', ['action' => 'index'],['escape' => false, 'class' => 'btn btn-primary']) ?>
                            <?= $this->Form->button(_('<i class="fa fa-plus-circle fa-lg fa-fw"></i> Modificar'),['class' => 'btn btn-primary']); ?>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
        </div>
    </div>
</div>
<?= $this->Html->script(array('plugins/select2.min.js')) ?>
<script>
$('document').ready(function(){
    $(".js-example-basic-single").select2({
        width: 'resolve'
    });
});
</script>