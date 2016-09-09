<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Activity'), ['action' => 'edit', $activity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Activity'), ['action' => 'delete', $activity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Activities Groups'), ['controller' => 'ActivitiesGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activities Group'), ['controller' => 'ActivitiesGroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rubrics'), ['controller' => 'Rubrics', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rubric'), ['controller' => 'Rubrics', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Submissions'), ['controller' => 'Submissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Submission'), ['controller' => 'Submissions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="activities view large-9 medium-8 columns content">
    <h3><?= h($activity->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($activity->name) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $activity->has('user') ? $this->Html->link($activity->user->id, ['controller' => 'Users', 'action' => 'view', $activity->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Activities Group') ?></th>
            <td><?= $activity->has('activities_group') ? $this->Html->link($activity->activities_group->name, ['controller' => 'ActivitiesGroups', 'action' => 'view', $activity->activities_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Rubric') ?></th>
            <td><?= $activity->has('rubric') ? $this->Html->link($activity->rubric->id, ['controller' => 'Rubrics', 'action' => 'view', $activity->rubric->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($activity->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($activity->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($activity->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($activity->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Submissions') ?></h4>
        <?php if (!empty($activity->submissions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Activity Id') ?></th>
                <th><?= __('Submission') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($activity->submissions as $submissions): ?>
            <tr>
                <td><?= h($submissions->id) ?></td>
                <td><?= h($submissions->activity_id) ?></td>
                <td><?= h($submissions->submission) ?></td>
                <td><?= h($submissions->created) ?></td>
                <td><?= h($submissions->modified) ?></td>
                <td><?= h($submissions->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Submissions', 'action' => 'view', $submissions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Submissions', 'action' => 'edit', $submissions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Submissions', 'action' => 'delete', $submissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $submissions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
