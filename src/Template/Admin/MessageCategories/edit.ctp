<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MessageCategory $messageCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $messageCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $messageCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Message Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="messageCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($messageCategory) ?>
    <fieldset>
        <legend><?= __('Edit Message Category') ?></legend>
        <?php
            echo $this->Form->control('category');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
