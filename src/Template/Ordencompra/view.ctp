<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ordencompra $ordencompra
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ordencompra'), ['action' => 'edit', $ordencompra->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ordencompra'), ['action' => 'delete', $ordencompra->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordencompra->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ordencompra'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ordencompra'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ordencompra view large-9 medium-8 columns content">
    <h3><?= h($ordencompra->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($ordencompra->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LugarEntrega') ?></th>
            <td><?= h($ordencompra->lugarEntrega) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Responsable') ?></th>
            <td><?= h($ordencompra->responsable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ordencompra->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdTicket') ?></th>
            <td><?= $this->Number->format($ordencompra->idTicket) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TipoOrden') ?></th>
            <td><?= $this->Number->format($ordencompra->tipoOrden) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($ordencompra->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($ordencompra->modified) ?></td>
        </tr>
    </table>
</div>
