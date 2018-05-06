<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Block $block
 */
?>
<div class="blocks view large-9 medium-8 columns content">
    <h3><?= h($block->BlockName) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Phase') ?></th>
            <td><?= $block->has('phase') ? $this->Html->link($block->phase->PhaseName, ['controller' => 'Phases', 'action' => 'view', $block->phase->PhaseID]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BlockName') ?></th>
            <td><?= h($block->BlockName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contractor') ?></th>
            <td><?= $block->has('contractor') ? $this->Html->link($block->contractor->ContractorName, ['controller' => 'Contractors', 'action' => 'view', $block->contractor->ContractorID]) : '' ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Units') ?></h4>
        <?php if (!empty($block->units)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('UnitID') ?></th>
                <th scope="col"><?= __('BlockID') ?></th>
                <th scope="col"><?= __('UnitTypeID') ?></th>
                <th scope="col"><?= __('UnitName') ?></th>
                <th scope="col"><?= __('UnitFloor') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($block->units as $units): ?>
            <tr>
                <td><?= h($units->UnitID) ?></td>
                <td><?= h($units->BlockID) ?></td>
                <td><?= h($units->UnitTypeID) ?></td>
                <td><?= h($units->UnitName) ?></td>
                <td><?= h($units->UnitFloor) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Units', 'action' => 'view', $units->UnitID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Units', 'action' => 'edit', $units->UnitID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Units', 'action' => 'delete', $units->UnitID], ['confirm' => __('Are you sure you want to delete # {0}?', $units->UnitID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <!-- contend block -->
    <?php if (!empty($block->units)): ?>
    <?php $level=(int) ($block->units[0]['UnitFloor']); ?>
    <div class="row">
            <?php foreach ($block->units as $units): ?>
            <div class="col-sm-2 col-lg-2" style="background-color:lavender;">Level <?= $level ?></div>
            
                        <!-- contend units -->
            <div class="col-sm-10 col-lg-10" style="background-color:lavenderblush;"> 
                <div class="row">
                    <?php if ($units->UnitFloor == (int)($level)): ?>
                    <!-- contend one units -->
                    <div class="col-sm-2">
                       <?= ($units->UnitName) ?>
                    </div>
                </div>
            </div>
            <?php       else : $level++; ?>
            
            <?php            endif; ?>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
