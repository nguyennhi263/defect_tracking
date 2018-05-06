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
    
    <!-- contend block -->
    <?php if (!empty($block->units)): ?>
    <div class="row">
            <?php foreach ($floorArray as $key => $floor): ?>
            <div class="col-sm-1 col-lg-1" style="background-color:lavender;">Level <?= $key ?></div>
            
            <!-- contend units -->
            <div class="col-sm-11 col-lg-11"> 
                <div class="btn-group">
                    <?php foreach ($floor as  $unit): ?>
                    <!-- contend one units -->
    
                       
                       <a class="btn btn-outline-success btn-sm"><?= ($unit->UnitName) ?></a>
                    
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
