<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\File $file
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit File'), ['action' => 'edit', $file->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete File'), ['action' => 'delete', $file->id], ['confirm' => __('Are you sure you want to delete # {0}?', $file->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adresses'), ['controller' => 'Adresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adress'), ['controller' => 'Adresses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="files view large-9 medium-8 columns content">
    <h3><?= h($file->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($file->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Path') ?></th>
            <td><?= h($file->path) ?></td>
        </tr>

        <!--tr>
            <th scope="row"><--?= __('Id') ?></th>
            <td><--?= $this->Number->format($file->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><--?= __('Created') ?></th>
            <td><--?= h($file->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><--?= __('Modified') ?></th>
            <td><--?= h($file->modified) ?></td>
        </tr-->
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $file->status ? __('Neuf') : __('Usager'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Picture') ?></th>
            <td><?php
            echo $this->Html->image($file->path . $file->name, [
                "alt" => $file->name,
                "width" => "220px",
                "height" => "150px",
                'url' => ['action' => 'view', $file->id]
            ]);
            ?></td></tr>

    </table>
    <!--div class="related">
        <h4><-?= __('Related Adresses') ?></h4>
        <-?php if (!empty($file->adresses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <--th scope="col"><--?= __('Id') ?></th>
                <th scope="col"><--?= __('User Id') ?></th>
                <th scope="col"><-?= __('Title') ?></th>
                <--th scope="col"><--?= __('Date Adresse Envoi') ?></th>
                <th scope="col"><--?= __('Date Adresse Reception') ?></th>
                <th scope="col"><-?= __('Type Domicile') ?></th>
                <th scope="col"><-?= __('Facture') ?></th>
                <--th scope="col"><--?= __('Slug') ?></th>
                <th scope="col"><-?= __('Published') ?></th>
                <th scope="col"><--?= __('Created') ?></th>
                <th scope="col"><--?= __('Modified') ?></th>
                <th scope="col" class="actions"><-?= __('Actions') ?></th>
            </tr>
            <--?php foreach ($file->adresses as $adresses): ?>
            <tr>
                <td><--?= h($adresses->id) ?></td>
                <td><--?= h($adresses->user_id) ?></td>
                <td><-?= h($adresses->title) ?></td>
                <td><--?= h($adresses->date_adresse_envoi) ?></td>
                <td><--?= h($adresses->date_adresse_Reception) ?></td>
                <td><-?= h($adresses->type_domicile) ?></td>
                <td><-?= h($adresses->facture) ?></td>
                <td><--?= h($adresses->slug) ?></td>
                <td><--?= h($adresses->published) ?></td>
                <td><-?= $adresses->published ? __('Yes') : __('No'); ?></td>
                <td><--?= h($adresses->created) ?></td>
                <td><--?= h($adresses->modified) ?></td>
                <td class="actions">
                    <-?= $this->Html->link(__('View'), ['controller' => 'Adresses', 'action' => 'view', $adresses->id]) ?>
                    <-?= $this->Html->link(__('Edit'), ['controller' => 'Adresses', 'action' => 'edit', $adresses->id]) ?>
                    <-?= $this->Form->postLink(__('Delete'), ['controller' => 'Adresses', 'action' => 'delete', $adresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adresses->id)]) ?>
                </td>
            </tr>
            <-?php endforeach; ?>
        </table>
        <-?php endif; ?>
    </div-->
</div>
