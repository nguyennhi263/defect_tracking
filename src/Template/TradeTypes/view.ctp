<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TradeType $tradeType
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
<div class="tradeTypes view large-9 medium-8 columns content">
    
    <table class="vertical-table table">
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
        <table class="table">
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
</div>
