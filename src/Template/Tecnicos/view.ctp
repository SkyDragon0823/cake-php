<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tecnico $tecnico
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tecnico'), ['action' => 'edit', $tecnico->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tecnico'), ['action' => 'delete', $tecnico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tecnico->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tecnicos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tecnico'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tecnicos view large-9 medium-8 columns content">
    <h3><?= h($tecnico->Array) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($tecnico->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido1') ?></th>
            <td><?= h($tecnico->apellido1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido2') ?></th>
            <td><?= h($tecnico->apellido2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ims') ?></th>
            <td><?= h($tecnico->ims) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ubicacion') ?></th>
            <td><?= h($tecnico->ubicacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Puesto') ?></th>
            <td><?= h($tecnico->puesto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RegistroImms') ?></th>
            <td><?= h($tecnico->registroImms) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Domicilio') ?></th>
            <td><?= h($tecnico->domicilio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CelularEmpresa') ?></th>
            <td><?= h($tecnico->celularEmpresa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TelefonoEmpresa') ?></th>
            <td><?= h($tecnico->telefonoEmpresa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rfc') ?></th>
            <td><?= h($tecnico->rfc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MaxGradoEstudios') ?></th>
            <td><?= h($tecnico->maxGradoEstudios) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ine') ?></th>
            <td><?= h($tecnico->ine) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tecnico->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdUsuario') ?></th>
            <td><?= $this->Number->format($tecnico->idUsuario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdCliente') ?></th>
            <td><?= $this->Number->format($tecnico->idCliente) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdProveedor') ?></th>
            <td><?= $this->Number->format($tecnico->idProveedor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sueldo') ?></th>
            <td><?= $this->Number->format($tecnico->sueldo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tecnico->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tecnico->modified) ?></td>
        </tr>
    </table>
</div>
