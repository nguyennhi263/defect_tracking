<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contractor $contractor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contractor'), ['action' => 'edit', $contractor->ContractorID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contractor'), ['action' => 'delete', $contractor->ContractorID], ['confirm' => __('Are you sure you want to delete # {0}?', $contractor->ContractorID)]) ?> </li>
        <li><?= $this->Html->link(__('List Contractors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contractor'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
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
