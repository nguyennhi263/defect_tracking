<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DefectPlace $defectPlace
 */
?>

<div class="defectPlaces form large-9 medium-8 columns content">
    <?= $this->Form->create($defectPlace) ?>
    <fieldset>
        <legend><?= __('Edit Defect Place') ?></legend>
        <?php
            echo $this->Form->control('UnitTypeID', ['options' => $unitTypes]);
            echo $this->Form->control('DefectPlaceName');
            echo $this->Form->control('coordX');
            echo $this->Form->control('coordY');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
