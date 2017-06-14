<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2>Usuarios
                <?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span> New'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'btn btn-primary pull-right', 'escape' => false, 'data-toggle' => 'modal', 'data-target' => '#modalOther']) ?>
            </h2>
        </div>
        <div class="table-responsive">
            <table class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('first_name', 'Nombres') ?></th>
                        <th><?= $this->Paginator->sort('last_name', 'Apellidos') ?></th>
                        <th><?= $this->Paginator->sort('username', 'Nombre de Usuario') ?></th>
                        <th><?= $this->Paginator->sort('lti_user_id', 'Usuario LTI') ?></th>
                        <th><?= $this->Paginator->sort(__('email')) ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= h($user->first_name) ?></td>
                        <td><?= h($user->last_name) ?></td>
                        <td><?= h($user->username) ?></td>
                        <td><?= h($user->lti_user_id) ?></td>
                        <td><?= h($user->email) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-primary', 'data-toggle' => 'modal', 'data-target' => '#modalOther']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Está seguro de eliminar al usuario {0} {1}?', $user->first_name, $user->last_name), 'class' => 'btn btn-sm btn-danger']) ?>
                            <?= $this->Html->link(__('Cambiar contraseña'), ['action' => 'password', $user->id], ['class' => 'btn btn-sm btn-info', 'data-toggle' => 'modal', 'data-target' => '#modalOther']) ?>
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