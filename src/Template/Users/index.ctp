<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('UserID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('LoginName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('UserPass') ?></th>
                <th scope="col"><?= $this->Paginator->sort('PositionID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FullName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Imei') ?></th>
                <th scope="col"><?= $this->Paginator->sort('RecordStatus') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->UserID) ?></td>
                <td><?= h($user->LoginName) ?></td>
                <td><?= h($user->UserPass) ?></td>
                <td><?= $this->Number->format($user->PositionID) ?></td>
                <td><?= h($user->FullName) ?></td>
                <td><?= h($user->Email) ?></td>
                <td><?= h($user->Imei) ?></td>
                <td><?= h($user->RecordStatus) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->UserID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->UserID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->UserID], ['confirm' => __('Are you sure you want to delete # {0}?', $user->UserID)]) ?>
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
