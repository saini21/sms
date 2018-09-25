<nav class="large-3 medium-4 columns">
    <ul class="breadcrumb">
        <li class="heading g-mr-10"><?= __('Actions') ?></li>
        <li class="g-mr-10">|</li>
        <li class="g-mr-10"><?= $this->Html->link(__('List Subscription Packages'), ['controller' => 'SubscriptionPackages', 'action' => 'index']) ?></li>
        <li class="g-mr-10">|</li>
        <li class="g-mr-10"><?= $this->Html->link(__('New Subscription Package'), ['controller' => 'SubscriptionPackages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<h3 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30"><?= __('Subscriptions') ?></h3>
<div class="faqs table-responsive g-mb-40">
    <table cellpadding="0" cellspacing="0" class="table table-bordered table-hover u-table--v3 g-color-black">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('subscription_package_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('status') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($subscriptions as $subscription): ?>
            <tr>
                <td><?= $this->Number->format($subscription->id) ?></td>
                <td><?= $subscription->has('user') ? $this->Html->link($subscription->user->id, ['controller' => 'Users', 'action' => 'view', $subscription->user->id]) : '' ?></td>
                <td><?= $subscription->has('subscription_package') ? $this->Html->link($subscription->subscription_package->name, ['controller' => 'SubscriptionPackages', 'action' => 'view', $subscription->subscription_package->id]) : '' ?></td>
                <td>
                    <?= $this->element('Admin/status', [
                        'id' => $subscription->id,
                        'status' => $subscription->status,
                        'model' => 'Subscriptions'
                    ]) ?>
                </td>
                <td><?= h($subscription->created->nice()) ?></td>
                <td><?= h($subscription->modified->nice()) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->element('Admin/pagination') ?>
