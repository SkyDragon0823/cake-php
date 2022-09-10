<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sucursale $sucursale
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sucursale'), ['action' => 'edit', $sucursale->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sucursale'), ['action' => 'delete', $sucursale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sucursale->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sucursales'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sucursale'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sucursales view large-9 medium-8 columns content">
    <h3><?= h($sucursale->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($sucursale->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cr') ?></th>
            <td><?= h($sucursale->cr) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direccion') ?></th>
            <td><?= h($sucursale->direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Poblacion') ?></th>
            <td><?= h($sucursale->poblacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sucursale->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdCliente') ?></th>
            <td><?= $this->Number->format($sucursale->idCliente) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= $this->Number->format($sucursale->estado) ?></td>
        </tr>
    </table>
</div>
