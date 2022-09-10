<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ordencompra $ordencompra
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ordencompra->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ordencompra->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ordencompra'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ordencompra form large-9 medium-8 columns content">
    <?= $this->Form->create($ordencompra) ?>
    <fieldset>
        <legend><?= __('Edit Ordencompra') ?></legend>
        <?php
            echo $this->Form->control('idTicket');
            echo $this->Form->control('nombre');
            echo $this->Form->control('lugarEntrega');
            echo $this->Form->control('responsable');
            echo $this->Form->control('tipoOrden');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
