<?php
$aproveStatuses = ['Unaproved', 'Aproved', 'Rejected',];

$aproveClasses = ['g-bg-lightblue-v4', 'g-bg-teal-v2', 'g-bg-primary',];

$name = "";
if (!empty($activities)) {
    $user = $activities->first()['user'];
    $name = " - " . $user['first_name'] . " " . $user['last_name'];
}
?>
<h3 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30">
    <?= __('Activities') ?>  <?= $name ?>
    <a href="<?= $this->Url->build(['controller' => 'SentMessages', 'action' => 'findDuplicates', $userId]); ?>" class="btn btn-primary pull-right"> Find Duplicate</a>

</a>
</h3>

<div class="faqs table-responsive g-mb-40">
    <table cellpadding="0" cellspacing="0" class="table table-bordered table-hover u-table--v3 g-color-black">
        <tr>
            <th scope="col">Activity Type</th>
            <th scope="col">Activity Count</th>
            <th scope="col">Activity Earning/Penalty</th>
        </tr>
        <?php foreach ($activityStats as $activityStat){ ?>
            <tr>
                <th scope="col"><?= $activityStat['type'] ?></th>
                <th scope="col"><?= $activityStat['count'] ?></th>
                <th scope="col"><?= $activityStat['money'] ?></th>
            </tr>
        <?php } ?>
    </table>

<div class="faqs table-responsive g-mb-40">
    <table cellpadding="0" cellspacing="0" class="table table-bordered table-hover u-table--v3 g-color-black">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('message') ?></th>
            <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
            <th scope="col"><?= $this->Paginator->sort('is_duplicate') ?></th>
            <th scope="col"><?= $this->Paginator->sort('status') ?></th>
            <th scope="col"><?= $this->Paginator->sort('approve', "Approve Status") ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($activities as $activity): ?>
            <tr>
                <td><?= h($activity['message']) ?></td>
                <td><?= h($activity['mobile']) ?></td>
                <td>
                    <?php if($activity['is_duplicate']) { ?>
                    <a href="javascript:void(0);"
                       class="u-tags-v1 text-center g-width-110 g-brd-around  g-bg-orange g-font-weight-600 g-color-white g-rounded-50 g-py-4 g-px-15 ">Duplicate</a>
                       <?php } ?>
                </td>
                <td>
                    <?= $this->element('Admin/status', ['id' => $activity['id'], 'status' => $activity['status'], 'model' => 'SentMessages', 'inactiveText' => 'Unread', 'activeText' => 'Read',]) ?>
                </td>
                <td>
                    <div class="form-group u-select--v3 g-pos-rel g-brd-gray-light-v7 g-rounded-4 mb-0">
                        <?= $this->Form->control('approve_' . $activity['id'], ['options' => $aproveStatuses, 'label' => false, "class" => "u-select--v3-select u-sibling w-100 g-font-weight-600 g-color-white form-control approve_status " . $aproveClasses[$activity['approved']], 'default' => $activity['approved'], 'id' => 'approve_' . $activity['id']]); ?>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->element('Admin/pagination') ?>

<script>
    $(function () {

        $('.approve_status').on("change", function () {
            var _this = $(this);
            var id = (typeof _this.attr('id') != 'undefined') ? _this.attr('id').split('_')[1] : 0;
            var approved = _this.val();
            if (id != 0) {
                $.ajax({
                    url: SITE_URL + "/admin/sent_messages/approveMessage/",
                    type: "POST",
                    data: {id, approved},
                    dataType: "json",
                    success: function (response) {

                        if (response.code == 200) {
                            var aproveClasses = {
                                0: 'g-bg-lightblue-v4',
                                1: 'g-bg-teal-v2',
                                2: 'g-bg-primary',
                            };
                            _this.removeClass('g-bg-lightblue-v4 g-bg-teal-v2 g-bg-primary')
                            _this.addClass(aproveClasses[response.data.new_approved]);


                        } else {
                            $().showFlashMessage("error", response.message);
                        }
                    }
                });
            }
        });
    });
</script>
