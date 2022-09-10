<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comentario $comentario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $comentario->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $comentario->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Comentarios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="comentarios form large-9 medium-8 columns content">
    <?= $this->Form->create($comentario) ?>
    <fieldset>
        <legend><?= __('Edit Comentario') ?></legend>
        <?php
            echo $this->Form->control('idTicket');
            echo $this->Form->control('titulo');
            echo $this->Form->control('comenatario');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
