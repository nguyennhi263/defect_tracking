<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<!--Left Menu -->
<div class="row">
<div class="col-lg-2  col-md-3 bg-dark">
    <div class="btn-group-vertical btn-block">
    <a href="/defect_tracking/users/" class="btn btn-dark ">List User</a>
      <a href="/defect_tracking/users/add" class="btn btn-dark ">Create New User</a>
      
    </div>
</div>
<div class="users col-lg-10  col-md-9 columns content">
    <h3><?= __('Users') ?></h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('UserID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('LoginName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('PositionID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FullName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Imei') ?></th>
                <th scope="col"><?= $this->Paginator->sort('RecordStatus') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->UserID) ?></td>
                <td><?= h($user->LoginName) ?></td>
                <td><?= $this->Number->format($user->PositionID) ?></td>
                <td><?= h($user->FullName) ?></td>
                <td><?= h($user->Email) ?></td>
                <td><?= h($user->Imei) ?></td>
                <td><?= h($user->RecordStatus) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->UserID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->UserID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->UserID], ['confirm' => __('Are you sure you want to delete # {0}?', $user->UserID)]) ?>
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