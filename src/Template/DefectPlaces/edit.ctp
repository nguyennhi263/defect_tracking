<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DefectPlace $defectPlace
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $defectPlace->DefectPlaceID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $defectPlace->DefectPlaceID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Defect Places'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Unit Types'), ['controller' => 'UnitTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit Type'), ['controller' => 'UnitTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="defectPlaces form large-9 medium-8 columns content">
    <?= $this->Form->create($defectPlace) ?>
    <fieldset>
        <legend><?= __('Edit Defect Place') ?></legend>
        <?php
            echo $this->Form->control('UnitTypeID', ['options' => $unitTypes]);
            echo $this->Form->control('DefectPlaceName');
            echo $this->Form->control('coordX');
            echo $this->Form->control('coordY');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
