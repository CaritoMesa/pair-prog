<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rubric Level'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rubric Criterias'), ['controller' => 'RubricCriterias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rubric Criteria'), ['controller' => 'RubricCriterias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rubricLevels index large-9 medium-8 columns content">
    <h3><?= __('Rubric Levels') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('score') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modiefied') ?></th>
                <th><?= $this->Paginator->sort('rubric_criteria_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rubricLevels as $rubricLevel): ?>
            <tr>
                <td><?= $this->Number->format($rubricLevel->id) ?></td>
                <td><?= $this->Number->format($rubricLevel->score) ?></td>
                <td><?= h($rubricLevel->created) ?></td>
                <td><?= h($rubricLevel->modiefied) ?></td>
                <td><?= $rubricLevel->has('rubric_criteria') ? $this->Html->link($rubricLevel->rubric_criteria->id, ['controller' => 'RubricCriterias', 'action' => 'view', $rubricLevel->rubric_criteria->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rubricLevel->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rubricLevel->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rubricLevel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rubricLevel->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
