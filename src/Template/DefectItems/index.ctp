<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DefectItem[]|\Cake\Collection\CollectionInterface $defectItems
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Defect Item'), ['action' => 'add']) ?></li>
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
<div class="defectItems index large-9 medium-8 columns content">
    <h3><?= __('Defect Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('DefectItemID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('DefectID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TradeDescriptionID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ContractorID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('PlaceID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CloseDate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Note') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($defectItems as $defectItem): ?>
            <tr>
                <td><?= $this->Number->format($defectItem->DefectItemID) ?></td>
                <td><?= $defectItem->has('UnitNo') ? $this->Html->link($defectItem->UnitNo->DefectID, ['controller' => 'DefectHeaders', 'action' => 'view', $defectItem->UnitNo->DefectID]) : '' ?></td>
                <td><?= $defectItem->has('TradeDescriptionName') ? $this->Html->link($defectItem->TradeDescriptionName->TradeDescriptionName, ['controller' => 'TradeDescriptions', 'action' => 'view', $defectItem->TradeDescriptionName->TradeDescriptionID]) : '' ?></td>
                <td><?= $defectItem->has('ContractorName') ? $this->Html->link($defectItem->ContractorName->ContractorName, ['controller' => 'Contractors', 'action' => 'view', $defectItem->ContractorName->ContractorID]) : '' ?></td>
                <td><?= $defectItem->has('PlaceName') ? $this->Html->link($defectItem->PlaceName->DefectPlaceName, ['controller' => 'DefectPlaces', 'action' => 'view', $defectItem->PlaceName->DefectPlaceID]) : '' ?></td>
                <td><?= h($defectItem->CloseDate) ?></td>
                <td><?= h($defectItem->Note) ?></td>
                <td><?= h($defectItem->created) ?></td>
                <td><?= h($defectItem->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $defectItem->DefectItemID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $defectItem->DefectItemID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $defectItem->DefectItemID], ['confirm' => __('Are you sure you want to delete # {0}?', $defectItem->DefectItemID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
