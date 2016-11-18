<div class="activitiesGroups index large-9 medium-8 columns content">
    <h3><?= __('Activities Groups') ?></h3>
    <table class="table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activitiesGroups as $activitiesGroup): ?>
            <tr>
                <td><?= $this->Html->link(__($activitiesGroup->name), ['action' => 'view', $activitiesGroup->id]) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $activitiesGroup->id]) ?>
                    <?= $this->Html->link(__('LMS'), ['action' => 'submit', $activitiesGroup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $activitiesGroup->id], ['confirm' => __('Are you sure you want to delete {0}?', $activitiesGroup->name)]) ?>
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
