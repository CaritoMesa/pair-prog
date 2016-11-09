<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rubric Level'), ['action' => 'edit', $rubricLevel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rubric Level'), ['action' => 'delete', $rubricLevel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rubricLevel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rubric Levels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rubric Level'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rubric Criterias'), ['controller' => 'RubricCriterias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rubric Criteria'), ['controller' => 'RubricCriterias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rubricLevels view large-9 medium-8 columns content">
    <h3><?= h($rubricLevel->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Rubric Criteria') ?></th>
            <td><?= $rubricLevel->has('rubric_criteria') ? $this->Html->link($rubricLevel->rubric_criteria->id, ['controller' => 'RubricCriterias', 'action' => 'view', $rubricLevel->rubric_criteria->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($rubricLevel->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Score') ?></th>
            <td><?= $this->Number->format($rubricLevel->score) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($rubricLevel->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modiefied') ?></th>
            <td><?= h($rubricLevel->modiefied) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Definition') ?></h4>
        <?= $this->Text->autoParagraph(h($rubricLevel->definition)); ?>
    </div>
</div>
