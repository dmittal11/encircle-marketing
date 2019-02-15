<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSickday $userSickday
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Sickday'), ['action' => 'edit', $userSickday->User_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Sickday'), ['action' => 'delete', $userSickday->User_id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSickday->User_id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Sickdays'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Sickday'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userSickdays view large-9 medium-8 columns content">
    <h3><?= h($userSickday->User_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= h($userSickday->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Evidence') ?></th>
            <td><?= h($userSickday->evidence) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userSickday->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($userSickday->user_id) ?></td>
        </tr>
    </table>
</div>
