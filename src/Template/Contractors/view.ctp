<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contractor $contractor
 */
?>
<!--Left Menu -->
<div class="row">
<div class="col-lg-2  col-md-3 bg-dark">
    <div class="btn-group-vertical btn-block">
        <button type="button" class="btn btn-block btn-dark ">List Project</button>
      <a href="/defect_tracking/projects/add" class="btn btn-dark ">Create New Project</a>
      <a href="/defect_tracking/Contractors/" class="btn btn-dark ">Contractor</a>
    </div>
</div>
<div class="contractors view large-9 medium-8 columns content">
    <h3><?= h($contractor->ContractorID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ContractorID') ?></th>
            <td><?= $this->Number->format($contractor->ContractorID) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('ContractorName') ?></h4>
        <?= $this->Text->autoParagraph(h($contractor->ContractorName)); ?>
    </div>
</div>
</div>
