<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conceptoscobro $conceptoscobro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Conceptoscobro'), ['action' => 'edit', $conceptoscobro->idOrdenCompra]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Conceptoscobro'), ['action' => 'delete', $conceptoscobro->idOrdenCompra], ['confirm' => __('Are you sure you want to delete # {0}?', $conceptoscobro->idOrdenCompra)]) ?> </li>
        <li><?= $this->Html->link(__('List Conceptoscobro'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conceptoscobro'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="conceptoscobro view large-9 medium-8 columns content">
    <h3><?= h($conceptoscobro->idOrdenCompra) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Marca') ?></th>
            <td><?= h($conceptoscobro->marca) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modelo') ?></th>
            <td><?= h($conceptoscobro->modelo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($conceptoscobro->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdOrdenCompra') ?></th>
            <td><?= $this->Number->format($conceptoscobro->idOrdenCompra) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad') ?></th>
            <td><?= $this->Number->format($conceptoscobro->cantidad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdProveedor') ?></th>
            <td><?= $this->Number->format($conceptoscobro->idProveedor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precio') ?></th>
            <td><?= $this->Number->format($conceptoscobro->precio) ?></td>
        </tr>
    </table>
</div>
