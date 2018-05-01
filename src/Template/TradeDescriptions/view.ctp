<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TradeDescription $tradeDescription
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Trade Description'), ['action' => 'edit', $tradeDescription->TradeDescriptionID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Trade Description'), ['action' => 'delete', $tradeDescription->TradeDescriptionID], ['confirm' => __('Are you sure you want to delete # {0}?', $tradeDescription->TradeDescriptionID)]) ?> </li>
        <li><?= $this->Html->link(__('List Trade Descriptions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trade Description'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trades'), ['controller' => 'Trades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trade'), ['controller' => 'Trades', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tradeDescriptions view large-9 medium-8 columns content">
    <h3><?= h($tradeDescription->TradeDescriptionID) ?></h3>
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
