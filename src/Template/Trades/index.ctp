<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trade[]|\Cake\Collection\CollectionInterface $trades
 */
?>
<!--Left Menu -->
<div class="row">
<div class="col-lg-2  col-md-3 bg-dark">
    <div class="btn-group-vertical btn-block">
        <a href="/defect_tracking/trades/" class="btn btn-dark ">List Trade</a>
      <a href="/defect_tracking/trade-types/" class="btn btn-dark ">Trade Types</a>
      <a href="/defect_tracking/trade-types/add" class="btn btn-dark "> Create Trade Types</a>
      <a href="/defect_tracking/trade-descriptions/" class="btn btn-dark ">Trade Description</a>
      <a href="/defect_tracking/trade-descriptions/add" class="btn btn-dark ">Create Trade Desciption</a>
    </div>
</div>
<div class="trades index large-9 medium-8 columns content">
    <h3><?= __('Trades') ?></h3>
    <table class="table">
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
</div>