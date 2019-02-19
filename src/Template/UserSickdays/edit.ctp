<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usersickday $usersickday
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usersickday->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usersickday->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Usersickdays'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersickdays form large-9 medium-8 columns content">
    <?= $this->Form->create($usersickday, ['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Edit Usersickday') ?></legend>
        <?php
            //echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('start_date', ['label' => 'Start Date','class' => 'datepicker', 'type' => 'text']);
            echo $this->Form->control('end_date', ['label' => 'End Date','class' => 'datepicker', 'type' => 'text']);
            //echo $this->Form->control('duration');
            echo $this->Form->file('file');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script>
 $(function(){
   $(".datepicker").datepicker();
 });
</script>
