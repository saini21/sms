<h3 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30"><?= __('Users and their activities') ?></h3>
<div class="faqs table-responsive g-mb-40">
    <table cellpadding="0" cellspacing="0" class="table table-bordered table-hover u-table--v3 g-color-black">
        <thead>
        <tr>
            <th scope="col"><?= __('profile_image') ?></th>
            <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('email') ?></th>
            <th scope="col"><?= $this->Paginator->sort('new_activity_count', 'New Activities') ?></th>
            <th scope="col"><?= $this->Paginator->sort('total_activity_count', 'Total Activities') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><img src="<?= PROFILE_IMAGE_PATH . $user->profile_image ?>" alt="<?= $user->first_name ?>" width="120" /></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->last_name) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->new_activity_count) ?></td>
                <td><?= h($user->total_activity_count) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<i class=\'hs-admin-check-box\'></i> Approve Activities'), ['action' => 'activities', $user->id], ['class'=>'btn u-btn-blue btn-sm', 'escape' => false]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->element('Admin/pagination') ?>
