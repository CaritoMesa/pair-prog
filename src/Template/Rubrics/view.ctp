<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rubric'), ['action' => 'edit', $rubric->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rubric'), ['action' => 'delete', $rubric->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rubric->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rubrics'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rubric'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Rubrics Items'), ['controller' => 'RubricsItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rubrics Item'), ['controller' => 'RubricsItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rubrics view large-9 medium-8 columns content">
    <h3><?= h($rubric->name) ?></h3>
    <table class="vertical-table">
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
                <th><?= __('Name') ?></th>
                <th><?= __('Activities Group Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rubric->activities as $activities): ?>
            <tr>
                <td><?= h($activities->name) ?></td>
                <td><?= h($activities->activities_group_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Activities', 'action' => 'view', $activities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Activities', 'action' => 'edit', $activities->id]) ?>
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
                <th><?= __('Description') ?></th>
                <th><?= __('Weight') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rubric->rubrics_items as $rubricsItems): ?>
            <tr>
                <td><?= h($rubricsItems->description) ?></td>
                <td><?= h($rubricsItems->weight) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RubricsItems', 'action' => 'view', $rubricsItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RubricsItems', 'action' => 'edit', $rubricsItems->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
