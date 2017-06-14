<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2>Grupos de Actividades
                <?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span> New'), ['controller' => 'Activities', 'action' => 'add'], ['class' => 'btn btn-primary pull-right', 'escape' => false]) ?>
            </h2>
        </div>
        <div class="table-responsive">
            <table class="table  table-bordered table-hover">
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
        </div>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
            </ul>
            <p><?= $this->Paginator->counter() ?></p>
        </div>
    </div>
</div>
