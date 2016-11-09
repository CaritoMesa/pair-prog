<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rubric'), ['action' => 'edit', $rubric->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rubric'), ['action' => 'delete', $rubric->id], ['confirm' => __('Are you sure you want to delete {0}?', $rubric->name)]) ?> </li>
        <li><?= $this->Html->link(__('New Rubric'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Activities Groups'), ['controller' => 'ActivitiesGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Submissions'), ['controller' => 'Submissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Rubrics'), ['controller' => 'Rubrics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Grades'), ['controller' => 'Grades', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="rubrics view large-9 medium-8 columns content">
    <h3><?= h($rubric->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $rubric->has('user') ? $this->Html->link($rubric->user->first_name, ['controller' => 'Users', 'action' => 'view', $rubric->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($rubric->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($rubric->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Rubrics Items') ?></h4>
        <?php if (!empty($rubric->rubrics_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Description') ?></th>
                <th><?= __('Weight') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rubric->rubrics_items as $rubricsItems): ?>
            <tr>
                <td><?= h($rubricsItems->description) ?></td>
                <td><?= h($rubricsItems->weight) ?></td>
                <td><?= h($rubricsItems->created) ?></td>
                <td><?= h($rubricsItems->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RubricsItems', 'action' => 'edit', $rubricsItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RubricsItems', 'action' => 'delete', $rubricsItems->id], ['confirm' => __('Are you sure you want to delete: {0}?', $rubricsItems->description)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <?= $this->Html->link(__('Add Rubrics Item'), ['controller' => 'RubricsItems', 'action' => 'add', $rubric->id]) ?>
    </div>
    <div class="related">
        <h4><?= __('Related Grades') ?></h4>
        <?php if (!empty($rubric->grades)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Achievement') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Submission Id') ?></th>
                <th><?= __('Rubrics Item Id') ?></th>
                <th><?= __('Score') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rubric->grades as $grades): ?>
            <tr>
                <td><?= h($grades->id) ?></td>
                <td><?= h($grades->achievement) ?></td>
                <td><?= h($grades->created) ?></td>
                <td><?= h($grades->modified) ?></td>
                <td><?= h($grades->submission_id) ?></td>
                <td><?= h($grades->rubrics_item_id) ?></td>
                <td><?= h($grades->score) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Grades', 'action' => 'view', $grades->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Grades', 'action' => 'edit', $grades->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Grades', 'action' => 'delete', $grades->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grades->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
   
</div>
