<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rubricLevel->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rubricLevel->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rubric Levels'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rubric Criterias'), ['controller' => 'RubricCriterias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rubric Criteria'), ['controller' => 'RubricCriterias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rubricLevels form large-9 medium-8 columns content">
    <?= $this->Form->create($rubricLevel) ?>
    <fieldset>
        <legend><?= __('Edit Rubric Level') ?></legend>
        <?php
            echo $this->Form->input('definition');
            echo $this->Form->input('score');
            echo $this->Form->input('modiefied', ['empty' => true]);
            echo $this->Form->input('rubric_criteria_id', ['options' => $rubricCriterias]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
