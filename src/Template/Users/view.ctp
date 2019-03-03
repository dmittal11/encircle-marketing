<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?php if($admin == 0):  ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Holidays'), ['controller' => 'UserHolidays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Holiday'), ['controller' => 'UserHolidays', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Sickdays'), ['controller' => 'UserSickdays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Sickday'), ['controller' => 'UserSickdays', 'action' => 'add']) ?> </li>
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
                <th scope="col"><?= __('Days Available') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_holidays as $userHolidays): ?>
            <tr>
                <td><?= h($userHolidays->id) ?></td>
                <td><?= h($userHolidays->user_id) ?></td>
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
        <?php if (!empty($user->user_sickdays)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Duration') ?></th>
                <th scope="col"><?= __('Evidence') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_sickdays as $userSickdays): ?>
            <tr>
                <td><?= h($userSickdays->id) ?></td>
                <td><?= h($userSickdays->user_id) ?></td>
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
        <?php if (!empty($user->user_timesheets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Time') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_timesheets as $userTimesheets): ?>
            <tr>
                <td><?= h($userTimesheets->id) ?></td>
                <td><?= h($userTimesheets->user_id) ?></td>
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

<?php endif; ?>

<?php if($admin == 1): ?>

<!--  Admin Section -->

<!-- Summary Of UserHolidays -->




<!-- Summary Of UserTimesheets -->



<!-- Pending Holidays -->





  <h3><?= __('Pending Holidays') ?></h3>
     <table cellpadding="0" cellspacing="0">
         <thead>
             <tr>
                 <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('days_taken') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                 <th scope="col" class="actions"><?= __('Actions') ?></th>
             </tr>
         </thead>
         <tbody>
             <?php foreach ($user->user_holidays as $userHoliday): ?>
             <tr>
                 <td><?= $this->Number->format($userHoliday->id) ?></td>
                 <td><?= $this->Number->format($userHoliday->user_id) ?></td>
                 <td><?= h($userHoliday->start_date) ?></td>
                 <td><?= h($userHoliday->end_date) ?></td>
                 <td><?= $this->Number->format($userHoliday->days_taken) ?></td>
                 <td><?= h($userHoliday->status) ?></td>

                 <td class="actions">
                     <?= $this->Html->link(__('View'), ['action' => 'view', $userHoliday->id]) ?>
                     <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userHoliday->id]) ?>
                     <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userHoliday->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userHoliday->id)]) ?>
                     <?php if($admin): ?>
                       <?= $this->Html->link(__('Approve'), ['action' => 'changeStatusCompleted', $userHoliday->id], ['confirm' => __('Are you sure you want to Approve # {0}?', $userHoliday->id)]) ?>
                       <?= $this->Html->link(__('Reject'), ['action' => 'RejectedUserHolidays', $userHoliday->id], ['confirm' => __('Are you want to Reject # {0}?', $userHoliday->id)]) ?>
                     <?php endif; ?>
                 </td>
             </tr>
             <?php endforeach; ?>
         </tbody>
     </table>
     <div class="paginator">
         <ul class="pagination">
             <?= $this->Paginator->first('<< ' . __('first')) ?>
             <?= $this->Paginator->prev('< ' . __('previous')) ?>
             <?= $this->Paginator->numbers() ?>
             <?= $this->Paginator->next(__('next') . ' >') ?>
             <?= $this->Paginator->last(__('last') . ' >>') ?>
         </ul>
         <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
     </div>



 <!-- Rejected Holidays -->






<!-- Approved Holidays -->




<!-- Pending Timesheets -->



<!-- Rejected Timesheets -->




<!-- Approved Timesheets ->




<?php endif; ?>
