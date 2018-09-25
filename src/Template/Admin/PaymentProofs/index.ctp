<nav class="large-3 medium-4 columns">
    <ul class="breadcrumb">
        <li class="heading g-mr-10"><?= __('Actions') ?></li>
        <li class="g-mr-10">|</li>
        <li class="g-mr-10"><?= $this->Html->link(__('New Payment Proof'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<h3 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30"><?= __('Payment Proofs') ?></h3>
<div class="faqs table-responsive g-mb-40">
    <table cellpadding="0" cellspacing="0" class="table table-bordered table-hover u-table--v3 g-color-black">
        <thead>
        <tr>
            <th scope="col"><?= "Image" ?></th>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('status') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($paymentProofs as $paymentProof): ?>
            <tr>
                <td><img src="<?= PAYMENT_PROOF_IMAGE_PATH . $paymentProof->proof_image ?>" alt="<?= $paymentProof->name ?>" width="120" /></td>
                <td><?= h($paymentProof->name) ?></td>
                <td>
                    <?= $this->element('Admin/status', [
                        'id' => $paymentProof->id,
                        'status' => $paymentProof->status,
                        'model' => 'PaymentProofs'
                    ]) ?>
                </td>
                <td><?= h($paymentProof->created->nice()) ?></td>
                <?= $this->element('Admin/actions', [
                    'id' => $paymentProof->id,
                    'showView' => false,
                    'showEdit' => false,
                ]) ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->element('Admin/pagination') ?>
