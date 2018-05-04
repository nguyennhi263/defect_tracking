<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Block[]|\Cake\Collection\CollectionInterface $blocks
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Block'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Phases'), ['controller' => 'Phases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phase'), ['controller' => 'Phases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contractors'), ['controller' => 'Contractors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contractor'), ['controller' => 'Contractors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="blocks index large-9 medium-8 columns content">
    <h3><?= __('Blocks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('BlockID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('PhaseID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('BlockName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ContractorID') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blocks as $block): ?>
            <tr>
                <td><?= $this->Number->format($block->BlockID) ?></td>
                <td><?= $block->has('phase') ? $this->Html->link($block->phase->PhaseName, ['controller' => 'Phases', 'action' => 'view', $block->phase->PhaseID]) : '' ?></td>
                <td><?= h($block->BlockName) ?></td>
                <td><?= $block->has('contractor') ? $this->Html->link($block->contractor->ContractorName, ['controller' => 'Contractors', 'action' => 'view', $block->contractor->ContractorID]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $block->BlockID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $block->BlockID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $block->BlockID], ['confirm' => __('Are you sure you want to delete # {0}?', $block->BlockID)]) ?>
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
