<nav class="large-3 medium-4 columns">
    <ul class="breadcrumb">
        <li class="heading g-mr-10"><?= __('Actions') ?></li>
        <li class="g-mr-10">|</li>
        <li class="g-mr-10"><?= $this->Html->link(__('New Subscription Package'), ['action' => 'add']) ?></li>
        <li class="g-mr-10">|</li>
        <li class="g-mr-10"><?= $this->Html->link(__('List Subscriptions'), ['controller' => 'Subscriptions', 'action' => 'index']) ?></li>
    </ul>
</nav>
<h3 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30"><?= __('Subscription Packages') ?></h3>
<div class="faqs table-responsive g-mb-40">
    <table cellpadding="0" cellspacing="0" class="table table-bordered table-hover u-table--v3 g-color-black">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('price') ?></th>
            <th scope="col"><?= $this->Paginator->sort('earn_per_sms') ?></th>
            <th scope="col"><?= $this->Paginator->sort('status') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($subscriptionPackages as $subscriptionPackage): ?>
            <tr>
                <td><?= $this->Number->format($subscriptionPackage->id) ?></td>
                <td><?= h($subscriptionPackage->name) ?></td>
                <td><?= h($subscriptionPackage->price) ?></td>
                <td><?= h($subscriptionPackage->earn_per_sms) ?></td>
                <td>
                    <?= $this->element('Admin/status', [
                        'id' => $subscriptionPackage->id,
                        'status' => $subscriptionPackage->status,
                        'model' => 'SubscriptionPackages'
                    ]) ?>
                </td>
                <td><?= h($subscriptionPackage->created->nice()) ?></td>
                <?= $this->element('Admin/actions', ['id' => $subscriptionPackage->id]) ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->element('Admin/pagination') ?>

