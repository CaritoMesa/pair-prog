<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Assignment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Activities Groups'), ['controller' => 'ActivitiesGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Activities Group'), ['controller' => 'ActivitiesGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="assignments index large-9 medium-8 columns content">
    <h3><?= __('Assignments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('activities_group_id') ?></th>
                <th><?= $this->Paginator->sort('activity_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assignments as $assignment): ?>
            <tr>
                <td><?= $this->Number->format($assignment->id) ?></td>
                <td><?= h($assignment->created) ?></td>
                <td><?= h($assignment->modified) ?></td>
                <td><?= $assignment->has('activities_group') ? $this->Html->link($assignment->activities_group->name, ['controller' => 'ActivitiesGroups', 'action' => 'view', $assignment->activities_group->id]) : '' ?></td>
                <td><?= $assignment->has('activity') ? $this->Html->link($assignment->activity->name, ['controller' => 'Activities', 'action' => 'view', $assignment->activity->id]) : '' ?></td>
                <td><?= $assignment->has('user') ? $this->Html->link($assignment->user->id, ['controller' => 'Users', 'action' => 'view', $assignment->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $assignment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $assignment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $assignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignment->id)]) ?>
                    <?= $this->Html->link(__('LMS'), ['action' => 'submit', $assignment->id]) ?>
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