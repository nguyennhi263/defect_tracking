<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TradeDescription $tradeDescription
 */
?>

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
