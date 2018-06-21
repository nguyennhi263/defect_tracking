<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trade $trade
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
<div class="trades view large-9 medium-8 columns content">
    
    <table class="vertical-table table">
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
    <div class="related ">
        <h4><?= __('Related Trade Descriptions') ?></h4>
        <?php if (!empty($trade->trade_descriptions)): ?>
        <table class="table">
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
</div>