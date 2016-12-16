<div class="activities index large-9 medium-8 columns content">
    <h3><?= __('Activities') ?></h3>
    <table class="table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('rubric_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activities as $activity): ?>
            <tr>
                <td><?= $this->Html->link(h($activity->name), ['action' => 'view', $activity->id]) ?></td>
                <td><?= $activity->has('user') ? $this->Html->link($activity->user->first_name, ['controller' => 'Users', 'action' => 'view', $activity->user->id]) : '' ?></td>
                <td><?= $activity->has('rubric') ? $this->Html->link($activity->rubric->name, ['controller' => 'Rubrics', 'action' => 'view', $activity->rubric->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $activity->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $activity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id)]) ?>
                    <?= $this->Html->link(__('LMS'), ['action' => 'submit', $activity->id]) ?>
                    <?= $this->Html->link(__('Groups'), ['controller' => 'Groups', 'action' => 'view', $activity->id]) ?>
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
    </div>
</div>
