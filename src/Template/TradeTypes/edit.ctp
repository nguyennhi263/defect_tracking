<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TradeType $tradeType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tradeType->TradeTypeID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tradeType->TradeTypeID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Trade Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Trades'), ['controller' => 'Trades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trade'), ['controller' => 'Trades', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tradeTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($tradeType) ?>
    <fieldset>
        <legend><?= __('Edit Trade Type') ?></legend>
        <?php
            echo $this->Form->control('TradeTypeName');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
