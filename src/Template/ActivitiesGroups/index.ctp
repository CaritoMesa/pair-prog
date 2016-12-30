<div class="activitiesGroups index large-9 medium-8 columns content">
    <h1>
        <?= __('Activities Groups') ?>
        <?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span> New'), ['controller' => 'activitiesGroups', 'action' => 'add'], ['class' => 'btn btn-primary pull-right', 'escape' => false]) ?>
    </h1>
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activitiesGroups as $activitiesGroup): ?>
            <tr>
                <td><?= $this->Html->link($activitiesGroup->name, ['action' => 'view', $activitiesGroup->id]) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $activitiesGroup->id], ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $activitiesGroup->id], ['confirm' => __('Are you sure you want to delete {0}?', $activitiesGroup->name), 'class' => 'btn btn-sm btn-danger']) ?>
                    <?= $this->Html->link(__('LMS'), ['action' => 'submit', $activitiesGroup->id], ['class' => 'btn btn-sm btn-info']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
