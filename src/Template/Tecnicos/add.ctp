<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tecnico $tecnico
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tecnicos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tecnicos form large-9 medium-8 columns content">
    <?= $this->Form->create($tecnico) ?>
    <fieldset>
        <legend><?= __('Add Tecnico') ?></legend>
        <?php
            echo $this->Form->control('idUsuario');
            echo $this->Form->control('nombre');
            echo $this->Form->control('apellido1');
            echo $this->Form->control('apellido2');
            echo $this->Form->control('idCliente');
            echo $this->Form->control('idProveedor');
            echo $this->Form->control('ims');
            echo $this->Form->control('ubicacion');
            echo $this->Form->control('puesto');
            echo $this->Form->control('registroImms');
            echo $this->Form->control('sueldo');
            echo $this->Form->control('domicilio');
            echo $this->Form->control('celularEmpresa');
            echo $this->Form->control('telefonoEmpresa');
            echo $this->Form->control('rfc');
            echo $this->Form->control('maxGradoEstudios');
            echo $this->Form->control('ine');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
