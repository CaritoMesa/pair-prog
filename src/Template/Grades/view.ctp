<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Grade'), ['action' => 'edit', $grade->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Grade'), ['action' => 'delete', $grade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Grades'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grade'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Submissions'), ['controller' => 'Submissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Submission'), ['controller' => 'Submissions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rubric Criterias'), ['controller' => 'RubricCriterias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rubric Criteria'), ['controller' => 'RubricCriterias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="grades view large-9 medium-8 columns content">
    <h3><?= h($grade->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $grade->has('user') ? $this->Html->link($grade->user->first_name, ['controller' => 'Users', 'action' => 'view', $grade->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submission') ?></th>
            <td><?= $grade->has('submission') ? $this->Html->link($grade->submission->id, ['controller' => 'Submissions', 'action' => 'view', $grade->submission->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rubric Criteria') ?></th>
            <td><?= $grade->has('rubric_criteria') ? $this->Html->link($grade->rubric_criteria->id, ['controller' => 'RubricCriterias', 'action' => 'view', $grade->rubric_criteria->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($grade->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score') ?></th>
            <td><?= $this->Number->format($grade->score) ?></td>
        </tr>
    </table>
</div>
