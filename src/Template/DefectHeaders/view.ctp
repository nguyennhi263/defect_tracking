<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DefectHeader $defectHeader
 */
?>
<div class="defectHeaders view large-9 medium-8 columns content">
    <h3><?= h($defectHeader->UnitName) ?></h3>
    <h3><?= h($defectHeader->UnitName->unit_type->image) ?></h3>
    <h3><?= h($defectHeader->UnitName->UnitName) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('UnitName') ?></th>
            <td><?= $defectHeader->has('UnitName') ? $this->Html->link($defectHeader->UnitName->UnitName, ['controller' => 'Units', 'action' => 'view', $defectHeader->UnitName->UnitID]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DefectID') ?></th>
            <td><?= $this->Number->format($defectHeader->DefectID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($defectHeader->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($defectHeader->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Defect Items') ?></h4>
        <?php if (!empty($defectHeader->defect_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('DefectItemID') ?></th>
                <th scope="col"><?= __('DefectID') ?></th>
                <th scope="col"><?= __('TradeDescriptionID') ?></th>
                <th scope="col"><?= __('ImageFileNameBefore') ?></th>
                <th scope="col"><?= __('ImageFileNameAfter') ?></th>
                <th scope="col"><?= __('PlaceID') ?></th>
                <th scope="col"><?= __('CloseDate') ?></th>
                <th scope="col"><?= __('DefectStatus') ?></th>
                <th scope="col"><?= __('Note') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($defectHeader->defect_items as $defectItems): ?>
            <tr>
                <td><?= h($defectItems->DefectItemID) ?></td>
                <td><?= h($defectItems->DefectID) ?></td>
                <td><?= h($defectItems->TradeDescriptionID) ?></td>
                <td><?= h($defectItems->ImageFileNameBefore) ?></td>
                <td><?= h($defectItems->ImageFileNameAfter) ?></td>
                <td><?= h($defectItems->PlaceID) ?></td>
                <td><?= h($defectItems->CloseDate) ?></td>
                <td><?= h($defectItems->DefectStatus) ?></td>
                <td><?= h($defectItems->Note) ?></td>
                <td><?= h($defectItems->created) ?></td>
                <td><?= h($defectItems->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DefectItems', 'action' => 'view', $defectItems->DefectItemID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DefectItems', 'action' => 'edit', $defectItems->DefectItemID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DefectItems', 'action' => 'delete', $defectItems->DefectItemID], ['confirm' => __('Are you sure you want to delete # {0}?', $defectItems->DefectItemID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="content">
            <div id="unit-map-container">
                <div class="form-inline defect-place-saving hidden">
                </div>
                <div id="unit-type-map" class="unit-map" style="background-image:url(/defect_tracking/webroot/img/ArchirecturalDrawing/<?= $defectHeader->UnitName->unit_type->image ?>)">
                <img src="/defect_tracking/webroot/img/ArchirecturalDrawing/<?=$defectHeader->UnitName->unit_type->image ?>" alt="CakePHP" />
                </div>
            </div>
</div>
<script type="text/javascript">
    getDefectPlace(1);
</script>
