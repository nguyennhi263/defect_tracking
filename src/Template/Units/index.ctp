<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit[]|\Cake\Collection\CollectionInterface $units
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Blocks'), ['controller' => 'Blocks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Block'), ['controller' => 'Blocks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="units index large-9 medium-8 columns content">
    <h3><?= __('Units') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('UnitID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('BlockID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('UnitName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('UnitFloor') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($units as $unit): ?>
            <tr>
                <td><?= $this->Number->format($unit->UnitID) ?></td>
                <td><?= $unit->has('block') ? $this->Html->link($unit->block->BlockID, ['controller' => 'Blocks', 'action' => 'view', $unit->block->BlockID]) : '' ?></td>
                <td><?= h($unit->UnitName) ?></td>
                <td><?= $this->Number->format($unit->UnitFloor) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $unit->UnitID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $unit->UnitID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $unit->UnitID], ['confirm' => __('Are you sure you want to delete # {0}?', $unit->UnitID)]) ?>
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
