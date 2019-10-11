<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdressesDescription[]|\Cake\Collection\CollectionInterface $adressesDescriptions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Adresses Description'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adresses'), ['controller' => 'Adresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adress'), ['controller' => 'Adresses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adressesDescriptions index large-9 medium-8 columns content">
    <h3><?= __('Adresses Descriptions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!--th scope="col"><-?= $this->Paginator->sort('id') ?></th-->
                <th scope="col"><?= $this->Paginator->sort('adress_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('City') ?></th>
                <th scope="col"><?= $this->Paginator->sort('province') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Country') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zip_code') ?></th>
                <!--th scope="col"><-?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><-?= $this->Paginator->sort('modified') ?></th-->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adressesDescriptions as $adressesDescription): ?>
            <tr>
                <!--td><--?= $this->Number->format($adressesDescription->id) ?></td-->
                <td><?= $adressesDescription->has('adress') ? $this->Html->link($adressesDescription->adress->title, ['controller' => 'Adresses', 'action' => 'view', $adressesDescription->adress->id]) : '' ?></td>
                <td><?= h($adressesDescription->ville) ?></td>
                <td><?= h($adressesDescription->province) ?></td>
                <td><?= h($adressesDescription->pays) ?></td>
                <td><?= h($adressesDescription->zip_code) ?></td>
                <!--td><--?= h($adressesDescription->created) ?></td>
                <td><--?= h($adressesDescription->modified) ?></td-->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adressesDescription->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adressesDescription->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adressesDescription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adressesDescription->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
