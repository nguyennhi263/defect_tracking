<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserPosition $userPosition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userPosition->PositionID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userPosition->PositionID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Positions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userPositions form large-9 medium-8 columns content">
    <?= $this->Form->create($userPosition) ?>
    <fieldset>
        <legend><?= __('Edit User Position') ?></legend>
        <?php
            echo $this->Form->control('PositionName');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
