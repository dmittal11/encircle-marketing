<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Login $login
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Login'), ['action' => 'edit', $login->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Login'), ['action' => 'delete', $login->id], ['confirm' => __('Are you sure you want to delete # {0}?', $login->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Logins'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Login'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Holidays'), ['controller' => 'UserHolidays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Holiday'), ['controller' => 'UserHolidays', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Sickdays'), ['controller' => 'UserSickdays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Sickday'), ['controller' => 'UserSickdays', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Timesheets'), ['controller' => 'UserTimesheets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Timesheet'), ['controller' => 'UserTimesheets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="logins view large-9 medium-8 columns content">
    <h3><?= h($login->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($login->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($login->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($login->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Available Days') ?></th>
            <td><?= $this->Number->format($login->available_days) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related User Holidays') ?></h4>
        <?php if (!empty($login->user_holidays)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Login Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Days Available') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($login->user_holidays as $userHolidays): ?>
            <tr>
                <td><?= h($userHolidays->id) ?></td>
                <td><?= h($userHolidays->login_id) ?></td>
                <td><?= h($userHolidays->start_date) ?></td>
                <td><?= h($userHolidays->end_date) ?></td>
                <td><?= h($userHolidays->days_available) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserHolidays', 'action' => 'view', $userHolidays->User_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserHolidays', 'action' => 'edit', $userHolidays->User_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserHolidays', 'action' => 'delete', $userHolidays->User_id], ['confirm' => __('Are you sure you want to delete # {0}?', $userHolidays->User_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Sickdays') ?></h4>
        <?php if (!empty($login->user_sickdays)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Login Id') ?></th>
                <th scope="col"><?= __('Duration') ?></th>
                <th scope="col"><?= __('Evidence') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($login->user_sickdays as $userSickdays): ?>
            <tr>
                <td><?= h($userSickdays->id) ?></td>
                <td><?= h($userSickdays->login_id) ?></td>
                <td><?= h($userSickdays->duration) ?></td>
                <td><?= h($userSickdays->evidence) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserSickdays', 'action' => 'view', $userSickdays->User_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserSickdays', 'action' => 'edit', $userSickdays->User_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserSickdays', 'action' => 'delete', $userSickdays->User_id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSickdays->User_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Timesheets') ?></h4>
        <?php if (!empty($login->user_timesheets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Login Id') ?></th>
                <th scope="col"><?= __('Time') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($login->user_timesheets as $userTimesheets): ?>
            <tr>
                <td><?= h($userTimesheets->id) ?></td>
                <td><?= h($userTimesheets->login_id) ?></td>
                <td><?= h($userTimesheets->time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserTimesheets', 'action' => 'view', $userTimesheets->User_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserTimesheets', 'action' => 'edit', $userTimesheets->User_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserTimesheets', 'action' => 'delete', $userTimesheets->User_id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTimesheets->User_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
