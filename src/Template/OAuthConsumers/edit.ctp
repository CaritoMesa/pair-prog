<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $oAuthConsumer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $oAuthConsumer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List O Auth Consumers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="oAuthConsumers form large-9 medium-8 columns content">
    <?= $this->Form->create($oAuthConsumer) ?>
    <fieldset>
        <legend><?= __('Edit O Auth Consumer') ?></legend>
        <?php
            echo $this->Form->input('key');
            echo $this->Form->input('secret');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
