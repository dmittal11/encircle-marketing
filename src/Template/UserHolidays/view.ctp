<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserHoliday $userHoliday
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Holiday'), ['action' => 'edit', $userHoliday->User_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Holiday'), ['action' => 'delete', $userHoliday->User_id], ['confirm' => __('Are you sure you want to delete # {0}?', $userHoliday->User_id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Holidays'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Holiday'), ['action' => 'add']) ?> </li>
        <li><a href = "<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/encircle-marketing/approved-user-holidays"; ?>">Approved</a></li>
        <li><a href = "<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/encircle-marketing/pending-user-holidays"; ?>">Pending</a></li>
    </ul>
</nav>

<div class="userHolidays view large-9 medium-8 columns content">
    <h3><?= h($userHoliday->User_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userHoliday->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($userHoliday->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Days Available') ?></th>
            <td><?= $this->Number->format($user->available_days) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($userHoliday->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($userHoliday->end_date) ?></td>
        </tr>
    </table>
</div>
