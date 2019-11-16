<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adress $adress
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $adress->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $adress->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Adresses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adresses Descriptions'), ['controller' => 'AdressesDescriptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adresses Description'), ['controller' => 'AdressesDescriptions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Expeditions'), ['controller' => 'Expeditions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Expedition'), ['controller' => 'Expeditions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adresses form large-9 medium-8 columns content">
    <?= $this->Form->create($adress) ?>
    <fieldset>
        <legend><?= __('Edit Adress') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('type_domicile');
            echo $this->Form->control('facture');
            echo $this->Form->control('Category_id', ['options' => $categories]);
            echo $this->Form->control('subcategory', ['options' => $subcategories]);
            echo $this->Form->control('published');
            echo $this->Form->control('expeditions._ids', ['options' => $expeditions]);
            echo $this->Form->control('files._ids', ['options' => $files]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
