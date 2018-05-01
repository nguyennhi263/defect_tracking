<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UnitType $unitType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Unit Type'), ['action' => 'edit', $unitType->UnitTypeID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Unit Type'), ['action' => 'delete', $unitType->UnitTypeID], ['confirm' => __('Are you sure you want to delete # {0}?', $unitType->UnitTypeID)]) ?> </li>
        <li><?= $this->Html->link(__('List Unit Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="unitTypes view large-9 medium-8 columns content">
    <h3><?= h($unitType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($unitType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($unitType->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UnitTypeID') ?></th>
            <td><?= $this->Number->format($unitType->UnitTypeID) ?></td>
        </tr>
    </table>
</div>
