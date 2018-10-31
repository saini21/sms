<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserPayment $userPayment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Payment'), ['action' => 'edit', $userPayment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Payment'), ['action' => 'delete', $userPayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userPayment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Payments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Payment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userPayments view large-9 medium-8 columns content">
    <h3><?= h($userPayment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userPayment->has('user') ? $this->Html->link($userPayment->user->id, ['controller' => 'Users', 'action' => 'view', $userPayment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userPayment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment') ?></th>
            <td><?= $this->Number->format($userPayment->payment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userPayment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userPayment->modified) ?></td>
        </tr>
    </table>
</div>
