<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TradeDescription $tradeDescription
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tradeDescription->TradeDescriptionID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tradeDescription->TradeDescriptionID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Trade Descriptions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Trades'), ['controller' => 'Trades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trade'), ['controller' => 'Trades', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tradeDescriptions form large-9 medium-8 columns content">
    <?= $this->Form->create($tradeDescription) ?>
    <fieldset>
        <legend><?= __('Edit Trade Description') ?></legend>
        <?php
            echo $this->Form->control('TradeID', ['options' => $trades]);
            echo $this->Form->control('TradeDescriptionDetail');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
