<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Login $login
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Logins'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Holidays'), ['controller' => 'UserHolidays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Holiday'), ['controller' => 'UserHolidays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Sickdays'), ['controller' => 'UserSickdays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Sickday'), ['controller' => 'UserSickdays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Timesheets'), ['controller' => 'UserTimesheets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Timesheet'), ['controller' => 'UserTimesheets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="logins form large-9 medium-8 columns content">
    <?= $this->Form->create($login) ?>
    <fieldset>
        <legend><?= __('Add Login') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('available_days');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
