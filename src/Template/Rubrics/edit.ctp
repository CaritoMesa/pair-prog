<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rubric->id],
                ['confirm' => __('Are you sure you want to delete {0}?', $rubric->name)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Activities Groups'), ['controller' => 'ActivitiesGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Submissions'), ['controller' => 'Submissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Rubrics'), ['controller' => 'Rubrics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Grades'), ['controller' => 'Grades', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="rubrics form large-9 medium-8 columns content">
    <?= $this->Form->create($rubric) ?>
    <fieldset>
        <legend><?= __('Edit Rubric') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
