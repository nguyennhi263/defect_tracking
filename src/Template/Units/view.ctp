<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit $unit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Unit'), ['action' => 'edit', $unit->UnitID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Unit'), ['action' => 'delete', $unit->UnitID], ['confirm' => __('Are you sure you want to delete # {0}?', $unit->UnitID)]) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blocks'), ['controller' => 'Blocks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Block'), ['controller' => 'Blocks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="units view large-9 medium-8 columns content">
    <h3><?= h($unit->UnitID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Block') ?></th>
            <td><?= $unit->has('block') ? $this->Html->link($unit->block->BlockID, ['controller' => 'Blocks', 'action' => 'view', $unit->block->BlockID]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UnitName') ?></th>
            <td><?= h($unit->UnitName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UnitID') ?></th>
            <td><?= $this->Number->format($unit->UnitID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UnitFloor') ?></th>
            <td><?= $this->Number->format($unit->UnitFloor) ?></td>
        </tr>
    </table>
</div>
