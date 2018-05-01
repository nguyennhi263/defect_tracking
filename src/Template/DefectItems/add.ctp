<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DefectItem $defectItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Defect Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Defect Headers'), ['controller' => 'DefectHeaders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Defect Header'), ['controller' => 'DefectHeaders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contractors'), ['controller' => 'Contractors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contractor'), ['controller' => 'Contractors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Defect Places'), ['controller' => 'DefectPlaces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Defect Place'), ['controller' => 'DefectPlaces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trade Descriptions'), ['controller' => 'TradeDescriptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trade Description'), ['controller' => 'TradeDescriptions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="defectItems form large-9 medium-8 columns content">
    <?= $this->Form->create($defectItem) ?>
    <fieldset>
        <legend><?= __('Add Defect Item') ?></legend>
        <?php
            echo $this->Form->control('DefectID', ['options' => $defectHeaders]);
            echo $this->Form->control('TradeDescriptionID', ['options' => $tradeDescriptions]);
            echo $this->Form->control('ImageFileNameBefore');
            echo $this->Form->control('ImageFileNameAfter');
            echo $this->Form->control('ContractorID', ['options' => $contractors]);
            echo $this->Form->control('PlaceID', ['options' => $defectPlaces]);
            echo $this->Form->control('CloseDate', ['empty' => true]);
            echo $this->Form->control('DefectStatus');
            echo $this->Form->control('Note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
