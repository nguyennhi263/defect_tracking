<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->UserID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->UserID], ['confirm' => __('Are you sure you want to delete # {0}?', $user->UserID)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->LoginName) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('LoginName') ?></th>
            <td><?= h($user->LoginName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UserPass') ?></th>
            <td><?= h($user->UserPass) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FullName') ?></th>
            <td><?= h($user->FullName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->Email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imei') ?></th>
            <td><?= h($user->Imei) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RecordStatus') ?></th>
            <td><?= h($user->RecordStatus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UserID') ?></th>
            <td><?= $this->Number->format($user->UserID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PositionID') ?></th>
            <td><?= $this->Number->format($user->PositionID) ?></td>
        </tr>
    </table>
</div>
