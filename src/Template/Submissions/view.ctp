<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Grades'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
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
        <tr>
            <th><?= __('Calificación') ?></th>
            <td>14</td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Submission') ?></h4>
        <pre class="brush: py">
        <?= $this->Text->autoParagraph(h($submission->submission)); ?>
        </pre>
    </div>
    <?= $this->Html->link(__('Apply Rubric'), ['controller' => 'Rubrics', 'action' => 'applyRubric', $submission->activity->rubric_id], ['class' => 'btn btn-sm btn-primary']) ?>
    <div class="related">
        <h4><?= __('Detalle Calificación') ?></h4>
        <?php if (!empty($submission->grades)): ?>
        <table class="table">
            <tr>
                <th><?= __('id') ?></th>
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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>7</td>
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
