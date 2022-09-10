<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Certificacione[]|\Cake\Collection\CollectionInterface $certificaciones
 */
?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-toolbox"></i> Certificaciones</h1>
        <p>Registro de certificaciones</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Certificaciones</a></li>
    </ul>
</div>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Certificacione'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="certificaciones index large-9 medium-8 columns content">
    <h3><?= __('Certificaciones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('certificacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fechaCertificacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fechaVencimiento') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($certificaciones as $certificacione): ?>
            <tr>
                <td><?= $this->Number->format($certificacione->id) ?></td>
                <td><?= h($certificacione->certificacion) ?></td>
                <td><?= h($certificacione->descripcion) ?></td>
                <td><?= h($certificacione->fechaCertificacion) ?></td>
                <td><?= h($certificacione->fechaVencimiento) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $certificacione->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $certificacione->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $certificacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $certificacione->id)]) ?>
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
