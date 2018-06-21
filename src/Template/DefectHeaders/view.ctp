<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DefectHeader $defectHeader
 */
?>
<div class="row">
    <!--Left Menu -->
    <div class="left-menu col-sm-3 col-md-2 bg-dark">
          <div class="btn-group-vertical btn-block">
               <a href="/defect_tracking/defect-headers/" class="btn btn-dark ">List Defect</a>
              <a href="/defect_tracking/defect-headers/block" class="btn btn-dark ">Create New Defect</a>
              <button type="button" class="btn btn-block btn-dark"></button>
            </div>
    </div>
    <!-- contend -->
    <div class="col-sm-9 col-md-10">
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
            <table cellpadding="0" cellspacing="0" class="table table-light table-hover">
                <tr >
                    <th scope="col"><?= __('Trade') ?></th>
                    <th scope="col"><?= __('Description') ?></th>
                    <th scope="col"><?= __('Place') ?></th>
                    <th scope="col"><?= __('Image') ?></th>
                    <th scope="col"><?= __('CloseDate') ?></th>
                    <th scope="col"><?= __('Status') ?></th>
                    <th scope="col"><?= __('Note') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php $i = 0; ?>
                <?php foreach ($defectHeader->defect_items as $defectItems): ?>
                <tr>
                    <td><?= h($tradeArray[$i]) ?></td>
                    <td><?= h($detailArray[$i]) ?></td>
                    <td><?= h($placeArray[$i]) ?></td>
                    <?php if ($defectItems->ImageFileNameBefore != null): ?>
                    <td>
                    <div class="defect-thumbnail" style="background-image:url('/defect_tracking/webroot/img/DefectItem/20180501_124348.jpg')">
                    <img class="defect-image" src="/defect_tracking/webroot/img/DefectItem/20180501_124348.jpg" alt="ImgBefore" >
                    </div>
                    </td>
                    <?php else : ?>
                    <td></td>
                    <?php endif;?>
                    <td><?= h($defectItems->CloseDate) ?></td>
                    <td><?= h($defectItems->DefectStatus) ?></td>
                    <td><?= h($defectItems->Note) ?></td>
                    <td><?= h($defectItems->created) ?></td>
                    <td class="actions">
                         <!-- Close -->
                        <?php if ($defectItems->DefectStatus != 'close'): ?>
                        <a href="/defect_tracking/defect-items/close/<?=$defectItems->DefectItemID  ?>/<?= $defectHeader->DefectID ?>" class="btn btn-outline-danger ">Close Defect</a>
                        <?php endif ?>
                        <!-- Edit -->
                        <a href="/defect_tracking/defect-items/edit/<?= $defectItems->DefectItemID ?>"  class="btn btn-light " role="button"> 
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                        </a>
                        
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'DefectItems', 'action' => 'delete', $defectItems->DefectItemID], ['confirm' => __('Are you sure you want to delete defect item  # {0}?', $defectItems->DefectItemID)]) ?>
                    </td>
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
</div>
<script type="text/javascript">
   getDefectItems(<?=$defectHeader->DefectID ?>);
</script>
