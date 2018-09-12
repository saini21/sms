<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SentMessage $sentMessage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sent Message'), ['action' => 'edit', $sentMessage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sent Message'), ['action' => 'delete', $sentMessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sentMessage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sent Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sent Message'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sentMessages view large-9 medium-8 columns content">
    <h3><?= h($sentMessage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $sentMessage->has('user') ? $this->Html->link($sentMessage->user->id, ['controller' => 'Users', 'action' => 'view', $sentMessage->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Message') ?></th>
            <td><?= h($sentMessage->message) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile') ?></th>
            <td><?= h($sentMessage->mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Message Group') ?></th>
            <td><?= h($sentMessage->message_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sentMessage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sentMessage->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sentMessage->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $sentMessage->status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved') ?></th>
            <td><?= $sentMessage->approved ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
