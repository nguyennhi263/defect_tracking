<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DefectItem $defectItem
 */
?>
<div class="row">
    <!--Left Menu -->
    <div class="left-menu col-sm-3 col-md-2 bg-dark">
          <div class="btn-group-vertical btn-block">
                <button type="button" class="btn btn-block btn-dark active">List Defect</button>
              <a href="/defect_tracking/defect-headers/block" class="btn btn-dark ">Create New Defect</a>
              <button type="button" class="btn btn-block btn-dark"></button>
            </div>
    </div>
    <div class="defectItems form large-9 medium-8 columns content">
        <?= $this->Form->create($defectItem) ?>
        <fieldset>
            <legend><?= __('Edit Defect Item') ?></legend>
            <?php
                echo $this->Form->control('TradeDescriptionID', ['options' => $tradeDescriptions,'class'=>'form-group']);
                echo $this->Form->control('PlaceID', ['options' => $defectPlaces]);
                echo $this->Form->control('CloseDate', ['empty' => true]);
                echo $this->Form->control('DefectStatus');
                echo $this->Form->control('Note');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
