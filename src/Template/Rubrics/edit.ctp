<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rubric->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rubric->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Rubrics'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rubric Criterias'), ['controller' => 'RubricCriterias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rubrics Items'), ['controller' => 'RubricsItems', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="rubrics form large-9 medium-8 columns content">
    <?= $this->Form->create($rubric) ?>
    <fieldset>
        <legend><?= __('Edit Rubric') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
        ?>
    </fieldset>
</div>
<div class="rubricCriterias form large-9 medium-8 columns content">
    <?= $this->Form->create($rubricCriteria) ?>
    <fieldset>
        <legend><?= __('Add Rubric Criteria') ?></legend>
        <?php
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>