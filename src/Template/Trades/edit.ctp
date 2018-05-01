<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trade $trade
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $trade->TradeID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $trade->TradeID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Trades'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Trade Types'), ['controller' => 'TradeTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trade Type'), ['controller' => 'TradeTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trade Descriptions'), ['controller' => 'TradeDescriptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trade Description'), ['controller' => 'TradeDescriptions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trades form large-9 medium-8 columns content">
    <?= $this->Form->create($trade) ?>
    <fieldset>
        <legend><?= __('Edit Trade') ?></legend>
        <?php
            echo $this->Form->control('TradeTypeID', ['options' => $tradeTypes]);
            echo $this->Form->control('TradeName');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
