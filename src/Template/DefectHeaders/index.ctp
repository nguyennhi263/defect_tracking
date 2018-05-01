<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DefectHeader[]|\Cake\Collection\CollectionInterface $defectHeaders
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Defect Header'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Defect Items'), ['controller' => 'DefectItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Defect Item'), ['controller' => 'DefectItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="defectHeaders index large-9 medium-8 columns content">
    <h3><?= __('Defect Headers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('DefectID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('UnitID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($defectHeaders as $defectHeader): ?>
            <tr>
                <td><?= $this->Number->format($defectHeader->DefectID) ?></td>
                <td><?= $defectHeader->has('UnitNo') ? $this->Html->link($defectHeader->UnitNo->UnitID, ['controller' => 'Units', 'action' => 'view', $defectHeader->UnitNo->UnitID]) : '' ?></td>
                <td><?= h($defectHeader->created) ?></td>
                <td><?= h($defectHeader->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $defectHeader->DefectID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $defectHeader->DefectID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $defectHeader->DefectID], ['confirm' => __('Are you sure you want to delete # {0}?', $defectHeader->DefectID)]) ?>
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
