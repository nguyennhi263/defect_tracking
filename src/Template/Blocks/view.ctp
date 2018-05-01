<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Block $block
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Block'), ['action' => 'edit', $block->BlockID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Block'), ['action' => 'delete', $block->BlockID], ['confirm' => __('Are you sure you want to delete # {0}?', $block->BlockID)]) ?> </li>
        <li><?= $this->Html->link(__('List Blocks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Block'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Phases'), ['controller' => 'Phases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phase'), ['controller' => 'Phases', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="blocks view large-9 medium-8 columns content">
    <h3><?= h($block->BlockID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Phase') ?></th>
            <td><?= $block->has('phase') ? $this->Html->link($block->phase->PhaseID, ['controller' => 'Phases', 'action' => 'view', $block->phase->PhaseID]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BlockName') ?></th>
            <td><?= h($block->BlockName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BlockID') ?></th>
            <td><?= $this->Number->format($block->BlockID) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Units') ?></h4>
        <?php if (!empty($block->units)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('UnitID') ?></th>
                <th scope="col"><?= __('BlockID') ?></th>
                <th scope="col"><?= __('UnitName') ?></th>
                <th scope="col"><?= __('UnitFloor') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($block->units as $units): ?>
            <tr>
                <td><?= h($units->UnitID) ?></td>
                <td><?= h($units->BlockID) ?></td>
                <td><?= h($units->UnitName) ?></td>
                <td><?= h($units->UnitFloor) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Units', 'action' => 'view', $units->UnitID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Units', 'action' => 'edit', $units->UnitID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Units', 'action' => 'delete', $units->UnitID], ['confirm' => __('Are you sure you want to delete # {0}?', $units->UnitID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
