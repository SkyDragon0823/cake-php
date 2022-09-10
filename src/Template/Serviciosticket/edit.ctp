<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Serviciosticket $serviciosticket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $serviciosticket->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $serviciosticket->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Serviciosticket'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="serviciosticket form large-9 medium-8 columns content">
    <?= $this->Form->create($serviciosticket) ?>
    <fieldset>
        <legend><?= __('Edit Serviciosticket') ?></legend>
        <?php
            echo $this->Form->control('idTicket');
            echo $this->Form->control('idServicio');
            echo $this->Form->control('tipoServicio');
            echo $this->Form->control('cantidad');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
