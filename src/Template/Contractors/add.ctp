<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contractor $contractor
 */
?>
<!--Left Menu -->
<div class="row">
<div class="col-lg-2  col-md-3 bg-dark">
    <div class="btn-group-vertical btn-block">
        <button type="button" class="btn btn-block btn-dark ">List Project</button>
      <a href="/defect_tracking/projects/add" class="btn btn-dark ">Create New Project</a>
      <a href="/defect_tracking/Contractors/" class="btn btn-dark ">Contractor</a>
    </div>
</div>
<div class="contractors form large-9 medium-8 columns content">
    <?= $this->Form->create($contractor) ?>
    <fieldset>
        <legend><?= __('Add Contractor') ?></legend>
        <?php
            echo $this->Form->control('ContractorName');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>
