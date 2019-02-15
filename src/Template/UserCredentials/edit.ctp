<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserCredential $userCredential
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userCredential->User_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userCredential->User_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Credentials'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="userCredentials form large-9 medium-8 columns content">
    <?= $this->Form->create($userCredential) ?>
    <fieldset>
        <legend><?= __('Edit User Credential') ?></legend>
        <?php
            echo $this->Form->control('Username');
            echo $this->Form->control('Password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
