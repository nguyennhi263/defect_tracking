<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TradeType[]|\Cake\Collection\CollectionInterface $tradeTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Trade Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trades'), ['controller' => 'Trades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trade'), ['controller' => 'Trades', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tradeTypes index large-9 medium-8 columns content">
    <h3><?= __('Trade Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('TradeTypeID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TradeTypeName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tradeTypes as $tradeType): ?>
            <tr>
                <td><?= $this->Number->format($tradeType->TradeTypeID) ?></td>
                <td><?= h($tradeType->TradeTypeName) ?></td>
                <td><?= h($tradeType->created) ?></td>
                <td><?= h($tradeType->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tradeType->TradeTypeID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tradeType->TradeTypeID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tradeType->TradeTypeID], ['confirm' => __('Are you sure you want to delete # {0}?', $tradeType->TradeTypeID)]) ?>
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
