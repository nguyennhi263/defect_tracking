<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DefectHeader[]|\Cake\Collection\CollectionInterface $defectHeaders
 */
?>
<div class="row">
    <!--Left Menu -->
    <div class="left-menu col-sm-3 col-md-2">
        
    </div>
    <!-- contend -->
    <div class="col-sm-9 col-md-10" style="background-color:lavender;">
        <!-- Card holder-->
        <div class="row">
            <div class="card col-sm-4 col-md-4">
              <div class="card-body"><?= sizeof($defectItemsToday) ?> Defects opened Today</div> 
            </div>
            <div class="card col-sm-4 col-md-4">
              <div class="card-body"><?= sizeof($defectItems) ?> Defects Open</div> 
            </div>
            <div class="card col-sm-4 col-md-4">
              <div class="card-body"><?= sizeof($defectItemsClose) ?> Fix today</div> 
            </div>
        </div>
    </div>
</div>