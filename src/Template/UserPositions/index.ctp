<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserPosition[]|\Cake\Collection\CollectionInterface $userPositions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Position'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userPositions index large-9 medium-8 columns content">
    <h3><?= __('User Positions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('PositionID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('PositionName') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userPositions as $userPosition): ?>
            <tr>
                <td><?= $this->Number->format($userPosition->PositionID) ?></td>
                <td><?= h($userPosition->PositionName) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userPosition->PositionID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userPosition->PositionID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userPosition->PositionID], ['confirm' => __('Are you sure you want to delete # {0}?', $userPosition->PositionID)]) ?>
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
