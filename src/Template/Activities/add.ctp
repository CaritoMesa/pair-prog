<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Activities Groups'), ['controller' => 'ActivitiesGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Activities Group'), ['controller' => 'ActivitiesGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rubrics'), ['controller' => 'Rubrics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rubric'), ['controller' => 'Rubrics', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Submissions'), ['controller' => 'Submissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Submission'), ['controller' => 'Submissions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="activities form large-9 medium-8 columns content">
    <?= $this->Form->create($activity) ?>
    <fieldset>
        <legend><?= __('Add Activity') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('activities_group_id', ['options' => $activitiesGroups, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
