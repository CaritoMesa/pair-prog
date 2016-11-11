<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rubric'), ['action' => 'edit', $rubric->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rubric'), ['action' => 'delete', $rubric->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rubric->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rubrics'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rubric'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rubric Criterias'), ['controller' => 'RubricCriterias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rubric Criteria'), ['controller' => 'RubricCriterias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rubrics Items'), ['controller' => 'RubricsItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rubrics Item'), ['controller' => 'RubricsItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rubrics view large-9 medium-8 columns content">
    <h3><?= h($rubric->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($rubric->name) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $rubric->has('user') ? $this->Html->link($rubric->user->first_name, ['controller' => 'Users', 'action' => 'view', $rubric->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($rubric->id) ?></td>
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
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($rubric->description)); ?>
    </div>
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
        <h4><?= __('Related Rubric Criterias') ?></h4>
        <?php if (!empty($rubric->rubric_criterias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Rubric Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rubric->rubric_criterias as $rubricCriterias): ?>
            <tr>
                <td><?= h($rubricCriterias->id) ?></td>
                <td><?= h($rubricCriterias->description) ?></td>
                <td><?= h($rubricCriterias->created) ?></td>
                <td><?= h($rubricCriterias->modified) ?></td>
                <td><?= h($rubricCriterias->rubric_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RubricCriterias', 'action' => 'view', $rubricCriterias->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RubricCriterias', 'action' => 'edit', $rubricCriterias->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RubricCriterias', 'action' => 'delete', $rubricCriterias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rubricCriterias->id)]) ?>
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
