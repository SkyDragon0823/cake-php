<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comentario $comentario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Comentario'), ['action' => 'edit', $comentario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comentario'), ['action' => 'delete', $comentario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comentario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Comentarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comentario'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="comentarios view large-9 medium-8 columns content">
    <h3><?= h($comentario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($comentario->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comenatario') ?></th>
            <td><?= h($comentario->comenatario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($comentario->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdTicket') ?></th>
            <td><?= $this->Number->format($comentario->idTicket) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($comentario->created) ?></td>
        </tr>
    </table>
</div>
