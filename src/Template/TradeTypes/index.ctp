<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TradeType[]|\Cake\Collection\CollectionInterface $tradeTypes
 */
?>
<!--Left Menu -->
<div class="row">
<div class="col-lg-2  col-md-3 bg-dark">
    <div class="btn-group-vertical btn-block">
        <a href="/defect_tracking/trades/" class="btn btn-dark ">List Trade</a>
      <a href="/defect_tracking/trades/add" class="btn btn-dark ">Create New Trade</a>
      <a href="/defect_tracking/trade-types/" class="btn btn-dark ">Trade Types</a>
      <a href="/defect_tracking/trade-types/add" class="btn btn-dark "> Create Trade Types</a>
      <a href="/defect_tracking/trade-descriptions/" class="btn btn-dark ">Trade Description</a>
      <a href="/defect_tracking/trade-descriptions/add" class="btn btn-dark ">Create Trade Desciption</a>
    </div>
</div>
<div class="tradeTypes index large-9 medium-8 columns content">
    <h3><?= __('Trade Types') ?></h3>
    <table class="table">
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
</div>