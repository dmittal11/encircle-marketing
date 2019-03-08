<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php if(!$admin) :  ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $users->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List User Holidays'), ['controller' => 'UserHolidays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Holiday'), ['controller' => 'UserHolidays', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Sickdays'), ['controller' => 'UserSickdays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Sickday'), ['controller' => 'UserSickdays', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Timesheets'), ['controller' => 'UserTimesheets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Timesheet'), ['controller' => 'UserTimesheets', 'action' => 'add']) ?> </li>
    </ul>
</nav>

<div class="users view large-9 medium-8 columns content">

    <h3><?= h($users->id) ?></h3>
    <table class="vertical-table">
    <?php foreach ($users as $user): ?>
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
        <?php endforeach; ?>
    </table>
    <div class="related">
        <h4><?= __('Related User Holidays') ?></h4>
        <?php if (!empty($userholidays)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($userholidays as $userHoliday): ?>
            <tr>
                <td><?= h($userHoliday->id) ?></td>
                <td><?= h($userHoliday->user_id) ?></td>
                <td><?= h($userHoliday->start_date) ?></td>
                <td><?= h($userHoliday->end_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserHolidays', 'action' => 'view', $userHoliday->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserHolidays', 'action' => 'edit', $userHoliday->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserHolidays', 'action' => 'delete', $userHoliday->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userHoliday->User_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
      <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Sickdays') ?></h4>
        <?php if (!empty($usersickdays)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Duration') ?></th>
                <th scope="col"><?= __('Evidence') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usersickdays as $userSickday): ?>
            <tr>
                <td><?= h($userSickday->id) ?></td>
                <td><?= h($userSickday->user_id) ?></td>
                <td><?= h($userSickday->duration) ?></td>
                <td><?= h($userSickday->file) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserSickdays', 'action' => 'view', $userSickday->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserSickdays', 'action' => 'edit', $userSickday->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserSickdays', 'action' => 'delete', $userSickday->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSickday->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Timesheets') ?></h4>
        <?php if (!empty($usertimesheets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Time (Minutes)') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usertimesheets as $userTimesheet): ?>
            <tr>
                <td><?= h($userTimesheet->id) ?></td>
                <td><?= h($userTimesheet->user_id) ?></td>
                <td><?= h($userTimesheet->duration) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserTimesheets', 'action' => 'view', $userTimesheet->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserTimesheets', 'action' => 'edit', $userTimesheet->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserTimesheets', 'action' => 'delete', $userTimesheet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTimesheet->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<?php endif; ?>

<?php if($admin): ?>

<!--  Admin Section -->

<!-- Credentials of User -->

<h3><?= __('User Details') ?></h3>
<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('Field') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Details') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td>Email:</td>
            <td><?= h($user->email) ?></td>
        <tr>
        <tr>
            <td>Username:</td>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><?= h($user->password) ?></td>
         </tr>
         <?php endforeach; ?>
    </tbody>
</table>

<!-- Summary Of UserHolidays -->




<!-- Summary Of UserTimesheets -->



<!-- Pending Holidays -->

<h3><?= __('Days Available') ?></h3>
<?= $this->Number->format($user->available_days) ?>

<br>
<br>

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
             <?php foreach ($userholidays as $userHoliday): ?>
               <?php if($userHoliday->status == "Pending"): ?>
             <tr>
                 <td><?= $this->Number->format($userHoliday->id) ?></td>
                 <td><?= $this->Number->format($userHoliday->user_id) ?></td>
                 <td><?= h($userHoliday->start_date) ?></td>
                 <td><?= h($userHoliday->end_date) ?></td>
                 <td><?= $this->Number->format($userHoliday->days_taken) ?></td>
                 <td><?= h($userHoliday->status) ?></td>

                 <td class="actions">
                     <?= $this->Html->link(__('View'), ['controller' => 'UserHolidays','action' => 'view', $userHoliday->id]) ?>
                     <?= $this->Html->link(__('Edit'), ['controller' => 'UserHolidays', 'action' => 'edit', $userHoliday->id]) ?>
                     <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserHolidays', 'action' => 'delete', $userHoliday->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userHoliday->id)]) ?>
                       <?= $this->Html->link(__('Approve'), ['controller' => 'UserHolidays', 'action' => 'changeStatusApproved', $userHoliday->id], ['confirm' => __('Are you sure you want to Approve # {0}?', $userHoliday->id)]) ?>
                       <?= $this->Html->link(__('Reject'), ['controller' => 'UserHolidays', 'action' => 'RejectedUserHolidays', $userHoliday->id], ['confirm' => __('Are you want to Reject # {0}?', $userHoliday->id)]) ?>
                 </td>
             </tr>
           <?php endif; ?>
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

     <h3><?= __('Rejected Holidays') ?></h3>
     <table cellpadding="0" cellspacing="0">
         <thead>
             <tr>
                 <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('days_taken') ?></th>
                 <th scope="col" class="actions"><?= __('Actions') ?></th>
             </tr>
         </thead>
         <tbody>
             <?php foreach ($userholidays as $userHoliday): ?>
               <?php if($userHoliday->status == "Rejected"): ?>
             <tr>
                 <td><?= $this->Number->format($userHoliday->id) ?></td>
                 <td><?= $this->Number->format($userHoliday->user_id) ?></td>
                 <td><?= h($userHoliday->start_date) ?></td>
                 <td><?= h($userHoliday->end_date) ?></td>
                 <td><?= $this->Number->format($userHoliday->days_taken) ?></td>
                 <td class="actions">
                     <?= $this->Html->link(__('View'), ['controller' => 'UserHolidays', 'action' => 'view', $userHoliday->id]) ?>
                     <?= $this->Html->link(__('Edit'), ['controller' => 'UserHolidays', 'action' => 'edit', $userHoliday->id]) ?>
                     <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserHolidays', 'action' => 'delete', $userHoliday->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userHoliday->id)]) ?>
                     <?= $this->Html->link(__('Pending'), ['controller' => 'UserHolidays', 'action' => 'changeStatusPending', $userHoliday->id], ['confirm' => __('Are you want to put status back to pending # {0}?', $userHoliday->id)]) ?>
                     <?= $this->Html->link(__('Approve'), ['controller' => 'UserHolidays', 'action' => 'changeStatusApproved', $userHoliday->id], ['confirm' => __('Are you want to Approve # {0}?', $userHoliday->id)]) ?>
                 </td>
             </tr>
           <?php endif; ?>
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
 </div>





<!-- Approved Holidays -->


    <h3><?= __('Approved Holidays') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('days_taken') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userholidays as $userHoliday): ?>
               <?php if($userHoliday->status == "Approved"): ?>
            <tr>
                <td><?= $this->Number->format($userHoliday->id) ?></td>
                <td><?= $this->Number->format($userHoliday->user_id) ?></td>
                <td><?= h($userHoliday->start_date) ?></td>
                <td><?= h($userHoliday->end_date) ?></td>
                <td><?= $this->Number->format($userHoliday->days_taken) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserHolidays', 'action' => 'view', $userHoliday->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserHolidays', 'action' => 'edit', $userHoliday->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserHolidays', 'action' => 'delete', $userHoliday->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userHoliday->id)]) ?>
                    <?= $this->Html->link(__('Pending'), ['controller' => 'UserHolidays', 'action' => 'changeStatusPending', $userHoliday->id], ['confirm' => __('Are you want to put status back to pending # {0}?', $userHoliday->id)]) ?>
                    <?= $this->Html->link(__('Rejected'), ['controller' => 'UserHolidays', 'action' => 'RejectedUserHolidays', $userHoliday->id], ['confirm' => __('Are you want to Reject # {0}?', $userHoliday->id)]) ?>
                </td>
            </tr>
          <?php endif; ?>
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
</div>



<!-- Pending Timesheets -->

    <h3><?= __('Pending User Timesheets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration (Minutes)') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usertimesheets as $userTimesheet): ?>
               <?php if($userTimesheet->status == "Pending"): ?>
            <tr>
                <td><?= $this->Number->format($userTimesheet->id) ?></td>
                <td><?= $this->Number->format($userTimesheet->user_id) ?></td>
                <td><?= h($userTimesheet->start_date) ?></td>
                <td><?= h($userTimesheet->start_time) ?></td>
                <td><?= h($userTimesheet->end_time) ?></td>
                <td><?= $this->Number->format($userTimesheet->duration) ?></td>
                <td><?= h($userTimesheet->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserTimesheets', 'action' => 'view', $userTimesheet->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserTimesheets', 'action' => 'edit', $userTimesheet->id]) ?>
                    <?= $this->Html->link(__('Delete'), ['controller' => 'UserTimesheets', 'action' => 'delete', $userTimesheet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTimesheet->id)]) ?>
                    <?= $this->Html->link(__('Approve'), ['controller' => 'UserTimesheets', 'action' => 'changeStatusApproved', $userTimesheet->id], ['confirm' => __('Are you sure you want to approve times # {0}?', $userTimesheet->id)]) ?>
                    <?= $this->Html->link(__('Rejected'), ['controller' => 'UserTimesheets', 'action' => 'changeStatusRejected', $userTimesheet->id], ['confirm' => __('Are you want to Reject times # {0}?', $userTimesheet->id)]) ?>
                </td>
            </tr>
          <?php endif; ?>
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
</div>


<!-- Rejected Timesheets -->

    <h3><?= __('Rejected Times') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration (Minutes)') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usertimesheets as $userTimesheet): ?>
               <?php if($userTimesheet->status == "Rejected"): ?>
            <tr>
                <td><?= $this->Number->format($userTimesheet->id) ?></td>
                <td><?= $this->Number->format($userTimesheet->user_id) ?></td>
                <td><?= h($userTimesheet->start_date) ?></td>
                <td><?= h($userTimesheet->start_time) ?></td>
                <td><?= h($userTimesheet->end_time) ?></td>
                <td><?= $this->Number->format($userTimesheet->duration) ?></td>
                <td><?= h($userTimesheet->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserTimesheets', 'action' => 'view', $userTimesheet->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserTimesheets', 'action' => 'edit', $userTimesheet->id]) ?>
                    <?= $this->Html->link(__('Delete'), ['controller' => 'UserTimesheets', 'action' => 'delete', $userTimesheet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTimesheet->id)]) ?>
                    <?= $this->Html->link(__('Pending'), ['controller' => 'UserTimesheets', 'action' => 'changeStatusPending', $userTimesheet->id], ['confirm' => __('Are you sure you want to change status to pending # {0}?', $userTimesheet->id)]) ?>
                    <?= $this->Html->link(__('Approve'), ['controller' => 'UserTimesheets', 'action' => 'changeStatusApproved', $userTimesheet->id], ['confirm' => __('Are you sure you want to change status to approve # {0}?', $userTimesheet->id)]) ?>
                </td>
            </tr>
          <?php endif; ?>
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
</div>


<!-- Approved Timesheets -->

<h3><?= __('Approved Times') ?></h3>
<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
            <th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
            <th scope="col"><?= $this->Paginator->sort('end_time') ?></th>
            <th scope="col"><?= $this->Paginator->sort('duration (Minutes)') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usertimesheets as $userTimesheet): ?>
           <?php if($userTimesheet->status == "Approved"): ?>
        <tr>
            <td><?= $this->Number->format($userTimesheet->id) ?></td>
            <td><?= $this->Number->format($userTimesheet->user_id) ?></td>
            <td><?= h($userTimesheet->start_date) ?></td>
            <td><?= h($userTimesheet->start_time) ?></td>
            <td><?= h($userTimesheet->end_time) ?></td>
            <td><?= $this->Number->format($userTimesheet->duration) ?></td>
            <td><?= h($userTimesheet->status) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'UserTimesheets', 'action' => 'view', $userTimesheet->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'UserTimesheets', 'action' => 'edit', $userTimesheet->id]) ?>
                <?= $this->Html->link(__('Delete'), ['controller' => 'UserTimesheets', 'action' => 'delete', $userTimesheet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTimesheet->id)]) ?>
                <?= $this->Html->link(__('Pending'), ['controller' => 'UserTimesheets', 'action' => 'changeStatusPending', $userTimesheet->id], ['confirm' => __('Are you sure you want to change status to pending # {0}?', $userTimesheet->id)]) ?>
                <?= $this->Html->link(__('Rejected'), ['controller' => 'UserTimesheets', 'action' => 'changeStatusRejected', $userTimesheet->id], ['confirm' => __('Are you sure you want to change status to rejected # {0}?', $userTimesheet->id)]) ?>
            </td>
        </tr>
      <?php endif; ?>
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
</div>

<!-- Calendar -->

<h3><?= __('Calendar') ?></h3>
<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('Total') ?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><a href="http://localhost/bootstrap-calendar-master/bootstrap-calendar-master/convertData.php?id=<?= $this->Number->format($user->id) ?>">View Calendar</a></td>
        </tr>
    </tbody>
</table>

<!-- User Sickdays -->

<div class="related">
    <h4><?= __('User Sickdays') ?></h4>
    <?php if (!empty($usersickdays)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th scope="col"><?= __('Id') ?></th>
            <th scope="col"><?= __('User Id') ?></th>
            <th scope="col"><?= __('Duration') ?></th>
            <th scope="col"><?= __('Evidence') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($usersickdays as $userSickdays): ?>
        <tr>
            <td><?= h($userSickdays->id) ?></td>
            <td><?= h($userSickdays->user_id) ?></td>
            <td><?= h($userSickdays->duration) ?></td>
            <td><?= h($userSickdays->file) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'UserSickdays', 'action' => 'view', $userSickdays->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'UserSickdays', 'action' => 'edit', $userSickdays->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserSickdays', 'action' => 'delete', $userSickdays->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSickdays->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</div>



<?php endif; ?>
