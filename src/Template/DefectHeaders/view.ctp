<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DefectHeader $defectHeader
 */
?>
<div class="defectHeaders view large-9 medium-8 columns content">
    <h3><?= h($defectHeader->UnitName->UnitName) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('UnitName') ?></th>
            <td><?= $defectHeader->has('UnitName') ? $this->Html->link($defectHeader->UnitName->UnitName, ['controller' => 'Units', 'action' => 'view', $defectHeader->UnitName->UnitID]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($defectHeader->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('List Defect Item') ?></h4>
        <?php if (!empty($defectHeader->defect_items)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-dark table-hover">
            <tr >
                <th scope="col"><?= __('Trade') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Place') ?></th>
                <th scope="col"><?= __('CloseDate') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Note') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php $i = 0; ?>
            <?php foreach ($defectHeader->defect_items as $defectItems): ?>
            <tr class="show-image-on-hover">
                <td><?= h($tradeArray[$i]) ?></td>
                <td><?= h($detailArray[$i]) ?></td>
                <td><?= h($placeArray[$i]) ?></td>
                <td><?= h($defectItems->CloseDate) ?></td>
                <td><?= h($defectItems->DefectStatus) ?></td>
                <td><?= h($defectItems->Note) ?></td>
                <td><?= h($defectItems->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DefectItems', 'action' => 'view', $defectItems->DefectItemID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DefectItems', 'action' => 'edit', $defectItems->DefectItemID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DefectItems', 'action' => 'delete', $defectItems->DefectItemID], ['confirm' => __('Are you sure you want to delete # {0}?', $defectItems->DefectItemID)]) ?>
                </td>
                <div class="hidden defect-image " style="background-image: url('/defect_tracking/webroot/img/DefectItem/20180501_124348.jpg')"> <img src="/defect_tracking/webroot/img/DefectItem/20180501_124348.jpg" alt="ImgBefore" ></div>
            </tr>

            <?php $i++; endforeach; ?>
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
    //getTradeDescription(1);
   getDefectItems(1);
    //getDefectItems();
</script>
