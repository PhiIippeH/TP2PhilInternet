<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdressesDescription $adressesDescription
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $adressesDescription->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $adressesDescription->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Adresses Descriptions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Adresses'), ['controller' => 'Adresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adress'), ['controller' => 'Adresses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adressesDescriptions form large-9 medium-8 columns content">
    <?= $this->Form->create($adressesDescription) ?>
    <fieldset>
        <legend><?= __('Edit Adresses Description') ?></legend>
        <?php
            echo $this->Form->control('adress_id', ['options' => $adresses]);
            echo $this->Form->control('ville');
            echo $this->Form->control('province');
            echo $this->Form->control('pays');
            echo $this->Form->control('zip_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
