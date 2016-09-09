<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rubric'), ['action' => 'edit', $rubric->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rubric'), ['action' => 'delete', $rubric->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rubric->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rubrics'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rubric'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Grades'), ['controller' => 'Grades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grade'), ['controller' => 'Grades', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rubrics Items'), ['controller' => 'RubricsItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rubrics Item'), ['controller' => 'RubricsItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rubrics view large-9 medium-8 columns content">
    <h3><?= h($rubric->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($rubric->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($rubric->id) ?></td>
        </tr>
        <tr>
            <th><?= __('User Id') ?></th>
            <td><?= $this->Number->format($rubric->user_id) ?></td>
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
        <h4><?= __('Related Activities') ?></h4>
        <?php if (!empty($rubric->activities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Activities Group Id') ?></th>
                <th><?= __('Rubric Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rubric->activities as $activities): ?>
            <tr>
                <td><?= h($activities->id) ?></td>
                <td><?= h($activities->name) ?></td>
                <td><?= h($activities->description) ?></td>
                <td><?= h($activities->created) ?></td>
                <td><?= h($activities->modified) ?></td>
                <td><?= h($activities->user_id) ?></td>
                <td><?= h($activities->activities_group_id) ?></td>
                <td><?= h($activities->rubric_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Activities', 'action' => 'view', $activities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Activities', 'action' => 'edit', $activities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Activities', 'action' => 'delete', $activities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
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
                <th><?= __('Rubric Id') ?></th>
                <th><?= __('Rubrics Item Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rubric->grades as $grades): ?>
            <tr>
                <td><?= h($grades->id) ?></td>
                <td><?= h($grades->achievement) ?></td>
                <td><?= h($grades->created) ?></td>
                <td><?= h($grades->modified) ?></td>
                <td><?= h($grades->submission_id) ?></td>
                <td><?= h($grades->rubric_id) ?></td>
                <td><?= h($grades->rubrics_item_id) ?></td>
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
    <div class="related">
        <h4><?= __('Related Rubrics Items') ?></h4>
        <?php if (!empty($rubric->rubrics_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Weight') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Rubric Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rubric->rubrics_items as $rubricsItems): ?>
            <tr>
                <td><?= h($rubricsItems->id) ?></td>
                <td><?= h($rubricsItems->description) ?></td>
                <td><?= h($rubricsItems->weight) ?></td>
                <td><?= h($rubricsItems->created) ?></td>
                <td><?= h($rubricsItems->modified) ?></td>
                <td><?= h($rubricsItems->rubric_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RubricsItems', 'action' => 'view', $rubricsItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RubricsItems', 'action' => 'edit', $rubricsItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RubricsItems', 'action' => 'delete', $rubricsItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rubricsItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
