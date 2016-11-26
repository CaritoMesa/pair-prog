<div class="rubricCriterias index large-9 medium-8 columns content">
    <h3><?= __('Rubric Criterias') ?></h3>
    <table class="table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('rubric_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rubricCriterias as $rubricCriteria): ?>
            <tr>
                <td><?= $this->Number->format($rubricCriteria->id) ?></td>
                <td><?= $rubricCriteria->has('rubric') ? $this->Html->link($rubricCriteria->rubric->name, ['controller' => 'Rubrics', 'action' => 'view', $rubricCriteria->rubric->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rubricCriteria->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rubricCriteria->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rubricCriteria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rubricCriteria->id)]) ?>
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
