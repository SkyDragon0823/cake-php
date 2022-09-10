<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proveedore $proveedore
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Proveedore'), ['action' => 'edit', $proveedore->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Proveedore'), ['action' => 'delete', $proveedore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $proveedore->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Proveedores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Proveedore'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="proveedores view large-9 medium-8 columns content">
    <h3><?= h($proveedore->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($proveedore->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Servicio') ?></th>
            <td><?= h($proveedore->servicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rfc') ?></th>
            <td><?= h($proveedore->rfc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direccion') ?></th>
            <td><?= h($proveedore->direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Localidad') ?></th>
            <td><?= h($proveedore->localidad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contacto') ?></th>
            <td><?= h($proveedore->contacto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Correo') ?></th>
            <td><?= h($proveedore->correo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($proveedore->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Celular') ?></th>
            <td><?= h($proveedore->celular) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($proveedore->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= $this->Number->format($proveedore->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pais') ?></th>
            <td><?= $this->Number->format($proveedore->pais) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($proveedore->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($proveedore->modified) ?></td>
        </tr>
    </table>
</div>
