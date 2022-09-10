<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Flotilla $flotilla
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $flotilla->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $flotilla->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Flotilla'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="flotilla form large-9 medium-8 columns content">
    <?= $this->Form->create($flotilla) ?>
    <fieldset>
        <legend><?= __('Edit Flotilla') ?></legend>
        <?php
            echo $this->Form->control('idVehiculo');
            echo $this->Form->control('idTicket');
            echo $this->Form->control('idIntervencion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
