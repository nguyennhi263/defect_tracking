<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DefectHeader $defectHeader
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Defect Headers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Defect Items'), ['controller' => 'DefectItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Defect Item'), ['controller' => 'DefectItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="defectHeaders form large-9 medium-8 columns content">
    <?= $this->Form->create($defectHeader) ?>
    <fieldset>
        <legend><?= __('Add Defect Header') ?></legend>
        <?php
            echo $this->Form->control('UnitID', ['options' => $units]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
