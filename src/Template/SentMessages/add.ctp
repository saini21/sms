<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SentMessage $sentMessage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sent Messages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sentMessages form large-9 medium-8 columns content">
    <?= $this->Form->create($sentMessage) ?>
    <fieldset>
        <legend><?= __('Add Sent Message') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('message');
            echo $this->Form->control('mobile');
            echo $this->Form->control('status');
            echo $this->Form->control('approved');
            echo $this->Form->control('message_group');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
