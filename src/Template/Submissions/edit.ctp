<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $submission->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $submission->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Submissions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="submissions form large-9 medium-8 columns content">
    <?= $this->Form->create($submission) ?>
    <fieldset>
        <legend><?= __('Edit Submission') ?></legend>
        <?php
            echo $this->Form->input('activity_id', ['options' => $activities]);
            echo $this->Form->input('submission');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
