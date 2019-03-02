<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserHoliday $userHoliday
 */

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Holidays'), ['action' => 'index']) ?></li>
         <li><a href = "<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/encircle-marketing/approved-user-holidays"; ?>">Approved</a></li>
          <li><a href = "<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/encircle-marketing/pending-user-holidays"; ?>">Pending</a></li>
    </ul>
</nav>
<div class="userHolidays form large-9 medium-8 columns content">

  <h3><?= __('Rejected Holidays') ?></h3>
  <table cellpadding="0" cellspacing="0">
      <thead>
          <tr>
              <th scope="col"><?= $this->Paginator->sort('Field') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Details') ?></th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td>Name:</td>
              <td><?= h($user_details->name) ?></td>
          <tr>
          <tr>
              <td>Email:</td>
              <td><?= h($user_details->userEmail) ?></td>
          </tr>
          <tr>
              <td>Start Date:</td>
              <td><?= h($user_details->startDate) ?></td>
          </tr>
          <tr>
              <td>End Date:</td>
              <td><?= h($user_details->endDate) ?></td>
          </tr>
      </tbody>
  </table>


    <?= $this->Form->create('UserHolidays', ['url' => ['controller' => 'UserHolidays', 'action' => 'changeStatusRejected', $user_details->id]]) ?>
    <fieldset>
        <legend><?= __('notes') ?></legend>
        <?php
            echo $this->Form->textarea('notes');
        ?>
    </fieldset>



    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
