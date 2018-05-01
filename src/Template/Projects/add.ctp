<?php
use Cake\Routing\Router;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Phases'), ['controller' => 'Phases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phase'), ['controller' => 'Phases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projects form large-9 medium-8 columns content">
    <?= $this->Form->create($project) ?>
    <fieldset>
        <legend><?= __('Add Project') ?></legend>
        <?php
            echo $this->Form->control('ProjectName');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['id'=>'insert-project']) ?>
    <?= $this->Form->end() ?>
    <script type="text/javascript">
    jQuery(document).ready(function ($) {
    $('#insert-project').click(function(){
        var projectName="test project name";
        $.ajax({
            dataType: "html",
            method:"POST",
            type: "POST",
            evalScripts: true,
            url: '<?php echo Router::url(['controller'=>'Projects','action'=>'add']);?>',
            data: ({ProjectName:projectName}),
            success: function (data, textStatus){
               // $("#div1").html(data);
               alert(data);
            }
        });
    });
});
</script>
</div>
