<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contractor[]|\Cake\Collection\CollectionInterface $contractors
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Contractor'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contractors index large-9 medium-8 columns content">
    <h3><?= __('Contractors') ?></h3>
    <table cellpadding="0" cellspacing="0">
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
