<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Rubrics'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Grades'), ['controller' => 'Grades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Grade'), ['controller' => 'Grades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rubrics Items'), ['controller' => 'RubricsItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rubrics Item'), ['controller' => 'RubricsItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rubrics form large-9 medium-8 columns content">
    <?= $this->Form->create($rubric) ?>
    <fieldset>
        <legend><?= __('Add Rubric') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('user_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
