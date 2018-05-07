<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Phase $phase
 */
?>

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
<div class="phases view large-9 medium-8 columns content">
    <h3><?= h($phase->PhaseName) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('PhaseName') ?></th>
            <td><?= h($phase->PhaseName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProjectName') ?></th>
            <td><?= $phase->has('ProjectName') ? $this->Html->link($phase->ProjectName->ProjectID, ['controller' => 'Projects', 'action' => 'view', $phase->ProjectName->ProjectID]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PhaseID') ?></th>
            <td><?= $this->Number->format($phase->PhaseID) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Blocks') ?></h4>
        <?php if (!empty($phase->blocks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('BlockID') ?></th>
                <th scope="col"><?= __('PhaseID') ?></th>
                <th scope="col"><?= __('BlockName') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($phase->blocks as $blocks): ?>
            <tr>
                <td><?= h($blocks->BlockID) ?></td>
                <td><?= h($blocks->PhaseID) ?></td>
                <td><?= h($blocks->BlockName) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Blocks', 'action' => 'view', $blocks->BlockID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Blocks', 'action' => 'edit', $blocks->BlockID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Blocks', 'action' => 'delete', $blocks->BlockID], ['confirm' => __('Are you sure you want to delete # {0}?', $blocks->BlockID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
</div>