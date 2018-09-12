<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentProof[]|\Cake\Collection\CollectionInterface $paymentProofs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Payment Proof'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="paymentProofs index large-9 medium-8 columns content">
    <h3><?= __('Payment Proofs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('proof_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paymentProofs as $paymentProof): ?>
            <tr>
                <td><?= $this->Number->format($paymentProof->id) ?></td>
                <td><?= h($paymentProof->name) ?></td>
                <td><?= h($paymentProof->proof_image) ?></td>
                <td><?= h($paymentProof->status) ?></td>
                <td><?= h($paymentProof->created) ?></td>
                <td><?= h($paymentProof->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $paymentProof->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $paymentProof->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $paymentProof->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentProof->id)]) ?>
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
