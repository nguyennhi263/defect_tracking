
<!--Left Menu -->
<div class="row">
<div class="col-lg-2  col-md-3  bg-dark">
    <!-- one project collapse -->
    <?php foreach ($listProject as $project): ?>
   
    <a href="/defect_tracking/projects/view/<?= $project->ProjectID?>"  class="btn btn-primary btn-dark " role="button"> 
        <i class="fa fa-briefcase" aria-hidden="true"> <?= $project->ProjectName?> </i> 
     </a>
      
      <i class="fa fa-chevron-down" aria-hidden="true" data-toggle="collapse" data-target="#project-<?=$project->ProjectID?>"></i>
    
        <!-- Phase Level-->
      <div id="project-<?=$project->ProjectID ?>" class="collapse">
            <div class="btn-group-vertical">
            <?php if(!empty($project->phases)):?>
            <?php foreach ($project->phases as $phases): ?>
                <a href="/defect_tracking/phases/view/<?=$phases->PhaseID?>" class="btn btn-primary btn-dark " role="button"> 
                <i class="fa fa-life-ring aria-hidden="true"> <?= $phases->PhaseName ?> </i> 
                </a>
              <i class="fa fa-chevron-down" aria-hidden="true" data-toggle="collapse" data-target="#phase-<?= $phases->PhaseID ?>"></i>
                    <!-- Block Level -->
                    <div id="phase-<?=$phases->PhaseID ?>" class="collapse">
                    <?php if(!empty($phases->blocks[0])): ?>
                        <?php foreach ($phases->blocks[0] as $block): ?>
                            <a href="/defect_tracking/blocks/view/<?=$block->BlockID?>"  class="btn btn-dark" role="button"> 
                             <i class="fa fa-sun-o" aria-hidden="true"> <?= $block->BlockName ?> </i> 
                         </a>
                    <?php endforeach; endif;?>
                    <a href="/defect_tracking/blocks/add/"  class="btn btn-primary btn-dark" role="button">
                <i class="fa fa-plus-circle" aria-hidden="true"> Add Block</i> 
            </a>
                 </div>
            <?php endforeach; endif;?>
            <a href="/defect_tracking/phases/add/"  class="btn btn-primary btn-dark " role="button">
                <i class="fa fa-plus-circle" aria-hidden="true"> Add Phase</i> 
            </a>
            </div>
      </div>
  <?php endforeach; ?>
</div>
<!-- contain-->

<div class="blocks col-sm-9 col-lg-10 columns ">

    <h3><?= h($blockCur->BlockName) ?></h3>
    <table class="vertical-table">
        <tr>
            <td><?= $blockCur->has('contractor') ? $this->Html->link($blockCur->contractor->ContractorName, ['controller' => 'Contractors', 'action' => 'view', $blockCur->contractor->ContractorID]) : '' ?></td>
        </tr>
    </table>
    
    <!-- contend block -->
    <?php if (!empty($blockCur->units)): ?>
    <div class="row">

            <?php foreach ($floorArray as $key => $floor): ?>
            <div class="col-sm-1 col-lg-1" style="background-color:lavender;">Level <?= $key ?></div>
            
                        <!-- contend units -->
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
</div>