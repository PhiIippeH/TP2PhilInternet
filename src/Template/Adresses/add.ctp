<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Categories",
    "action" => "getCategories",
    "_ext" => "json"
]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Adresses/add', ['block' => 'scriptBottom']);
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adress $adress
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Adresses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adress'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Adresses Descriptions'), ['controller' => 'AdressesDescriptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Expeditions'), ['controller' => 'Expeditions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="adresses form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="categoriesController">
    <?= $this->Form->create($adress) ?>
    <fieldset>
        <legend><?= __('Add Adress') ?></legend>
        <?php
            //echo $this->Form->control('Adress');
            echo $this->Form->control('title');
            echo $this->Form->control('type_domicile');
            echo $this->Form->control('facture');?>
        <div>
            Categories:
            <select name="Category_id"
                    id="category-id"
                    ng-model="category"
                    ng-options="category.name for category in categories track by category.id"
            >
                <option value=''>Select</option>
            </select>
        </div>
        <div>
            Subcategories:
            <select name="subcategory_id"
                    id="subcategory-id"
                    ng-disabled="!category"
                    ng-model="subcategory"
                    ng-options="subcategory.name for subcategory in category.subcategories track by subcategory.id"
            >
                <option value=''>Select</option>
            </select>
        </div>
          <?php  echo $this->Form->control('published');
            echo $this->Form->control('expeditions._ids', ['options' => $expeditions]);
            echo $this->Form->control('files._ids', ['options' => $files]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
