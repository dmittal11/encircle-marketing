<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserHoliday $userHoliday
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Holidays'), ['action' => 'index']) ?></li>
         <li><a href = "<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/encircle-marketing/approved-user-holidays"; ?>">Approved</a></li>
          <li><a href = "<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/encircle-marketing/pending-user-holidays"; ?>">Pending</a></li>
    </ul>
</nav>
<div class="userHolidays form large-9 medium-8 columns content">
    <?= $this->Form->create($userHoliday) ?>
    <fieldset>
        <legend><?= __('Add User Holiday') ?></legend>
        <?php
            echo $this->Form->control('start_date', ['label' => 'Start Date', 'class' => 'datepicker', 'type' => 'text']);
            echo $this->Form->control('end_date', ['label' => 'End Date', 'class' => 'datepicker', 'type' => 'text']);
        ?>
    </fieldset>



    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
$(function(){
  $(".datepicker").datepicker();
});
</script>
