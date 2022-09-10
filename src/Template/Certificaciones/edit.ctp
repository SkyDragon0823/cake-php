<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Certificacione $certificacione
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $certificacione->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $certificacione->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Certificaciones'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="certificaciones form large-9 medium-8 columns content">
    <?= $this->Form->create($certificacione) ?>
    <fieldset>
        <legend><?= __('Edit Certificacione') ?></legend>
        <?php
            echo $this->Form->control('certificacion');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('fechaCertificacion', ['empty' => true]);
            echo $this->Form->control('fechaVencimiento', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
