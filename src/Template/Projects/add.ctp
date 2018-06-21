<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<!--Left Menu -->
<div class="row">
<div class="col-lg-2  col-md-3 bg-dark">
    <div class="btn-group-vertical btn-block">
        <button type="button" class="btn btn-block btn-dark ">List Project</button>
      <a href="/defect_tracking/projects/add" class="btn btn-dark active">Create New Project</a>
      <a href="/defect_tracking/Contractors/" class="btn btn-dark ">Contractor</a>
    </div>
</div>
<div class="projects form large-9 medium-8 columns content">
    <?= $this->Form->create($project) ?>
    <fieldset>
        <legend><?= __('Add Project') ?></legend>
        <?php
            echo $this->Form->control('ProjectName');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>