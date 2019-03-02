<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserHoliday[]|\Cake\Collection\CollectionInterface $userHolidays
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Holidays'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Holiday'), ['action' => 'add']) ?></li>
        <li><a href = "<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/encircle-marketing/pending-user-holidays"; ?>">Pending</a></li>
    </ul>
</nav>
<div class="userHolidays index large-9 medium-8 columns content">
  <h3><?= __('Days Available') ?></h3>
  <?= $this->Number->format($user->available_days) ?>

  <br>
  <br>

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
            <?php foreach ($userHolidays as $userHoliday): ?>
            <tr>
                <td><?= $this->Number->format($userHoliday->id) ?></td>
                <td><?= $this->Number->format($userHoliday->user_id) ?></td>
                <td><?= h($userHoliday->start_date) ?></td>
                <td><?= h($userHoliday->end_date) ?></td>
                <td><?= $this->Number->format($userHoliday->days_taken) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userHoliday->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userHoliday->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userHoliday->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userHoliday->id)]) ?>
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
