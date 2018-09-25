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
    <?= $this->Form->create($sentMessage) ?>
        <div class="form-group g-mb-30">
            <label class="g-mb-10"><?= __('Message') ?></label>
            <div class="g-pos-rel">
                <?= $this->Form->control('user_id', ['type'=>'hidden','label' => false, 'value'=>$authUser['id']]); ?>
                <?= $this->Form->control('message_group', ['type'=>'hidden','label' => false, 'value'=>$authUser['id']]); ?>
                <?= $this->Form->control('message', ['type'=>'textarea','label' => false, "class" => "form-control g-brd-gray-light-v3--focus g-py-10"]); ?>
            </div>
        </div>
        <div class="form-group g-mb-30">
            <label class="g-mb-10"><?= __('Mobile Number') ?></label>
            <div class="g-pos-rel">
                <?= $this->Form->control('mobile', ['label' => false, "class" => "form-control g-brd-gray-light-v3--focus g-py-10"]); ?>
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
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>
