<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TradeDescription $tradeDescription
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
<div class="tradeDescriptions view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Trade') ?></th>
            <td><?= $tradeDescription->has('trade') ? $this->Html->link($tradeDescription->trade->TradeID, ['controller' => 'Trades', 'action' => 'view', $tradeDescription->trade->TradeID]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TradeDescriptionDetail') ?></th>
            <td><?= h($tradeDescription->TradeDescriptionDetail) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TradeDescriptionID') ?></th>
            <td><?= $this->Number->format($tradeDescription->TradeDescriptionID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tradeDescription->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tradeDescription->modified) ?></td>
        </tr>
    </table>
</div>
</div>