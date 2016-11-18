<div class="activities view large-9 medium-8 columns content">
    <h3><?= h($activity->name) ?></h3>
    <table class="table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= h($activity->user->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Rubric') ?></th>
            <td><?= $activity->has('rubric') ? $this->Html->link($activity->rubric->name, ['controller' => 'Rubrics', 'action' => 'view', $activity->rubric->id]) : '' ?></td>
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
        <table class="table" cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Submission') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($activity->submissions as $submissions): ?>
            <tr>
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
