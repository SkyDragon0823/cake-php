<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cuadrilla $cuadrilla
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cuadrilla'), ['action' => 'edit', $cuadrilla->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cuadrilla'), ['action' => 'delete', $cuadrilla->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cuadrilla->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cuadrilla'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cuadrilla'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cuadrilla view large-9 medium-8 columns content">
    <h3><?= h($cuadrilla->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cuadrilla->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdTecnico') ?></th>
            <td><?= $this->Number->format($cuadrilla->idTecnico) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdTicket') ?></th>
            <td><?= $this->Number->format($cuadrilla->idTicket) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdIntervencion') ?></th>
            <td><?= $this->Number->format($cuadrilla->idIntervencion) ?></td>
        </tr>
    </table>
</div>
