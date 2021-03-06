<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usersickday $usersickday
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sick Days'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="usersickdays form large-9 medium-8 columns content">
    <?= $this->Form->create($usersickday, ['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Add Sick Days') ?></legend>
        <?php
            echo $this->Form->control('start_date', ['label' => 'Start Date','class' => 'datepicker', 'type' => 'text']);
            echo $this->Form->control('end_date', ['label' => 'End Date','class' => 'datepicker', 'type' => 'text']);
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
