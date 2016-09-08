<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Activity'), ['action' => 'edit', $activity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Activity'), ['action' => 'delete', $activity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="activities view large-9 medium-8 columns content">
    <h3><?= h($activity->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $activity->has('user') ? $this->Html->link($activity->user->id, ['controller' => 'Users', 'action' => 'view', $activity->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Activities Group') ?></th>
            <td><?= $activity->has('activities_group') ? $this->Html->link($activity->activities_group->name, ['controller' => 'ActivitiesGroups', 'action' => 'view', $activity->activities_group->id]) : '' ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($activity->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Rubrics') ?></h4>
        <?php if (!empty($activity->rubrics)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Weight') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Activity Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($activity->rubrics as $rubrics): ?>
            <tr>
                <td><?= h($rubrics->id) ?></td>
                <td><?= h($rubrics->description) ?></td>
                <td><?= h($rubrics->weight) ?></td>
                <td><?= h($rubrics->created) ?></td>
                <td><?= h($rubrics->modified) ?></td>
                <td><?= h($rubrics->activity_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Rubrics', 'action' => 'view', $rubrics->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Rubrics', 'action' => 'edit', $rubrics->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rubrics', 'action' => 'delete', $rubrics->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rubrics->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
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
