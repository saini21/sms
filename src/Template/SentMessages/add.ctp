<nav class="large-3 medium-4 columns">
    <ul class="breadcrumb">
        <li class="heading g-mr-10"><?= __('Actions') ?></li>
        <li class="g-mr-10">|</li>
        <li class="g-mr-10"><?= $this->Html->link(__('My Activities'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<h3 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30"><?= __('Send SMS to Earn') ?></h3>
<div class="row">
    <!-- left column -->
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <?= $this->Form->create($sentMessage, ['id' => 'sendMessageForm']) ?>
        <div class="form-group g-mb-30">
            <label class="g-mb-10"><?= __('Mobile Number') ?></label>
            <div class="g-pos-rel">
                <?= $this->Form->control('mobile', ['label' => false, "class" => "form-control g-brd-gray-light-v3--focus g-py-10"]); ?>
            </div>
        </div>
        <div class="form-group g-mb-30">
            <label class="g-mb-10"><?= __('Message') ?></label>
            <div class="g-pos-rel">
                <?= $this->Form->control('user_id', ['type' => 'hidden', 'label' => false, 'value' => $authUser['id']]); ?>
                <?= $this->Form->control('message_group', ['type' => 'hidden', 'label' => false, 'value' => $authUser['id']]); ?>
                <?= $this->Form->control('message', ['type' => 'textarea', 'label' => false, "class" => "form-control g-brd-gray-light-v3--focus g-py-10"]); ?>
            </div>
        </div>

        <?php /*
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('message');
            echo $this->Form->control('mobile');
            echo $this->Form->control('status');
            echo $this->Form->control('approved');
            echo $this->Form->control('message_group');
             */
        ?>
        <div class="form-group g-mb-30">
            <div class="input-group-btn">
                <?= $this->Form->button(__('Send Message'), ['class' => 'btn btn-primary']) ?>
                <label id="pleaseWaitMsg" style="display: none;">&nbsp;&nbsp;&nbsp; Please wait, sending ...</label>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
    <script>
        $(document).ready(function () {
            
            $("#sendMessageForm").validate({
                rules: {
                    message: {
                        required: true,
                    },
                    mobile: {
                        required: true,
                    }
                },
                messages: {
                    message: {
                        required: "Please enter message.",
                        
                    },
                    mobile: {
                        required: "Please enter mobile number.",
                    }
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: SITE_URL + "/sent-messages/send",
                        type: "POST",
                        data: $("#sendMessageForm").serialize(),
                        dataType: "json",
                        beforeSend: function () {
                            var rand = Math.floor(Math.random() * 10)
                            if (rand == 7 || rand == 5) {
                                $('#pleaseWaitMsg').html(" ");
                            } else {
                                $('#pleaseWaitMsg').html("&nbsp;&nbsp;&nbsp; Please wait, sending ...");
                            }
                            
                            $('#pleaseWaitMsg').show();
                        },
                        success: function (response) {
                            $('#message, #mobile').val("");
                            $('#pleaseWaitMsg').html("&nbsp;&nbsp;&nbsp; " + response.message);
                            setTimeout(function () {
                                $('#pleaseWaitMsg').fadeOut();
                            }, 2000);
                        }
                    });
                }
                
            });
            
        });
    </script>
