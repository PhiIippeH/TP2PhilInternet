<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subcategory $subcategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subcategory'), ['action' => 'edit', $subcategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subcategory'), ['action' => 'delete', $subcategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subcategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subcategories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subcategory'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adresses'), ['controller' => 'Adresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adress'), ['controller' => 'Adresses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subcategories view large-9 medium-8 columns content">
    <h3><?= h($subcategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $subcategory->has('category') ? $this->Html->link($subcategory->category->name, ['controller' => 'Categories', 'action' => 'view', $subcategory->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($subcategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subcategory->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Adresses') ?></h4>
        <?php if (!empty($subcategory->adresses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Date Adresse Envoi') ?></th>
                <th scope="col"><?= __('Date Adresse Reception') ?></th>
                <th scope="col"><?= __('Type Domicile') ?></th>
                <th scope="col"><?= __('Facture') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Published') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Subcategory Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($subcategory->adresses as $adresses): ?>
            <tr>
                <td><?= h($adresses->id) ?></td>
                <td><?= h($adresses->user_id) ?></td>
                <td><?= h($adresses->title) ?></td>
                <td><?= h($adresses->date_adresse_envoi) ?></td>
                <td><?= h($adresses->date_adresse_Reception) ?></td>
                <td><?= h($adresses->type_domicile) ?></td>
                <td><?= h($adresses->facture) ?></td>
                <td><?= h($adresses->slug) ?></td>
                <td><?= h($adresses->published) ?></td>
                <td><?= h($adresses->created) ?></td>
                <td><?= h($adresses->modified) ?></td>
                <td><?= h($adresses->subcategory_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Adresses', 'action' => 'view', $adresses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Adresses', 'action' => 'edit', $adresses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Adresses', 'action' => 'delete', $adresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adresses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
