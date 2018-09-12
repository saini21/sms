<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentProof $paymentProof
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Payment Proof'), ['action' => 'edit', $paymentProof->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Payment Proof'), ['action' => 'delete', $paymentProof->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentProof->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Payment Proofs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment Proof'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="paymentProofs view large-9 medium-8 columns content">
    <h3><?= h($paymentProof->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($paymentProof->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Proof Image') ?></th>
            <td><?= h($paymentProof->proof_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($paymentProof->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($paymentProof->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($paymentProof->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $paymentProof->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
