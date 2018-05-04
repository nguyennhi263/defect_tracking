<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DefectItem $defectItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Defect Item'), ['action' => 'edit', $defectItem->DefectItemID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Defect Item'), ['action' => 'delete', $defectItem->DefectItemID], ['confirm' => __('Are you sure you want to delete # {0}?', $defectItem->DefectItemID)]) ?> </li>
        <li><?= $this->Html->link(__('List Defect Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Defect Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Defect Headers'), ['controller' => 'DefectHeaders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Defect Header'), ['controller' => 'DefectHeaders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Defect Places'), ['controller' => 'DefectPlaces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Defect Place'), ['controller' => 'DefectPlaces', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trade Descriptions'), ['controller' => 'TradeDescriptions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trade Description'), ['controller' => 'TradeDescriptions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="defectItems view large-9 medium-8 columns content">
    <h3><?= h($defectItem->DefectItemID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('UnitNo') ?></th>
            <td><?= $defectItem->has('UnitNo') ? $this->Html->link($defectItem->UnitNo->DefectID, ['controller' => 'DefectHeaders', 'action' => 'view', $defectItem->UnitNo->DefectID]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TradeDescriptionName') ?></th>
            <td><?= $defectItem->has('TradeDescriptionName') ? $this->Html->link($defectItem->TradeDescriptionName->TradeDescriptionDetail, ['controller' => 'TradeDescriptions', 'action' => 'view', $defectItem->TradeDescriptionName->TradeDescriptionID]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PlaceName') ?></th>
            <td><?= $defectItem->has('PlaceName') ? $this->Html->link($defectItem->PlaceName->DefectPlaceName, ['controller' => 'DefectPlaces', 'action' => 'view', $defectItem->PlaceName->DefectPlaceID]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($defectItem->Note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DefectItemID') ?></th>
            <td><?= $this->Number->format($defectItem->DefectItemID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CloseDate') ?></th>
            <td><?= h($defectItem->CloseDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($defectItem->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($defectItem->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('ImageFileNameBefore') ?></h4>
        <?= $this->Text->autoParagraph(h($defectItem->ImageFileNameBefore)); ?>
    </div>
    <div class="row">
        <h4><?= __('ImageFileNameAfter') ?></h4>
        <?= $this->Text->autoParagraph(h($defectItem->ImageFileNameAfter)); ?>
    </div>
    <div class="row">
        <h4><?= __('DefectStatus') ?></h4>
        <?= $this->Text->autoParagraph(h($defectItem->DefectStatus)); ?>
    </div>
</div>
