<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rubric'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rubric Criterias'), ['controller' => 'RubricCriterias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rubric Criteria'), ['controller' => 'RubricCriterias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rubrics Items'), ['controller' => 'RubricsItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rubrics Item'), ['controller' => 'RubricsItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rubrics index large-9 medium-8 columns content">
    <h3><?= __('Rubrics') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rubrics as $rubric): ?>
            <tr>
                <td><?= $this->Number->format($rubric->id) ?></td>
                <td><?= h($rubric->name) ?></td>
                <td><?= h($rubric->created) ?></td>
                <td><?= h($rubric->modified) ?></td>
                <td><?= $rubric->has('user') ? $this->Html->link($rubric->user->first_name, ['controller' => 'Users', 'action' => 'view', $rubric->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rubric->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rubric->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rubric->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rubric->id)]) ?>
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
