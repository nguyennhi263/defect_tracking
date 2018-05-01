<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DefectPlace[]|\Cake\Collection\CollectionInterface $defectPlaces
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Defect Place'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Unit Types'), ['controller' => 'UnitTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit Type'), ['controller' => 'UnitTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="defectPlaces index large-9 medium-8 columns content">
    <h3><?= __('Defect Places') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('DefectPlaceID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('UnitTypeID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('DefectPlaceName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('coordX') ?></th>
                <th scope="col"><?= $this->Paginator->sort('coordY') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($defectPlaces as $defectPlace): ?>
            <tr>
                <td><?= $this->Number->format($defectPlace->DefectPlaceID) ?></td>
                <td><?= $defectPlace->has('unit_type') ? $this->Html->link($defectPlace->unit_type->name, ['controller' => 'UnitTypes', 'action' => 'view', $defectPlace->unit_type->UnitTypeID]) : '' ?></td>
                <td><?= h($defectPlace->DefectPlaceName) ?></td>
                <td><?= $this->Number->format($defectPlace->coordX) ?></td>
                <td><?= $this->Number->format($defectPlace->coordY) ?></td>
                <td><?= h($defectPlace->created) ?></td>
                <td><?= h($defectPlace->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $defectPlace->DefectPlaceID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $defectPlace->DefectPlaceID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $defectPlace->DefectPlaceID], ['confirm' => __('Are you sure you want to delete # {0}?', $defectPlace->DefectPlaceID)]) ?>
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
