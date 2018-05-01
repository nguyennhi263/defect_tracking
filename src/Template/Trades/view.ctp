<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trade $trade
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Trade'), ['action' => 'edit', $trade->TradeID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Trade'), ['action' => 'delete', $trade->TradeID], ['confirm' => __('Are you sure you want to delete # {0}?', $trade->TradeID)]) ?> </li>
        <li><?= $this->Html->link(__('List Trades'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trade'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trade Types'), ['controller' => 'TradeTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trade Type'), ['controller' => 'TradeTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trade Descriptions'), ['controller' => 'TradeDescriptions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trade Description'), ['controller' => 'TradeDescriptions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trades view large-9 medium-8 columns content">
    <h3><?= h($trade->TradeID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Trade Type') ?></th>
            <td><?= $trade->has('trade_type') ? $this->Html->link($trade->trade_type->TradeTypeID, ['controller' => 'TradeTypes', 'action' => 'view', $trade->trade_type->TradeTypeID]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TradeName') ?></th>
            <td><?= h($trade->TradeName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TradeID') ?></th>
            <td><?= $this->Number->format($trade->TradeID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($trade->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($trade->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Trade Descriptions') ?></h4>
        <?php if (!empty($trade->trade_descriptions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('TradeDescriptionID') ?></th>
                <th scope="col"><?= __('TradeID') ?></th>
                <th scope="col"><?= __('TradeDescriptionDetail') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($trade->trade_descriptions as $tradeDescriptions): ?>
            <tr>
                <td><?= h($tradeDescriptions->TradeDescriptionID) ?></td>
                <td><?= h($tradeDescriptions->TradeID) ?></td>
                <td><?= h($tradeDescriptions->TradeDescriptionDetail) ?></td>
                <td><?= h($tradeDescriptions->created) ?></td>
                <td><?= h($tradeDescriptions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TradeDescriptions', 'action' => 'view', $tradeDescriptions->TradeDescriptionID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TradeDescriptions', 'action' => 'edit', $tradeDescriptions->TradeDescriptionID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TradeDescriptions', 'action' => 'delete', $tradeDescriptions->TradeDescriptionID], ['confirm' => __('Are you sure you want to delete # {0}?', $tradeDescriptions->TradeDescriptionID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
