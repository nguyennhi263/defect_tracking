<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Phase[]|\Cake\Collection\CollectionInterface $phases
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Phase'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Blocks'), ['controller' => 'Blocks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Block'), ['controller' => 'Blocks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="phases index large-9 medium-8 columns content">
    <h3><?= __('Phases') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('PhaseID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('PhaseName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ProjectID') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($phases as $phase): ?>
            <tr>
                <td><?= $this->Number->format($phase->PhaseID) ?></td>
                <td><?= h($phase->PhaseName) ?></td>
                <td><?= $phase->has('ProjectName') ? $this->Html->link($phase->ProjectName->ProjectID, ['controller' => 'Projects', 'action' => 'view', $phase->ProjectName->ProjectID]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $phase->PhaseID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $phase->PhaseID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $phase->PhaseID], ['confirm' => __('Are you sure you want to delete # {0}?', $phase->PhaseID)]) ?>
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
