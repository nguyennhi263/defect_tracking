<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->UserID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->UserID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Positions'), ['controller' => 'UserPositions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Position'), ['controller' => 'UserPositions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('LoginName');
            echo $this->Form->control('UserPass');
            echo $this->Form->control('PositionName', ['options' => $userPositions]);
            echo $this->Form->control('FullName');
            echo $this->Form->control('Email');
            echo $this->Form->control('Imei');
            echo $this->Form->control('RecordStatus');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
