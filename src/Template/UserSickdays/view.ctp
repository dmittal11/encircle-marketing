<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usersickday $usersickday
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sick Day'), ['action' => 'edit', $usersickday->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sick Day'), ['action' => 'delete', $usersickday->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersickday->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sick Days'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sick Day'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="usersickdays view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($usersickday->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($usersickday->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= h($usersickday->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= h($usersickday->file) ?></td>
        </tr>
    </table>

    <p> Document Viewer </p>
    <iframe width='800' height='456' src='view-pdf/<?php echo $usersickday->id ?>'></iframe>
</div>
