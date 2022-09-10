<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Certificacione $certificacione
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Certificacione'), ['action' => 'edit', $certificacione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Certificacione'), ['action' => 'delete', $certificacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $certificacione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Certificaciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Certificacione'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="certificaciones view large-9 medium-8 columns content">
    <h3><?= h($certificacione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Certificacion') ?></th>
            <td><?= h($certificacione->certificacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($certificacione->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($certificacione->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FechaCertificacion') ?></th>
            <td><?= h($certificacione->fechaCertificacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FechaVencimiento') ?></th>
            <td><?= h($certificacione->fechaVencimiento) ?></td>
        </tr>
    </table>
</div>
