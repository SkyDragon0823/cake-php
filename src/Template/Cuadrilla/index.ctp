<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cuadrilla[]|\Cake\Collection\CollectionInterface $cuadrilla
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cuadrilla'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cuadrilla index large-9 medium-8 columns content">
    <h3><?= __('Cuadrilla') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idTecnico') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idTicket') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idIntervencion') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cuadrilla as $cuadrilla): ?>
            <tr>
                <td><?= $this->Number->format($cuadrilla->id) ?></td>
                <td><?= $this->Number->format($cuadrilla->idTecnico) ?></td>
                <td><?= $this->Number->format($cuadrilla->idTicket) ?></td>
                <td><?= $this->Number->format($cuadrilla->idIntervencion) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cuadrilla->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cuadrilla->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cuadrilla->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cuadrilla->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
