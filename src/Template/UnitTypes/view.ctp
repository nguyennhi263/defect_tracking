<?php
use Cake\Routing\Router;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UnitType $unitType
 */
?>
<!--Left Menu -->
<div class="row">
<div class="col-lg-2  col-md-3 bg-dark">
    <div class="btn-group-vertical btn-block">
        <a href="/defect_tracking/projects/" class="btn btn-dark ">List Project</a>
      <a href="/defect_tracking/unit-types/" class="btn btn-dark ">Unit Types</a>
      <a href="/defect_tracking/unit-types/add" class="btn btn-dark ">Create Unit Types</a>
    </div>
</div>

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
                <div id="unit-type-map" class="unit-map" style="background-image:url(/defect_tracking/webroot/img/ArchirecturalDrawing/<?= $unitType->image ?>)">
                    <img src="/defect_tracking/webroot/img/ArchirecturalDrawing/<?= $unitType->image ?>" alt="CakePHP" />
                </div>
            </div>
            </div>
        </div>
      
    </section>
</div>
<script type="text/javascript">
    getListDefectPlace($("#unit-type-id").val());
    get_coordinates();
</script>
</div>