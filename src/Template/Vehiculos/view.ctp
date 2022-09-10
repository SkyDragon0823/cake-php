<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehiculo $vehiculo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehiculo'), ['action' => 'edit', $vehiculo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehiculo'), ['action' => 'delete', $vehiculo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiculo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehiculos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehiculo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehiculos view large-9 medium-8 columns content">
    <h3><?= h($vehiculo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Marca') ?></th>
            <td><?= h($vehiculo->marca) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modelo') ?></th>
            <td><?= h($vehiculo->modelo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Placa') ?></th>
            <td><?= h($vehiculo->placa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehiculo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdRastreador') ?></th>
            <td><?= $this->Number->format($vehiculo->idRastreador) ?></td>
        </tr>
    </table>
</div>
