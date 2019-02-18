<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usersickday[]|\Cake\Collection\CollectionInterface $usersickdays
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Usersickday'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersickdays index large-9 medium-8 columns content">
    <h3><?= __('Usersickdays') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usersickdays as $usersickday): ?>
            <tr>
                <td><?= $this->Number->format($usersickday->id) ?></td>
                <td><?= $usersickday->has('user') ? $this->Html->link($usersickday->user->id, ['controller' => 'Users', 'action' => 'view', $usersickday->user->id]) : '' ?></td>
                <td><?= h($usersickday->start_date) ?></td>
                <td><?= h($usersickday->end_date) ?></td>
                <td><?= h($usersickday->duration) ?></td>
                <td><?= h($usersickday->file) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usersickday->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersickday->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersickday->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersickday->id)]) ?>
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
