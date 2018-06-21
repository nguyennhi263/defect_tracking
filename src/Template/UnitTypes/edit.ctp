<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UnitType $unitType
 */
?>
<div class="row">
<div class="col-lg-2  col-md-3 bg-dark">
    <div class="btn-group-vertical btn-block">
        <a href="/defect_tracking/projects/" class="btn btn-dark ">List Project</a>
      <a href="/defect_tracking/unit-types/" class="btn btn-dark ">Unit Types</a>
      <a href="/defect_tracking/unit-types/add" class="btn btn-dark ">Create Unit Types</a>
    </div>
</div>
<div class="unitTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($unitType) ?>
    <fieldset>
        <legend><?= __('Edit Unit Type') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('image');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>
