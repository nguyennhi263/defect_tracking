<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>

<!--Left Menu -->
<div class="row">
<div class="col-lg-2  col-md-3  bg-dark">
    <!-- one project collapse -->
    <?php foreach ($listProject as $project): ?>
    <?php if ($project->ProjectID == $projectCur->ProjectID):?>
        <!-- Project Level-->
    
    <a href="/defect_tracking/projects/view/<?= $project->ProjectID?>"  class="btn btn-primary btn-dark active" role="button"> 
        <i class="fa fa-briefcase" aria-hidden="true"> <?= $project->ProjectName?> </i> 
     </a>
      
      <i class="fa fa-chevron-down" aria-hidden="true" data-toggle="collapse" data-target="#project-<?=$project->ProjectID?>"></i>
    <?php else:?>
    <a href="/defect_tracking/projects/view/<?= $project->ProjectID?>"  class="btn btn-primary btn-dark " role="button"> 
        <i class="fa fa-briefcase" aria-hidden="true"> <?= $project->ProjectName?> </i> 
     </a>
      
      <i class="fa fa-chevron-down" aria-hidden="true" data-toggle="collapse" data-target="#project-<?=$project->ProjectID?>"></i>
    <?php endif;?>
        <!-- Phase Level-->
      <div id="project-<?=$project->ProjectID ?>" class="collapse">
            <div class="btn-group-vertical">
            <?php if(!empty($project->phases)):?>
            <?php foreach ($project->phases as $phases): ?>
                <button type="button" class="btn btn-dark">
                    <a href="/defect_tracking/phases/view/<?=$phases->PhaseID?>" class="btn btn-primary btn-dark " role="button"> 
                    <i class="fa fa-life-ring aria-hidden="true"> <?= $phases->PhaseName ?> </i> 
                    </a>
                    <!-- ii-->
                     <i class="fa fa-chevron-down" aria-hidden="true" data-toggle="collapse" data-target="#phase-<?= $phases->PhaseID ?>"></i>
                </button>
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
             <button type="button" class="btn btn-dark">
                    <a href="/defect_tracking/phases/view/<?=$phases->PhaseID?>" class="btn btn-primary btn-dark " role="button"> 
                    <i class="fa fa-plus-circle aria-hidden="true">Add Phase </i> 
                    </a>
                </button>
            </div>

      </div>
  <?php endforeach; ?>
</div>
<div class="projects view col-lg-10 col-md-8 content">
    <h3><?= h($projectCur->ProjectName) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ProjectName') ?></th>
            <td><?= h($projectCur->ProjectName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProjectID') ?></th>
            <td><?= $this->Number->format($projectCur->ProjectID) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Phases') ?></h4>
        <?php if (!empty($projectCur->phases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('PhaseID') ?></th>
                <th scope="col"><?= __('PhaseName') ?></th>
                <th scope="col"><?= __('ProjectID') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($projectCur->phases as $phases): ?>
            <tr>
                <td><?= h($phases->PhaseID) ?></td>
                <td><?= h($phases->PhaseName) ?></td>
                <td><?= h($phases->ProjectID) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Phases', 'action' => 'view', $phases->PhaseID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Phases', 'action' => 'edit', $phases->PhaseID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Phases', 'action' => 'delete', $phases->PhaseID], ['confirm' => __('Are you sure you want to delete # {0}?', $phases->PhaseID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
</div>