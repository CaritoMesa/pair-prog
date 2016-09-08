<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Activities Groups'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="activitiesGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($activitiesGroup) ?>
    <fieldset>
        <legend><?= __('Add Activities Group') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
