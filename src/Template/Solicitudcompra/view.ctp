<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Solicitudcompra $solicitudcompra
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Solicitudcompra'), ['action' => 'edit', $solicitudcompra->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Solicitudcompra'), ['action' => 'delete', $solicitudcompra->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solicitudcompra->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Solicitudcompra'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Solicitudcompra'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="solicitudcompra view large-9 medium-8 columns content">
    <h3><?= h($solicitudcompra->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Solicitante') ?></th>
            <td><?= h($solicitudcompra->solicitante) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Departamento') ?></th>
            <td><?= h($solicitudcompra->departamento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LugarEntrega') ?></th>
            <td><?= h($solicitudcompra->lugarEntrega) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Responsable') ?></th>
            <td><?= h($solicitudcompra->responsable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($solicitudcompra->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdTicket') ?></th>
            <td><?= $this->Number->format($solicitudcompra->idTicket) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($solicitudcompra->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($solicitudcompra->modified) ?></td>
        </tr>
    </table>
</div>
