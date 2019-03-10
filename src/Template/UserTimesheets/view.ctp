<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserTimesheet $userTimesheet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Times'), ['action' => 'edit', $userTimesheet->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Times'), ['action' => 'delete', $userTimesheet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTimesheet->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Times'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Times'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><a href = "<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/encircle-marketing/approved-user-timesheets"; ?>">Approved User Times</a></li>
        <li><a href = "<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/encircle-marketing/pending-user-timesheets"; ?>">Pending User Times</a></li>
    </ul>
</nav>
<div class="userTimesheets view large-9 medium-8 columns content">
    <h3><?= h($userTimesheet->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($userTimesheet->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Time') ?></th>
            <td><?php echo substr($userTimesheet->start_time, 8); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Time') ?></th>
            <td><?php echo substr($userTimesheet->end_time, 8); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration (Minutes)') ?></th>
            <td><?= $this->Number->format($userTimesheet->duration) ?></td>
        </tr>
    </table>
</div>
