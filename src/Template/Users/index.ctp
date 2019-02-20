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
