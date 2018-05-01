<?php
use Cake\Routing\Router;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UnitType $unitType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Unit Type'), ['action' => 'edit', $unitType->UnitTypeID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Unit Type'), ['action' => 'delete', $unitType->UnitTypeID], ['confirm' => __('Are you sure you want to delete # {0}?', $unitType->UnitTypeID)]) ?> </li>
        <li><?= $this->Html->link(__('List Unit Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="unitTypes view large-9 medium-8 columns content">
    <h3><?= h($unitType->name) ?></h3>
    <section>
        <div class="item">
            <div class="label"><?= __('Name') ?></div>
            <div class="content"><?= h($unitType->name) ?></div>
        </div>
        <div class="item">
            <div class="label">Image</div>
            <div class="content">
            <div id="unit-map-container">
                <div class="form-inline defect-place-saving hidden">
                    <div class="form-group">
                        <input type="text" id="unit-type-id" class="hidden" value="<?= h($unitType->UnitTypeID) ?>">
                        <input type="text" id="url-post" class="hidden" value="<?php echo Router::url(['controller'=>'DefectPlaces','action'=>'add']);?>">
                        <label for="pwd">Place:</label>
                        <input type="text" class="form-control place-name" placeholder="Enter place name">
                    </div>
                    <button class="btn btn-success btn-unit-map" id="insert-defect-place">Save</button>
                </div>
                <div class="unit-map" style="background-image:url(/defect_tracking/webroot/img/ArchirecturalDrawing/<?= $unitType->image ?>)">
                    <img src="/defect_tracking/webroot/img/ArchirecturalDrawing/<?= $unitType->image ?>" alt="CakePHP" />
                </div>
            </div>
            </div>
        </div>
      
    </section>
</div>

