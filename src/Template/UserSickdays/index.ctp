<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSickday[]|\Cake\Collection\CollectionInterface $userSickdays
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Sickday'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userSickdays index large-9 medium-8 columns content">
    <h3><?= __('User Sickdays') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('evidence') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userSickdays as $userSickday): ?>
            <tr>
                <td><?= $this->Number->format($userSickday->id) ?></td>
                <td><?= $this->Number->format($userSickday->user_id) ?></td>
                <td><?= h($userSickday->duration) ?></td>
                <td><?= h($userSickday->evidence) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userSickday->User_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userSickday->User_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userSickday->User_id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSickday->User_id)]) ?>
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
</div>
