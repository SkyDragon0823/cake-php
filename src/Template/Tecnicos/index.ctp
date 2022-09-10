<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tecnico[]|\Cake\Collection\CollectionInterface $tecnicos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tecnico'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tecnicos index large-9 medium-8 columns content">
    <h3><?= __('Tecnicos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idUsuario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellido1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellido2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idCliente') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idProveedor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ims') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ubicacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('puesto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registroImms') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sueldo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('domicilio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('celularEmpresa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefonoEmpresa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rfc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('maxGradoEstudios') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ine') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tecnicos as $tecnico): ?>
            <tr>
                <td><?= $this->Number->format($tecnico->id) ?></td>
                <td><?= h($tecnico->created) ?></td>
                <td><?= h($tecnico->modified) ?></td>
                <td><?= $this->Number->format($tecnico->idUsuario) ?></td>
                <td><?= h($tecnico->nombre) ?></td>
                <td><?= h($tecnico->apellido1) ?></td>
                <td><?= h($tecnico->apellido2) ?></td>
                <td><?= $this->Number->format($tecnico->idCliente) ?></td>
                <td><?= $this->Number->format($tecnico->idProveedor) ?></td>
                <td><?= h($tecnico->ims) ?></td>
                <td><?= h($tecnico->ubicacion) ?></td>
                <td><?= h($tecnico->puesto) ?></td>
                <td><?= h($tecnico->registroImms) ?></td>
                <td><?= $this->Number->format($tecnico->sueldo) ?></td>
                <td><?= h($tecnico->domicilio) ?></td>
                <td><?= h($tecnico->celularEmpresa) ?></td>
                <td><?= h($tecnico->telefonoEmpresa) ?></td>
                <td><?= h($tecnico->rfc) ?></td>
                <td><?= h($tecnico->maxGradoEstudios) ?></td>
                <td><?= h($tecnico->ine) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tecnico->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tecnico->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tecnico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tecnico->id)]) ?>
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
