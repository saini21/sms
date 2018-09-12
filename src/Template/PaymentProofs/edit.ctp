<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentProof $paymentProof
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $paymentProof->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $paymentProof->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Payment Proofs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="paymentProofs form large-9 medium-8 columns content">
    <?= $this->Form->create($paymentProof) ?>
    <fieldset>
        <legend><?= __('Edit Payment Proof') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('proof_image');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
