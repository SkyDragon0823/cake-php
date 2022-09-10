<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Serviciosticket[]|\Cake\Collection\CollectionInterface $serviciosticket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Serviciosticket'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="serviciosticket index large-9 medium-8 columns content">
    <h3><?= __('Serviciosticket') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idTicket') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idServicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipoServicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantidad') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($serviciosticket as $serviciosticket): ?>
            <tr>
                <td><?= $this->Number->format($serviciosticket->id) ?></td>
                <td><?= $this->Number->format($serviciosticket->idTicket) ?></td>
                <td><?= $this->Number->format($serviciosticket->idServicio) ?></td>
                <td><?= $this->Number->format($serviciosticket->tipoServicio) ?></td>
                <td><?= $this->Number->format($serviciosticket->cantidad) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $serviciosticket->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $serviciosticket->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $serviciosticket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviciosticket->id)]) ?>
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
