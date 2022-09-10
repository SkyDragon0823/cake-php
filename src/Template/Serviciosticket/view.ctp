<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Serviciosticket $serviciosticket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Serviciosticket'), ['action' => 'edit', $serviciosticket->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Serviciosticket'), ['action' => 'delete', $serviciosticket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviciosticket->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Serviciosticket'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Serviciosticket'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="serviciosticket view large-9 medium-8 columns content">
    <h3><?= h($serviciosticket->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($serviciosticket->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdTicket') ?></th>
            <td><?= $this->Number->format($serviciosticket->idTicket) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdServicio') ?></th>
            <td><?= $this->Number->format($serviciosticket->idServicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TipoServicio') ?></th>
            <td><?= $this->Number->format($serviciosticket->tipoServicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad') ?></th>
            <td><?= $this->Number->format($serviciosticket->cantidad) ?></td>
        </tr>
    </table>
</div>
