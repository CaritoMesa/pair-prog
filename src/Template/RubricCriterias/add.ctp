<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Rubric Criterias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rubrics'), ['controller' => 'Rubrics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rubric'), ['controller' => 'Rubrics', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rubric Levels'), ['controller' => 'RubricLevels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rubric Level'), ['controller' => 'RubricLevels', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rubricCriterias form large-9 medium-8 columns content">
    <?= $this->Form->create($rubricCriteria) ?>
    <fieldset>
        <legend><?= __('Add Rubric Criteria') ?></legend>
        <?php
            echo $this->Form->input('description');
            echo $this->Form->input('rubric_id', ['options' => $rubrics]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
