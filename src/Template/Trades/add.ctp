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
<div class="trades form large-9 medium-8 columns content">
    <?= $this->Form->create($trade , ['class'=>'form-group']) ?>
    <fieldset>
        <legend><?= __('Add Trade') ?></legend>
        <?php
            echo $this->Form->control('TradeTypeID', ['options' => $tradeTypes]);
            echo $this->Form->control('TradeName');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>
