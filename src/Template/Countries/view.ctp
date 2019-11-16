<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Country $country
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Country'), ['action' => 'edit', $country->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Country'), ['action' => 'delete', $country->id], ['confirm' => __('Are you sure you want to delete # {0}?', $country->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adresses Descriptions'), ['controller' => 'AdressesDescriptions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adresses Description'), ['controller' => 'AdressesDescriptions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="countries view large-9 medium-8 columns content">
    <h3><?= h($country->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($country->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Country') ?></h4>
        <?= $this->Text->autoParagraph(h($country->country)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Adresses Descriptions') ?></h4>
        <?php if (!empty($country->adresses_descriptions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Adress Id') ?></th>
                <th scope="col"><?= __('Ville') ?></th>
                <th scope="col"><?= __('Province') ?></th>
                <th scope="col"><?= __('Pays') ?></th>
                <th scope="col"><?= __('Zip Code') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Country Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($country->adresses_descriptions as $adressesDescriptions): ?>
            <tr>
                <td><?= h($adressesDescriptions->id) ?></td>
                <td><?= h($adressesDescriptions->adress_id) ?></td>
                <td><?= h($adressesDescriptions->ville) ?></td>
                <td><?= h($adressesDescriptions->province) ?></td>
                <td><?= h($adressesDescriptions->pays) ?></td>
                <td><?= h($adressesDescriptions->zip_code) ?></td>
                <td><?= h($adressesDescriptions->created) ?></td>
                <td><?= h($adressesDescriptions->modified) ?></td>
                <td><?= h($adressesDescriptions->country_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AdressesDescriptions', 'action' => 'view', $adressesDescriptions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AdressesDescriptions', 'action' => 'edit', $adressesDescriptions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdressesDescriptions', 'action' => 'delete', $adressesDescriptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adressesDescriptions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
