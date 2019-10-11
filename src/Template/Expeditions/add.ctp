<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Expedition $expedition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Expeditions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Adresses'), ['controller' => 'Adresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adress'), ['controller' => 'Adresses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="expeditions form large-9 medium-8 columns content">
    <?= $this->Form->create($expedition) ?>
    <fieldset>
        <legend><?= __('Add Expedition') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('adresses._ids', ['options' => $adresses]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
