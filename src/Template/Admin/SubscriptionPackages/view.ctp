<nav class="large-3 medium-4 columns">
    <ul class="breadcrumb">
        <li class="heading g-mr-10"><?= __('Actions') ?></li>
        <li class="g-mr-10">|</li>
        <li class="g-mr-10"><?= $this->Html->link(__('New Subscription Package'), ['action' => 'add']) ?></li>
        <li class="g-mr-10">|</li>
        <li class="g-mr-10"><?= $this->Html->link(__('List Subscription Package'), ['action' => 'index']) ?> </li>
        <li class="g-mr-10">|</li>
        <li class="g-mr-10"><?= $this->Html->link(__('List Subscriptions'), ['controller' => 'Subscriptions', 'action' => 'index']) ?></li>
    </ul>
</nav>
<h3 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30"><?= $subscriptionPackage->name ?></h3>
<div class="subscriptionPackages view large-9 medium-8 columns content">
    <table class="table vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($subscriptionPackage->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($subscriptionPackage->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Earn Per Sms') ?></th>
            <td><?= h($subscriptionPackage->earn_per_sms) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subscriptionPackage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($subscriptionPackage->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($subscriptionPackage->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $subscriptionPackage->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <?php if (!empty($subscriptionPackage->subscriptions)): ?>
        <div class="related">
            <h4><?= __('Related Subscriptions') ?></h4>
            
            <table cellpadding="0" cellspacing="0" class="table table-bordered table-hover u-table--v3 g-color-black">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('User Id') ?></th>
                    <th scope="col"><?= __('Subscription Package Id') ?></th>
                    <th scope="col"><?= __('Status') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($subscriptionPackage->subscriptions as $subscriptions): ?>
                    <tr>
                        <td><?= h($subscriptions->id) ?></td>
                        <td><?= h($subscriptions->user_id) ?></td>
                        <td><?= h($subscriptions->subscription_package_id) ?></td>
                        <td><?= h($subscriptions->status) ?></td>
                        <td><?= h($subscriptions->created->nice()) ?></td>
                        <td><?= h($subscriptions->modified->nice()) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Subscriptions', 'action' => 'view', $subscriptions->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Subscriptions', 'action' => 'edit', $subscriptions->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Subscriptions', 'action' => 'delete', $subscriptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subscriptions->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        
        </div>
    <?php endif; ?>
</div>
