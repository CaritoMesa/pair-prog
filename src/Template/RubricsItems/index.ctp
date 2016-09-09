<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rubrics Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rubrics'), ['controller' => 'Rubrics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rubric'), ['controller' => 'Rubrics', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rubricsItems index large-9 medium-8 columns content">
    <h3><?= __('Rubrics Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('weight') ?></th>
                <th><?= $this->Paginator->sort('rubric_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rubricsItems as $rubricsItem): ?>
            <tr>
                <td><?= h($rubricsItem->description) ?></td>
                <td><?= $this->Number->format($rubricsItem->weight) ?></td>
                <td><?= $rubricsItem->has('rubric') ? $this->Html->link($rubricsItem->rubric->id, ['controller' => 'Rubrics', 'action' => 'view', $rubricsItem->rubric->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rubricsItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rubricsItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rubricsItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rubricsItem->id)]) ?>
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
