<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
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
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('LoginName');
            echo $this->Form->control('UserPass',['type'=>'password']);
            echo $this->Form->control('PositionID');
            echo $this->Form->control('FullName');
            echo $this->Form->control('Email');
            echo $this->Form->control('Imei');
            echo $this->Form->control('RecordStatus');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>
