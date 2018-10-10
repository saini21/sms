<?php
$approved = [
  'Unseen',
  'Approved',
  'Rejected'
];
?>
<nav class="large-3 medium-4 columns">
    <ul class="breadcrumb">
        <li class="heading g-mr-10"><?= __('Actions') ?></li>
        <li class="g-mr-10">|</li>
        <li class="g-mr-10"><?= $this->Html->link(__('Send Message'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<h3 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30"><?= __('My Activities') ?></h3>
<div class="faqs table-responsive g-mb-40">
    <table cellpadding="0" cellspacing="0" class="table table-bordered table-hover u-table--v3 g-color-black">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('message') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', 'Send At') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sentMessages as $sentMessage): ?>
            <tr>
                <td><?= h($sentMessage->message) ?></td>
                <td><?= h($sentMessage->mobile) ?></td>
                <td><?= ($sentMessage->status) ? "Read" : "Unread" ?></td>
                <td><?= $approved[$sentMessage->approved] ?></td>
                <td><?= h($sentMessage->created->nice()) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink('<i class=\'hs-admin-close\'></i> Delete', ['action' => 'delete', $sentMessage->id], ['confirm' => __('Are you sure you want to delete this activity?'), 'class'=>'btn btn-danger btn-sm', 'escape' => false]) ?>
                    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
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
