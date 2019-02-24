<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Holidays'), ['controller' => 'UserHolidays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Holiday'), ['controller' => 'UserHolidays', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Sickdays'), ['controller' => 'Usersickdays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Sickday'), ['controller' => 'Usersickdays', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Timesheets'), ['controller' => 'UserTimesheets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Timesheet'), ['controller' => 'UserTimesheets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Available Days') ?></th>
            <td><?= $this->Number->format($user->available_days) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related User Holidays') ?></h4>
        <?php if (!empty($user->user_holidays)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Days Taken') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_holidays as $userHolidays): ?>
            <tr>
                <td><?= h($userHolidays->id) ?></td>
                <td><?= h($userHolidays->user_id) ?></td>
                <td><?= h($userHolidays->start_date) ?></td>
                <td><?= h($userHolidays->end_date) ?></td>
                <td><?= h($userHolidays->days_taken) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserHolidays', 'action' => 'view', $userHolidays->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserHolidays', 'action' => 'edit', $userHolidays->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserHolidays', 'action' => 'delete', $userHolidays->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userHolidays->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Usersickdays') ?></h4>
        <?php if (!empty($user->user_sickdays)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Duration') ?></th>
                <th scope="col"><?= __('File') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_sickdays as $userSickdays): ?>
            <tr>
                <td><?= h($userSickdays->id) ?></td>
                <td><?= h($userSickdays->user_id) ?></td>
                <td><?= h($userSickdays->duration) ?></td>
                <td><?= h($userSickdays->file) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Usersickdays', 'action' => 'view', $userSickdays->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Usersickdays', 'action' => 'edit', $userSickdays->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Usersickdays', 'action' => 'delete', $userSickdays->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSickdays->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Timesheets') ?></h4>
        <?php if (!empty($user->user_timesheets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('Start Time') ?></th>
                <th scope="col"><?= __('End Time') ?></th>
                <th scope="col"><?= __('Duration') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_timesheets as $userTimesheets): ?>
            <tr>
                <td><?= h($userTimesheets->id) ?></td>
                <td><?= h($userTimesheets->user_id) ?></td>
                <td><?= h($userTimesheets->start_date) ?></td>
                <td><?= h($userTimesheets->start_time) ?></td>
                <td><?= h($userTimesheets->end_time) ?></td>
                <td><?= h($userTimesheets->duration) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserTimesheets', 'action' => 'view', $userTimesheets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserTimesheets', 'action' => 'edit', $userTimesheets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserTimesheets', 'action' => 'delete', $userTimesheets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTimesheets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
