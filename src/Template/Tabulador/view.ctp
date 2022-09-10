<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tabulador $tabulador
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tabulador'), ['action' => 'edit', $tabulador->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tabulador'), ['action' => 'delete', $tabulador->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tabulador->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tabulador'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tabulador'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tabulador view large-9 medium-8 columns content">
    <h3><?= h($tabulador->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Clave') ?></th>
            <td><?= h($tabulador->clave) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($tabulador->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tabulador->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $this->Number->format($tabulador->cliente) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Costo') ?></th>
            <td><?= $this->Number->format($tabulador->costo) ?></td>
        </tr>
    </table>
</div>
