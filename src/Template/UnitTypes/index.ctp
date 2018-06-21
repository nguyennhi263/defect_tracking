<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UnitType[]|\Cake\Collection\CollectionInterface $unitTypes
 */
?>
<!--Left Menu -->
<div class="row">
<div class="col-lg-2  col-md-3 bg-dark">
    <div class="btn-group-vertical btn-block">
        <a href="/defect_tracking/projects/" class="btn btn-dark ">List Project</a>
      <a href="/defect_tracking/unit-types/" class="btn btn-dark ">Unit Types</a>
      <a href="/defect_tracking/unit-types/add" class="btn btn-dark ">Create Unit Types</a>
    </div>
</div>
<div class="unitTypes index large-9 medium-8 columns content">
    <h3><?= __('Unit Types') ?></h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('UnitTypeID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($unitTypes as $unitType): ?>
            <tr>
                <td><?= $this->Number->format($unitType->UnitTypeID) ?></td>
                <td><?= h($unitType->name) ?></td>
                <td><?= h($unitType->image) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $unitType->UnitTypeID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $unitType->UnitTypeID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $unitType->UnitTypeID], ['confirm' => __('Are you sure you want to delete # {0}?', $unitType->UnitTypeID)]) ?>
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
