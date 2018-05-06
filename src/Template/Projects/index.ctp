<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
 */
?>
<div class="projects index large-9 medium-8 columns content">
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
