<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DefectPlace $defectPlace
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Defect Place'), ['action' => 'edit', $defectPlace->DefectPlaceID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Defect Place'), ['action' => 'delete', $defectPlace->DefectPlaceID], ['confirm' => __('Are you sure you want to delete # {0}?', $defectPlace->DefectPlaceID)]) ?> </li>
        <li><?= $this->Html->link(__('List Defect Places'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Defect Place'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Unit Types'), ['controller' => 'UnitTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit Type'), ['controller' => 'UnitTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="defectPlaces view large-9 medium-8 columns content">
    <h3><?= h($defectPlace->DefectPlaceID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Unit Type') ?></th>
            <td><?= $defectPlace->has('unit_type') ? $this->Html->link($defectPlace->unit_type->name, ['controller' => 'UnitTypes', 'action' => 'view', $defectPlace->unit_type->UnitTypeID]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DefectPlaceName') ?></th>
            <td><?= h($defectPlace->DefectPlaceName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DefectPlaceID') ?></th>
            <td><?= $this->Number->format($defectPlace->DefectPlaceID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CoordX') ?></th>
            <td><?= $this->Number->format($defectPlace->coordX) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CoordY') ?></th>
            <td><?= $this->Number->format($defectPlace->coordY) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($defectPlace->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($defectPlace->modified) ?></td>
        </tr>
    </table>
</div>
