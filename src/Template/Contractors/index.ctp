<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contractor[]|\Cake\Collection\CollectionInterface $contractors
 */
?>
<!--Left Menu -->
<div class="row">
<div class="col-lg-2  col-md-3 bg-dark">
    <div class="btn-group-vertical btn-block">
       <a href="/defect_tracking/projects/" class="btn btn-dark ">List Project</a>
      <a href="/defect_tracking/projects/add" class="btn btn-dark ">Create New Project</a>
      <a href="/defect_tracking/Contractors/" class="btn btn-dark ">Contractor</a>
      <a href="/defect_tracking/Contractors/add" class="btn btn-dark ">Add Contractor</a>
    </div>
</div>
<div class="contractors index large-9 medium-8 columns content">
    <h3><?= __('Contractors') ?></h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ContractorID') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contractors as $contractor): ?>
            <tr>
                <td><?= $this->Number->format($contractor->ContractorID) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $contractor->ContractorID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contractor->ContractorID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contractor->ContractorID], ['confirm' => __('Are you sure you want to delete # {0}?', $contractor->ContractorID)]) ?>
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
