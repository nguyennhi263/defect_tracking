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
    <div class="col-sm-9 col-md-10">
        <!-- Card holder-->
        <div class="row">          
            <div class="card-body" style="background-color:#DEF3FD;">
                <div class="card-number"><i class="fa fa-bug" aria-hidden="true"></i><?= sizeof($defectItemsToday) ?></div>
                Defects opened Today
            </div> 
            <div class="card-body" style="background-color:#FCF7DE;">
                <div class="card-number"><i class="fa fa-table" aria-hidden="true"></i><?= sizeof($defectItems) ?></div>
                 Defects Open
            </div> 
            <div class="card-body" style="background-color:#DEFDE0;">
                <div class="card-number"><i class="fa fa-wrench" aria-hidden="true"></i><?= sizeof($defectItemsClose) ?></div>
                  Fix today
            </div> 
        </div>
    </div>
</div>