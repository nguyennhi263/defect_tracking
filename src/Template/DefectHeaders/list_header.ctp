<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DefectHeader[]|\Cake\Collection\CollectionInterface $defectHeaders
 */
?>
<div class="defectHeaders index large-9 medium-8 columns content">
    <h3><?= __('List Defect Pending') ?></h3>
    <table class="table table-hover">
    <thead>
      <tr>
        <th>Project</th>
        <th>Unit No</th>
        <th>Created Date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php foreach ($defectHeaders as $defectHeader): ?>
            <tr>
                <td><?= $this->Number->format($defectHeader->DefectID) ?></td>
                <td><?= $defectHeader->has('UnitName') ? $this->Html->link($defectHeader->UnitName->UnitName, ['controller' => 'Units', 'action' => 'view', $defectHeader->UnitName->UnitID]) : '' ?></td>
                <td><?= h($defectHeader->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $defectHeader->DefectID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $defectHeader->DefectID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $defectHeader->DefectID], ['confirm' => __('Are you sure you want to delete # {0}?', $defectHeader->DefectID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
      </tr>
      </tr>
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
