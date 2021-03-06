<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserTimesheet $userTimesheet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Times'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><a href = "<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/encircle-marketing/approved-user-timesheets"; ?>">Approved User Times</a></li>
        <li><a href = "<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/encircle-marketing/pending-user-timesheets"; ?>">Pending User Times</a></li>
    </ul>
</nav>
<div class="userTimesheets form large-9 medium-8 columns content">
    <?= $this->Form->create($userTimesheet) ?>
    <fieldset>
        <legend><?= __('Add Times') ?></legend>
        <?php
            echo $this->Form->control('start_date', ['label' => 'Start Date','class' => 'datepicker', 'type' => 'text']);
            echo $this->Form->control('start_time');
            echo $this->Form->control('end_time');
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
