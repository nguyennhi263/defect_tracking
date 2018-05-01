<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->ProjectID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->ProjectID], ['confirm' => __('Are you sure you want to delete # {0}?', $project->ProjectID)]) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Phases'), ['controller' => 'Phases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phase'), ['controller' => 'Phases', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projects view large-9 medium-8 columns content">
    <h3><?= h($project->ProjectID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ProjectName') ?></th>
            <td><?= h($project->ProjectName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProjectID') ?></th>
            <td><?= $this->Number->format($project->ProjectID) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Phases') ?></h4>
        <?php if (!empty($project->phases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('PhaseID') ?></th>
                <th scope="col"><?= __('PhaseName') ?></th>
                <th scope="col"><?= __('ProjectID') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->phases as $phases): ?>
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
