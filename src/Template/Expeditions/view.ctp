<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Expedition $expedition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Expedition'), ['action' => 'edit', $expedition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Expedition'), ['action' => 'delete', $expedition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expedition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Expeditions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Expedition'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adresses'), ['controller' => 'Adresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adress'), ['controller' => 'Adresses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="expeditions view large-9 medium-8 columns content">
    <h3><?= h($expedition->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($expedition->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($expedition->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($expedition->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Adresses') ?></h4>
        <?php if (!empty($expedition->adresses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Home Type') ?></th>
                <th scope="col"><?= __('Bill') ?></th>
                <!--th scope="col"><-?= __('Slug') ?></th-->
                <th scope="col"><?= __('Published') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($expedition->adresses as $adresses): ?>
            <tr>
                <td><?= h($adresses->title) ?></td>
                <td><?= h($adresses->type_domicile) ?></td>
                <td><?= h($adresses->facture) ?></td>
                <!--td><-?= h($adresses->slug) ?></td-->
                <td><?= h($adresses->published) ? __('Yes') : __('No'); ?></td>
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
