<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2>Actividades
                <?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span> Nuevo'), ['controller' => 'Activities', 'action' => 'add'], ['class' => 'btn btn-primary pull-right', 'escape' => false, 'data-toggle' => 'modal', 'data-target' => '#modalOther']) ?>
            </h2>
        </div>
        <div class="table-responsive">
            <table class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('name', 'Nombre Actividad') ?></th>
                        <th><?= $this->Paginator->sort('user_id', 'Usuario') ?></th>
                        <th><?= $this->Paginator->sort('rubric_id', 'Rúbrica') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($activities as $activity): ?>
                    <tr>
                        <td><?= $this->Html->link(h($activity->name), ['action' => 'view', $activity->id]) ?></td>
                        <td><?= h($activity->user->first_name.' '.$activity->user->last_name) ?></td>
                        <td><?= $activity->has('rubric') ? $this->Html->link($activity->rubric->name, ['controller' => 'Rubrics', 'action' => 'view', $activity->rubric->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $activity->id], ['confirm' => __('¿Está seguro de eliminar la actividad {0}?', $activity->name), 'class' => 'btn btn-sm btn-danger']) ?>
                            <?= $this->Html->link(__('Vista LMS'), ['action' => 'submit', $activity->id], ['class' => 'btn btn-sm btn-info']) ?>
                            <?php if ($activity->use_groups == 1):?>
                                 <?= $this->Html->link(__('Groups'), ['controller' => 'Groups', 'action' => 'view', $activity->id], ['class' => 'btn btn-sm btn-success']) ?>
                            <?php endif; ?>
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
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalOther" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
