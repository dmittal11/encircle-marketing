<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Holidays'), ['controller' => 'UserHolidays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Holiday'), ['controller' => 'UserHolidays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Sickdays'), ['controller' => 'UserSickdays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Sickday'), ['controller' => 'UserSickdays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Timesheets'), ['controller' => 'UserTimesheets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Timesheet'), ['controller' => 'UserTimesheets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('available_days') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->password) ?></td>
                <td><?= $this->Number->format($user->available_days) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
        </tbody>
    </table>
  </div>



  <div class="users index form large-9 medium-8 columns content">
      <fieldset>
          <legend><?= __('Add User Holiday') ?></legend>
          <?php
              echo $this->Form->control('start_date', ['label' => 'Start Date', 'class' => 'datepicker', 'type' => 'text']);
              echo $this->Form->control('end_date', ['label' => 'End Date', 'class' => 'datepicker', 'type' => 'text']);
          ?>
      </fieldset>

      <?= $this->Form->button(__('Submit'), ['id' => 'submit']) ?>
      <?= $this->Form->end() ?>

  <h3><?= __('Hours Worked') ?></h3>
  <table cellpadding="0" cellspacing="0">
      <thead>
          <tr>
              <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
              <th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
              <th scope="col"><?= $this->Paginator->sort('end_time') ?></th>
              <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($userTimesheets as $userTimesheet): ?>
          <tr>
              <td><?= h($userTimesheet->start_date) ?></td>
              <td><?= h($userTimesheet->start_time) ?></td>
              <td><?= h($userTimesheet->end_time) ?></td>
              <td><?= $this->hello();?> Hours</td>
          </tr>
          <?php endforeach; ?>
      </tbody>
  </table>
</div>

  <div id="content"></div>


    <!--
    <div class="paginator">
        <ul class="pagination">

             //$this->Paginator->first('<< ' . __('first'))
             //$this->Paginator->prev('< ' . __('previous'))
            //$this->Paginator->numbers()
             //$this->Paginator->next(__('next') . ' >')
            //$this->Paginator->last(__('last') . ' >>')
        </ul>
        <p> //$this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
-->

<script>

  public function hello(){

    return "This Works";
  }

</script>
<script>
$(function(){
  $(".datepicker").datepicker();
});
</script>
