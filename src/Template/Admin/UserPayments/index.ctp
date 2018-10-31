<nav class="large-3 medium-4 columns">
    <ul class="breadcrumb">
        <li class="heading g-mr-10"><?= __('Actions') ?></li>
        <li class="g-mr-10">|</li>
        <li class="g-mr-10"><?= $this->Html->link(__('New User Payment'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<h3 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30"><?= __('User Payments') ?></h3>
<div class="faqs table-responsive g-mb-40">
    <table cellpadding="0" cellspacing="0" class="table table-bordered table-hover u-table--v3 g-color-black">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userPayments as $userPayment): ?>
            <tr>
                <td><?= $this->Number->format($userPayment->id) ?></td>
                <td><?= $userPayment->has('user') ? $this->Html->link($userPayment->user->id, ['controller' => 'Users', 'action' => 'view', $userPayment->user->id]) : '' ?></td>
                <td><?= $this->Number->format($userPayment->payment) ?></td>
                <td><?= h($userPayment->created) ?></td>
                <td><?= h($userPayment->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userPayment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userPayment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userPayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userPayment->id)]) ?>
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
</div>


