<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trade[]|\Cake\Collection\CollectionInterface $trades
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Trade'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trade Types'), ['controller' => 'TradeTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trade Type'), ['controller' => 'TradeTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trade Descriptions'), ['controller' => 'TradeDescriptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trade Description'), ['controller' => 'TradeDescriptions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trades index large-9 medium-8 columns content">
    <h3><?= __('Trades') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('TradeID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TradeTypeID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TradeName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trades as $trade): ?>
            <tr>
                <td><?= $this->Number->format($trade->TradeID) ?></td>
                <td><?= $trade->has('trade_type') ? $this->Html->link($trade->trade_type->TradeTypeID, ['controller' => 'TradeTypes', 'action' => 'view', $trade->trade_type->TradeTypeID]) : '' ?></td>
                <td><?= h($trade->TradeName) ?></td>
                <td><?= h($trade->created) ?></td>
                <td><?= h($trade->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $trade->TradeID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trade->TradeID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trade->TradeID], ['confirm' => __('Are you sure you want to delete # {0}?', $trade->TradeID)]) ?>
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
