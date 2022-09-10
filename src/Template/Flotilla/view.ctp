<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Flotilla $flotilla
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Flotilla'), ['action' => 'edit', $flotilla->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Flotilla'), ['action' => 'delete', $flotilla->id], ['confirm' => __('Are you sure you want to delete # {0}?', $flotilla->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Flotilla'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flotilla'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="flotilla view large-9 medium-8 columns content">
    <h3><?= h($flotilla->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($flotilla->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdVehiculo') ?></th>
            <td><?= $this->Number->format($flotilla->idVehiculo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdTicket') ?></th>
            <td><?= $this->Number->format($flotilla->idTicket) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdIntervencion') ?></th>
            <td><?= $this->Number->format($flotilla->idIntervencion) ?></td>
        </tr>
    </table>
</div>
