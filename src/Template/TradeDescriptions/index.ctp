<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TradeDescription[]|\Cake\Collection\CollectionInterface $tradeDescriptions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Trade Description'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trades'), ['controller' => 'Trades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trade'), ['controller' => 'Trades', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tradeDescriptions index large-9 medium-8 columns content">
    <h3><?= __('Trade Descriptions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('TradeDescriptionID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TradeID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TradeDescriptionDetail') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tradeDescriptions as $tradeDescription): ?>
            <tr>
                <td><?= $this->Number->format($tradeDescription->TradeDescriptionID) ?></td>
                <td><?= $tradeDescription->has('trade') ? $this->Html->link($tradeDescription->trade->TradeID, ['controller' => 'Trades', 'action' => 'view', $tradeDescription->trade->TradeID]) : '' ?></td>
                <td><?= h($tradeDescription->TradeDescriptionDetail) ?></td>
                <td><?= h($tradeDescription->created) ?></td>
                <td><?= h($tradeDescription->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tradeDescription->TradeDescriptionID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tradeDescription->TradeDescriptionID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tradeDescription->TradeDescriptionID], ['confirm' => __('Are you sure you want to delete # {0}?', $tradeDescription->TradeDescriptionID)]) ?>
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
