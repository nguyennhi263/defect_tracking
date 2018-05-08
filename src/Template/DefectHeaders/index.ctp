<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DefectHeader[]|\Cake\Collection\CollectionInterface $defectHeaders
 */
?>
<div class="row">
    <!--Left Menu -->
    <div class="left-menu col-sm-3 col-md-2 bg-dark">
          <div class="btn-group-vertical btn-block">
                <button type="button" class="btn btn-block btn-dark active">List Defect</button>
              <a href="/defect_tracking/defect-headers/block" class="btn btn-dark ">Create New Defect</a>
              <button type="button" class="btn btn-block btn-dark"></button>
            </div>
    </div>
    <!-- contend -->
    <div class="col-sm-9 col-md-10">
        <!-- Card holder-->
        <div class="row">          
            <div class="card-body" style="background-color:#DEF3FD;">
                <div class="card-number"><i class="fa fa-bug" aria-hidden="true"></i><?= sizeof($defectItemsToday) ?></div>
                Defects opened Today
            </div> 
            <div class="card-body" style="background-color:#FCF7DE;">
                <div class="card-number"><i class="fa fa-table" aria-hidden="true"></i><?= sizeof($defectItems) ?></div>
                 Defects Open
            </div> 
            <div class="card-body" style="background-color:#DEFDE0;">
                <div class="card-number"><i class="fa fa-wrench" aria-hidden="true"></i><?= sizeof($defectItemsClose) ?></div>
                  Fix today
            </div> 
        </div>

        <!-- List defect  header -->


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
</div>