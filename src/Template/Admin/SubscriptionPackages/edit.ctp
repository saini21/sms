<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubscriptionPackage $subscriptionPackage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $subscriptionPackage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $subscriptionPackage->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Subscription Packages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Subscriptions'), ['controller' => 'Subscriptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subscription'), ['controller' => 'Subscriptions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subscriptionPackages form large-9 medium-8 columns content">
    <?= $this->Form->create($subscriptionPackage) ?>
    <fieldset>
        <legend><?= __('Edit Subscription Package') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('price');
            echo $this->Form->control('earn_per_sms');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
