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
<div class="tradeDescriptions form large-9 medium-8 columns content">
    <?= $this->Form->create($tradeDescription) ?>
    <fieldset>
        <legend><?= __('Edit Trade Description') ?></legend>
        <?php
            echo $this->Form->control('TradeID', ['options' => $trades]);
            echo $this->Form->control('TradeDescriptionDetail');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>
