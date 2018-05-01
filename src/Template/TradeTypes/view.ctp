<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TradeType $tradeType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Trade Type'), ['action' => 'edit', $tradeType->TradeTypeID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Trade Type'), ['action' => 'delete', $tradeType->TradeTypeID], ['confirm' => __('Are you sure you want to delete # {0}?', $tradeType->TradeTypeID)]) ?> </li>
        <li><?= $this->Html->link(__('List Trade Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trade Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trades'), ['controller' => 'Trades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trade'), ['controller' => 'Trades', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tradeTypes view large-9 medium-8 columns content">
    <h3><?= h($tradeType->TradeTypeID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('TradeTypeName') ?></th>
            <td><?= h($tradeType->TradeTypeName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TradeTypeID') ?></th>
            <td><?= $this->Number->format($tradeType->TradeTypeID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tradeType->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tradeType->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Trades') ?></h4>
        <?php if (!empty($tradeType->trades)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('TradeID') ?></th>
                <th scope="col"><?= __('TradeTypeID') ?></th>
                <th scope="col"><?= __('TradeName') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tradeType->trades as $trades): ?>
            <tr>
                <td><?= h($trades->TradeID) ?></td>
                <td><?= h($trades->TradeTypeID) ?></td>
                <td><?= h($trades->TradeName) ?></td>
                <td><?= h($trades->created) ?></td>
                <td><?= h($trades->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Trades', 'action' => 'view', $trades->TradeID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Trades', 'action' => 'edit', $trades->TradeID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trades', 'action' => 'delete', $trades->TradeID], ['confirm' => __('Are you sure you want to delete # {0}?', $trades->TradeID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
