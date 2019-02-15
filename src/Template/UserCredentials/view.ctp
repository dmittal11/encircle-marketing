<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserCredential $userCredential
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Credential'), ['action' => 'edit', $userCredential->User_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Credential'), ['action' => 'delete', $userCredential->User_id], ['confirm' => __('Are you sure you want to delete # {0}?', $userCredential->User_id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Credentials'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Credential'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userCredentials view large-9 medium-8 columns content">
    <h3><?= h($userCredential->User_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($userCredential->Username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($userCredential->Password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($userCredential->User_id) ?></td>
        </tr>
    </table>
</div>
