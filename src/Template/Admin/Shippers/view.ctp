<?php
$this->extend('/Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
        <li><?= $this->Html->link(__('Edit Shipper'), ['action' => 'edit', $shipper->shipper_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Shipper'), ['action' => 'delete', $shipper->shipper_id], ['confirm' => __('Are you sure you want to delete # {0}?', $shipper->shipper_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Shippers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shipper'), ['action' => 'add']) ?> </li>
        <li><?=
            $this->Html->link('Section publique en JS', [
                'prefix' => false,
                'controller' => 'Shippers',
                'action' => 'index'
            ]);
            ?>
        </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<div class="dropdown hidden-xs">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <?= __("Actions") ?>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <?= $this->fetch('tb_actions') ?>
    </ul>
</div>
<?php
$this->end();
?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($shipper->company_name) ?></h3>
    </div>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Company Name') ?></th>
            <td><?= h($shipper->company_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($shipper->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shipper Id') ?></th>
            <td><?= $this->Number->format($shipper->shipper_id) ?></td>
        </tr>
    </table>
</div>
