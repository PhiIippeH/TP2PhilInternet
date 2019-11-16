<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shipper $shipper
 */
?>
<?php
$this->extend('/Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
        <li><?= $this->Html->link(__('List Shippers'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Shippers'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($shipper); ?>
fieldset>
<legend><?= __('Add {0}', ['Shipper']) ?></legend>
<?php
echo $this->Form->control('company_name');
echo $this->Form->control('phone');
?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>

