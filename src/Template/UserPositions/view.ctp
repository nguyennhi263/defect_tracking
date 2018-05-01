<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserPosition $userPosition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Position'), ['action' => 'edit', $userPosition->PositionID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Position'), ['action' => 'delete', $userPosition->PositionID], ['confirm' => __('Are you sure you want to delete # {0}?', $userPosition->PositionID)]) ?> </li>
        <li><?= $this->Html->link(__('List User Positions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Position'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userPositions view large-9 medium-8 columns content">
    <h3><?= h($userPosition->PositionID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('PositionName') ?></th>
            <td><?= h($userPosition->PositionName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PositionID') ?></th>
            <td><?= $this->Number->format($userPosition->PositionID) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($userPosition->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('UserID') ?></th>
                <th scope="col"><?= __('LoginName') ?></th>
                <th scope="col"><?= __('UserPass') ?></th>
                <th scope="col"><?= __('PositionID') ?></th>
                <th scope="col"><?= __('FullName') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Imei') ?></th>
                <th scope="col"><?= __('RecordStatus') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($userPosition->users as $users): ?>
            <tr>
                <td><?= h($users->UserID) ?></td>
                <td><?= h($users->LoginName) ?></td>
                <td><?= h($users->UserPass) ?></td>
                <td><?= h($users->PositionID) ?></td>
                <td><?= h($users->FullName) ?></td>
                <td><?= h($users->Email) ?></td>
                <td><?= h($users->Imei) ?></td>
                <td><?= h($users->RecordStatus) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->UserID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->UserID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->UserID], ['confirm' => __('Are you sure you want to delete # {0}?', $users->UserID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
