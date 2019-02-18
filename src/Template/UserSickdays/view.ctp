<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usersickday $usersickday
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Usersickday'), ['action' => 'edit', $usersickday->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Usersickday'), ['action' => 'delete', $usersickday->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersickday->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Usersickdays'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usersickday'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersickdays view large-9 medium-8 columns content">
    <h3><?= h($usersickday->User_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $usersickday->has('user') ? $this->Html->link($usersickday->user->id, ['controller' => 'Users', 'action' => 'view', $usersickday->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= h($usersickday->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= h($usersickday->file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usersickday->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($usersickday->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($usersickday->end_date) ?></td>
        </tr>
    </table>
</div>
