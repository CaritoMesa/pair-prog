<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Rubrics Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rubrics'), ['controller' => 'Rubrics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rubric'), ['controller' => 'Rubrics', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rubricsItems form large-9 medium-8 columns content">
    <?= $this->Form->create($rubricsItem) ?>
    <fieldset>
        <legend><?= __('Add Rubrics Item') ?></legend>
        <?php
            echo $this->Form->input('description');
            echo $this->Form->input('weight');
            echo $this->Form->input('rubric_id', ['options' => $rubrics, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
