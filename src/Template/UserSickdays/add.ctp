<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSickday $userSickday
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Sickdays'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="userSickdays form large-9 medium-8 columns content">
    <?= $this->Form->create($userSickday) ?>
    <fieldset>
        <legend><?= __('Add User Sickday') ?></legend>
        <?php
            echo $this->Form->control('id');
            echo $this->Form->control('user_id');
            echo $this->Form->control('duration');
            echo $this->Form->control('evidence');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
