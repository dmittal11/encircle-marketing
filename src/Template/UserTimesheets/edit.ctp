<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserTimesheet $userTimesheet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userTimesheet->User_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userTimesheet->User_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Timesheets'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="userTimesheets form large-9 medium-8 columns content">
    <?= $this->Form->create($userTimesheet) ?>
    <fieldset>
        <legend><?= __('Edit User Timesheet') ?></legend>
        <?php
            echo $this->Form->control('id');
            echo $this->Form->control('user_id');
            echo $this->Form->control('time');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
