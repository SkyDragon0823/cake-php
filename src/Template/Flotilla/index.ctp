<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Flotilla[]|\Cake\Collection\CollectionInterface $flotilla
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Flotilla'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="flotilla index large-9 medium-8 columns content">
    <h3><?= __('Flotilla') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idVehiculo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idTicket') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idIntervencion') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flotilla as $flotilla): ?>
            <tr>
                <td><?= $this->Number->format($flotilla->id) ?></td>
                <td><?= $this->Number->format($flotilla->idVehiculo) ?></td>
                <td><?= $this->Number->format($flotilla->idTicket) ?></td>
                <td><?= $this->Number->format($flotilla->idIntervencion) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $flotilla->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $flotilla->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $flotilla->id], ['confirm' => __('Are you sure you want to delete # {0}?', $flotilla->id)]) ?>
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
