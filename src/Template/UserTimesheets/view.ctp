<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserTimesheet $userTimesheet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Timesheet'), ['action' => 'edit', $userTimesheet->User_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Timesheet'), ['action' => 'delete', $userTimesheet->User_id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTimesheet->User_id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Timesheets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Timesheet'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userTimesheets view large-9 medium-8 columns content">
    <h3><?= h($userTimesheet->User_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= h($userTimesheet->time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userTimesheet->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($userTimesheet->user_id) ?></td>
        </tr>
    </table>
</div>
