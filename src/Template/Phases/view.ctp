<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Phase $phase
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Phase'), ['action' => 'edit', $phase->PhaseID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Phase'), ['action' => 'delete', $phase->PhaseID], ['confirm' => __('Are you sure you want to delete # {0}?', $phase->PhaseID)]) ?> </li>
        <li><?= $this->Html->link(__('List Phases'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phase'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blocks'), ['controller' => 'Blocks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Block'), ['controller' => 'Blocks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="phases view large-9 medium-8 columns content">
    <h3><?= h($phase->PhaseName) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('PhaseName') ?></th>
            <td><?= h($phase->PhaseName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProjectName') ?></th>
            <td><?= $phase->has('ProjectName') ? $this->Html->link($phase->ProjectName->ProjectID, ['controller' => 'Projects', 'action' => 'view', $phase->ProjectName->ProjectID]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PhaseID') ?></th>
            <td><?= $this->Number->format($phase->PhaseID) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Blocks') ?></h4>
        <?php if (!empty($phase->blocks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('BlockID') ?></th>
                <th scope="col"><?= __('PhaseID') ?></th>
                <th scope="col"><?= __('BlockName') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($phase->blocks as $blocks): ?>
            <tr>
                <td><?= h($blocks->BlockID) ?></td>
                <td><?= h($blocks->PhaseID) ?></td>
                <td><?= h($blocks->BlockName) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Blocks', 'action' => 'view', $blocks->BlockID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Blocks', 'action' => 'edit', $blocks->BlockID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Blocks', 'action' => 'delete', $blocks->BlockID], ['confirm' => __('Are you sure you want to delete # {0}?', $blocks->BlockID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
