<div class="submissions view large-9 medium-8 columns content">
    <table class="table" class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($submission->id) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $submission->has('user') ? $this->Html->link($submission->user->first_name, ['controller' => 'Users', 'action' => 'view', $submission->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Activity') ?></th>
            <td><?= $submission->has('activity') ? $this->Html->link($submission->activity->name, ['controller' => 'Activities', 'action' => 'view', $submission->activity->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($submission->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($submission->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Submission') ?></h4>
        <?= $this->Text->autoParagraph(h($submission->submission)); ?>
    </div>
    <?= $this->Html->link(__('Grade'), ['controller' => 'Grades', 'action' => 'add', $submission->id]) ?>

    <div class="related">
        <h4><?= __('Grades') ?></h4>
        <?php if (!empty($submission->grades)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('id') ?></th>
                <th><?= __('achievement') ?></th>
                <th><?= __('created') ?></th>
                <th><?= __('modified') ?></th>
                <th><?= __('submission_id') ?></th>
                <th><?= __('rubrics_item_id') ?></th>
                <th><?= __('score') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($submission->grades as $grades): ?>
            <tr>
                <td><?= $this->Number->format($grades->id) ?></td>
                <td><?= h($grade->achievement) ?></td>
                <td><?= h($grade->created) ?></td>
                <td><?= h($grade->modified) ?></td>
                <td><?= $grade->has('submission') ? $this->Html->link($grade->submission->id, ['controller' => 'Submissions', 'action' => 'view', $grade->submission->id]) : '' ?></td>
                <td><?= $grade->has('rubrics_item') ? $this->Html->link($grade->rubrics_item->id, ['controller' => 'RubricsItems', 'action' => 'view', $grade->rubrics_item->id]) : '' ?></td>
                <td><?= $this->Number->format($grade->score) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $grade->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $grade->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $grade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id)]) ?>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
