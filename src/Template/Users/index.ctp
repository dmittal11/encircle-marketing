<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Holidays'), ['controller' => 'UserHolidays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Holiday'), ['controller' => 'UserHolidays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sick Days'), ['controller' => 'UserSickdays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sick Day'), ['controller' => 'UserSickdays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Times'), ['controller' => 'UserTimesheets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Times'), ['controller' => 'UserTimesheets', 'action' => 'add']) ?></li>
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


          <?php

          if($admin == 1):
          foreach ($users as $user):

          ?>

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
         <?php endforeach;
               endif;
          ?>

         <?php
         if($admin == 0):

         ?>

            <tr>
                <td><?= $this->Number->format($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= $this->Number->format($users->available_days) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>

          <?php endif ?>

        </tbody>
    </table>


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
              <td><?php echo substr($userTimesheet->start_time, 8); ?></td>
              <td><?php echo substr($userTimesheet->end_time, 8); ?></td>
              <td><?= h($userTimesheet->new_duration)?></td>
          </tr>
          <?php endforeach; ?>
      </tbody>
  </table>
  <br>
  <br>
  <br>

  <h3><?= __('Total Time Worked') ?></h3>
  <table cellpadding="0" cellspacing="0">
      <thead>
          <tr>
              <th scope="col"><?= $this->Paginator->sort('Total') ?></th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td><?= h($total) ?></td>
          </tr>
      </tbody>
  </table>

  <br>
  <br>
  <br>
<?php if($admin == 1): ?>

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

<?php endif ?>

<br>

  <!-- Find Times Worked In Index.ctp -->
  <?= $this->Form->create(null, [
    'url' => 'http://localhost/encircle-marketing/users/index/',
    'type' => 'post'
  ]
);
?>

    <fieldset>

        <legend><?= __('Find Hours Worked') ?></legend>
        <?php
            echo $this->Form->control('start_date', ['label' => 'Start Date', 'class' => 'datepicker', 'type' => 'text']);
            echo $this->Form->control('end_date', ['label' => 'End Date', 'class' => 'datepicker', 'type' => 'text']);
        ?>
    </fieldset>

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

    <!-- -->

</div>
<script>
$(function(){
  $(".datepicker").datepicker();
});
</script>
