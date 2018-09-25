<nav class="large-3 medium-4 columns">
    <ul class="breadcrumb">
        <li class="heading g-mr-10"><?= __('Actions') ?></li>
        <li class="g-mr-10">|</li>
        <li class="g-mr-10"><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $faq->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $faq->id)]
            )
        ?></li>
        <li class="g-mr-10">|</li>
        <li class="g-mr-10"><?= $this->Html->link(__('List Faqs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<h3 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30"><?= __('Edit FAQ') ?></h3>
<div class="row">
    <!-- left column -->
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <?= $this->Form->create($faq) ?>
        <div class="form-group g-mb-30">
            <label class="g-mb-10"><?= __('Question') ?></label>
            <div class="g-pos-rel">
                <?= $this->Form->control('question', ['label' => false, "class" => "form-control g-brd-gray-light-v3--focus g-py-10"]); ?>
            </div>
        </div>
        
        <div class="form-group g-mb-30">
            <label class="g-mb-10"><?= __('Answer') ?></label>
            <div class="g-pos-rel">
                <?= $this->Form->control('answer', ['label' => false, "class" => "form-control g-brd-gray-light-v3--focus g-py-10"]); ?>
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

