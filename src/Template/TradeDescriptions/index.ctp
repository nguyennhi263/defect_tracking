<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TradeDescription[]|\Cake\Collection\CollectionInterface $tradeDescriptions
 */
?>
<!--Left Menu -->
<div class="row">
<div class="col-lg-2  col-md-3 bg-dark">
    <div class="btn-group-vertical btn-block">
        <a href="/defect_tracking/trades/" class="btn btn-dark ">List Trade</a>
      <a href="/defect_tracking/trade-descriptions/" class="btn btn-dark ">Trade Description</a>
      <a href="/defect_tracking/trade-descriptions/add" class="btn btn-dark ">Create Trade Desciption</a>
    </div>
</div>
<div class="tradeDescriptions index large-9 medium-8 columns content">
    <h3><?= __('Trade Descriptions') ?></h3>
    <table class="table">
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
</div>