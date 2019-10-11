<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdressesDescription $adressesDescription
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Adresses Description'), ['action' => 'edit', $adressesDescription->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Adresses Description'), ['action' => 'delete', $adressesDescription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adressesDescription->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Adresses Descriptions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adresses Description'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adresses'), ['controller' => 'Adresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adress'), ['controller' => 'Adresses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adressesDescriptions view large-9 medium-8 columns content">
    <h3><?= h($adressesDescription->adress->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Adress') ?></th>
            <td><?= $adressesDescription->has('adress') ? $this->Html->link($adressesDescription->adress->title, ['controller' => 'Adresses', 'action' => 'view', $adressesDescription->adress->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($adressesDescription->ville) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= h($adressesDescription->province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($adressesDescription->pays) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zip Code') ?></th>
            <td><?= h($adressesDescription->zip_code) ?></td>
        </tr>
        <!--tr>
            <th scope="row"><--?= __('Id') ?></th>
            <td><--?= $this->Number->format($adressesDescription->id) ?></td>
        </tr-->
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($adressesDescription->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($adressesDescription->modified) ?></td>
        </tr>
    </table>
</div>
