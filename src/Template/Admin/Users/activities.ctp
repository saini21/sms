<?php
$aproveStatuses = ['Unaproved', 'Aproved', 'Rejected',];

$aproveClasses = ['g-bg-lightblue-v4', 'g-bg-teal-v2', 'g-bg-primary',];

$name = " - " . $user->first_name . " " . $user->last_name;
?>
<h3 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30">
    <?= __('Earning Stats') ?>  <?= $name ?>
    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'activities', $user->id]); ?>"
       class="btn btn-info pull-right"> <b>Recalculate</b></a>
    </a>

</h3>

<div class="faqs table-responsive g-mb-40">
    <table cellpadding="0" cellspacing="0" class="table table-bordered table-hover u-table--v4 g-color-black">
        <tr>
            <th scope="col" class="text-center">Activity Type</th>
            <th scope="col" class="text-center">Activity Count</th>
            <th scope="col" class="text-center">Activity Earning/Penalty</th>
        </tr>
        <?php foreach ($activityStats as $activityStat) { ?>
            <tr>
                <td scope="col" class="text-center"><?= $activityStat['type'] ?></td>
                <td scope="col" class="text-center"><?= $activityStat['count'] ?></td>
                <td scope="col" class="text-center"><?= $activityStat['money'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
<div class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30" style="">
    <span style="float: left;"><?= __('Activities') ?></span>
    
    <div class="form-group  g-brd-gray-light-v7 g-rounded-4 mb-0"
         style="float: left; margin: 0 0 0 50px;">
        <?= $this->Form->control('change_status', [
            'options' => $aproveStatuses,
            'label' => false,
            "class" => "u-select--v3-select u-sibling   g-font-weight-600 form-control ",
            'id' => 'changeStatus',
            'empty' => 'Select Status',
            'style' => 'width:250px; float:left;'
        ]); ?>
    </div>
    
    <div class="form-group" style="float: left; margin: -10px 0 0 20px;">
        <button class="btn btn-danger btn-md" id="changeStatusBtn">Update Status</button>
    </div>
    
    <div style="float: left; color: red; margin: 10px 0 0 20px; font-size: 14px; display: none;" id="bulkError">
        Please select atleast one activity.
    </div>
    
    <a href="<?= $this->Url->build(['controller' => 'SentMessages', 'action' => 'findDuplicates', $user->id]); ?>"
       class="btn btn-primary pull-right"> <b>Find Duplicate</b></a>
    
    </a>
</div>


<div class="faqs table-responsive g-mb-40">
    <table cellpadding="0" cellspacing="0" class="table table-bordered table-hover u-table--v3 g-color-black">
        <thead>
        <tr>
            <th scope="col"><input type="checkbox" name="select_all" id="selectAll" onchange="checkAll(this)"></th>
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
                <td scope="col">
                    <?php if (!$activity['is_duplicate']) { ?>
                        <input type="checkbox" name="changeStatus[]" value="<?= $activity['id']; ?>"
                               class="select-box" onchange="allChecked()">
                    <?php } else { ?>
                        <i class="fa fa-times" style="color: #aaaaaa"></i>
                    <?php } ?>
                </td>
                <td><?= h($activity['message']) ?></td>
                <td><?= h($activity['mobile']) ?></td>
                <td>
                    <?php if ($activity['is_duplicate']) { ?>
                        <a href="javascript:void(0);"
                           class="u-tags-v1 text-center g-width-110 g-brd-around  g-bg-orange g-font-weight-600 g-color-white g-rounded-50 g-py-4 g-px-15 ">Duplicate</a>
                    <?php } ?>
                </td>
                <td>
                    <?= $this->element('Admin/status', ['id' => $activity['id'], 'status' => $activity['status'], 'model' => 'SentMessages', 'inactiveText' => 'Unread', 'activeText' => 'Read',]) ?>
                </td>
                <td>
                    <div class="form-group u-select--v3 g-pos-rel g-brd-gray-light-v7 g-rounded-4 mb-0">
                        <?= $this->Form->control('approve_' . $activity['id'], [
                            'options' => $aproveStatuses,
                            'label' => false,
                            "class" => "u-select--v3-select u-sibling w-100 g-font-weight-600 g-color-white form-control approve_status " . $aproveClasses[$activity['approved']],
                            'default' => $activity['approved'],
                            'id' => 'approve_' . $activity['id'],
                            'disabled' => $activity['is_duplicate'] ? true : false
                        ]); ?>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->element('Admin/pagination') ?>
<h3 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30">
    <?= __('Activities') ?>  <?= $name ?>
    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'activities', $user->id]); ?>"
       class="btn btn-info pull-right"> <b>Recalculate</b></a>
    </a>
</h3>
<br>
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
        
        $('#changeStatusBtn').click(function () {
            $('#bulkError').hide();
            var ids = [];
            
            $('.select-box').each(function () {
                if ($(this).is(':checked')) {
                    ids.push($(this).val());
                }
            });
            
            var approved = $('#changeStatus').val();
            
            if (ids.length > 0) {
                $.ajax({
                    url: SITE_URL + "/admin/sent_messages/approveMessages/",
                    type: "POST",
                    data: {ids, approved},
                    dataType: "json",
                    success: function (response) {
                        if (response.code == 200) {
                            window.location.reload();
                        } else {
                            $().showFlashMessage("error", response.message);
                        }
                    }
                });
            } else {
                $('#bulkError').fadeIn();
            }
        });
        
        
    });
    
    function checkAll(ele) {
        var checkboxes = document.getElementsByClassName('select-box');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = ele.checked;
        }
        
    }
    
    function allChecked() {
        var checkboxes = document.getElementsByClassName('select-box');
        var checkedBoxes = 0;
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                checkedBoxes = checkedBoxes + 1;
            }
        }
        
        var checkAll = document.getElementById('selectAll');
        
        if (checkedBoxes == checkboxes.length) {
            checkAll.checked = true;
        } else {
            checkAll.checked = false;
        }
    }
</script>
