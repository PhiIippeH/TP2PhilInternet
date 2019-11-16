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
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $shipper->shipper_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $shipper->shipper_id)]
            )
        ?>
        </li>
        <li><?= $this->Html->link(__('List Shippers'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>

    <?= $this->Form->create($shipper) ?>
    <fieldset>
        <legend><?= __('Edit {0}', ['Shipper']) ?></legend>
        <?php
            echo $this->Form->control('company_name');
            echo $this->Form->control('phone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
