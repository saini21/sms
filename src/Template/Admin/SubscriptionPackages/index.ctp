<div class="g-bg-lightblue-v10-opacity-0_5 g-pa-20">
    <div class="row">
        <div class="col-xl-12">
            <h3>The feature is in progress, please wait few days ...</h3>
        </div>
    </div>
</div>
<!-- nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Subscription Package'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subscriptions'), ['controller' => 'Subscriptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subscription'), ['controller' => 'Subscriptions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subscriptionPackages index large-9 medium-8 columns content">
    <h3><?= __('Subscription Packages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('earn_per_sms') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
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
                <td><?= h($subscriptionPackage->status) ?></td>
                <td><?= h($subscriptionPackage->created) ?></td>
                <td><?= h($subscriptionPackage->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $subscriptionPackage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subscriptionPackage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subscriptionPackage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subscriptionPackage->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div -->
