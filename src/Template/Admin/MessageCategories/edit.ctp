<nav class="large-3 medium-4 columns">
    <ul class="breadcrumb">
        <li class="heading g-mr-10"><?= __('Actions') ?></li>
        <li class="g-mr-10">|</li>
        <li class="g-mr-10"><?= $this->Html->link(__('List Message Categories'), ['action' => 'index']) ?></li>
        <li class="g-mr-10">|</li>
        <li class="g-mr-10"><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<h3 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30"><?= __('Edit Message Category') ?></h3>

<div class="row">
    <!-- left column -->
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <div class="messages form large-9 medium-8 columns content">
            <?= $this->Form->create($messageCategory) ?>
            <div class="form-group g-mb-30">
                <label class="g-mb-10"><?= __('Message Category') ?></label>
                <div class="g-pos-rel">
                    <?= $this->Form->control('category', ['label' => false, "class" => "form-control g-brd-gray-light-v3--focus g-py-10"]); ?>
                </div>
            </div>
            <div class="form-group g-mb-30">
                <div class="input-group-btn">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
