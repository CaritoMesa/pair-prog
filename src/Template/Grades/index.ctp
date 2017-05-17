<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Grade'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Submissions'), ['controller' => 'Submissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Submission'), ['controller' => 'Submissions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rubric Criterias'), ['controller' => 'RubricCriterias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rubric Criteria'), ['controller' => 'RubricCriterias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="grades index large-9 medium-8 columns content">
    <h3><?= __('Grades') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('submission_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('criteria_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($grades as $grade): ?>
            <tr>
                <td><?= $this->Number->format($grade->id) ?></td>
                <td><?= $grade->has('user') ? $this->Html->link($grade->user->first_name, ['controller' => 'Users', 'action' => 'view', $grade->user->id]) : '' ?></td>
                <td><?= $grade->has('submission') ? $this->Html->link($grade->submission->id, ['controller' => 'Submissions', 'action' => 'view', $grade->submission->id]) : '' ?></td>
                <td><?= $grade->has('rubric_criteria') ? $this->Html->link($grade->rubric_criteria->id, ['controller' => 'RubricCriterias', 'action' => 'view', $grade->rubric_criteria->id]) : '' ?></td>
                <td><?= $this->Number->format($grade->score) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $grade->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $grade->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $grade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
