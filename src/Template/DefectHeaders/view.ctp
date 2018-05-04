<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DefectHeader $defectHeader
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Defect Header'), ['action' => 'edit', $defectHeader->DefectID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Defect Header'), ['action' => 'delete', $defectHeader->DefectID], ['confirm' => __('Are you sure you want to delete # {0}?', $defectHeader->DefectID)]) ?> </li>
        <li><?= $this->Html->link(__('List Defect Headers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Defect Header'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Defect Items'), ['controller' => 'DefectItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Defect Item'), ['controller' => 'DefectItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="defectHeaders view large-9 medium-8 columns content">
    <h3><?= h($defectHeader->DefectID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('UnitNo') ?></th>
            <td><?= $defectHeader->has('UnitNo') ? $this->Html->link($defectHeader->UnitNo->UnitID, ['controller' => 'Units', 'action' => 'view', $defectHeader->UnitNo->UnitID]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DefectID') ?></th>
            <td><?= $this->Number->format($defectHeader->DefectID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($defectHeader->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($defectHeader->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Defect Items') ?></h4>
        <?php if (!empty($defectHeader->defect_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('DefectItemID') ?></th>
                <th scope="col"><?= __('DefectID') ?></th>
                <th scope="col"><?= __('TradeDescriptionID') ?></th>
                <th scope="col"><?= __('ImageFileNameBefore') ?></th>
                <th scope="col"><?= __('ImageFileNameAfter') ?></th>
                <th scope="col"><?= __('PlaceID') ?></th>
                <th scope="col"><?= __('CloseDate') ?></th>
                <th scope="col"><?= __('DefectStatus') ?></th>
                <th scope="col"><?= __('Note') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($defectHeader->defect_items as $defectItems): ?>
            <tr>
                <td><?= h($defectItems->DefectItemID) ?></td>
                <td><?= h($defectItems->DefectID) ?></td>
                <td><?= h($defectItems->TradeDescriptionID) ?></td>
                <td><?= h($defectItems->ImageFileNameBefore) ?></td>
                <td><?= h($defectItems->ImageFileNameAfter) ?></td>
                <td><?= h($defectItems->PlaceID) ?></td>
                <td><?= h($defectItems->CloseDate) ?></td>
                <td><?= h($defectItems->DefectStatus) ?></td>
                <td><?= h($defectItems->Note) ?></td>
                <td><?= h($defectItems->created) ?></td>
                <td><?= h($defectItems->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DefectItems', 'action' => 'view', $defectItems->DefectItemID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DefectItems', 'action' => 'edit', $defectItems->DefectItemID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DefectItems', 'action' => 'delete', $defectItems->DefectItemID], ['confirm' => __('Are you sure you want to delete # {0}?', $defectItems->DefectItemID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
