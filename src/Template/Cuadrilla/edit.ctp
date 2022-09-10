<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cuadrilla $cuadrilla
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cuadrilla->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cuadrilla->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cuadrilla'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cuadrilla form large-9 medium-8 columns content">
    <?= $this->Form->create($cuadrilla) ?>
    <fieldset>
        <legend><?= __('Edit Cuadrilla') ?></legend>
        <?php
            echo $this->Form->control('idTecnico');
            echo $this->Form->control('idTicket');
            echo $this->Form->control('idIntervencion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
