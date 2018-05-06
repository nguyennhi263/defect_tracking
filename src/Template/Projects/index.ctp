<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
 */
?>
<!--Left Menu -->
<div class="row">
<div class="col-lg-2  col-md-3 bg-dark">
    <div class="btn-group-vertical btn-block">
        <button type="button" class="btn btn-block btn-dark active">List Project</button>
      <button type="button" class="btn btn-block btn-dark"><i class="fas fa-plus-circle"></i> Create New Project</button>
      <button type="button" class="btn btn-block btn-dark">Sony</button>
    </div>
</div>
<div class="projects  col-lg-10  col-md-8 content">
    <h3><?= __('Projects') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-secondary table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ProjectID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ProjectName') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
            <tr>
                <td><?= $this->Number->format($project->ProjectID) ?></td>
                <td><?= h($project->ProjectName) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $project->ProjectID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $project->ProjectID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->ProjectID], ['confirm' => __('Are you sure you want to delete # {0}?', $project->ProjectID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
</div>