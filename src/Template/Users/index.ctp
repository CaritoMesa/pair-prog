<div class="users index large-9 medium-8 columns content">
    <h1><?= __('Users') ?>
        <?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span> New'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'btn btn-primary pull-right', 'escape' => false]) ?>
    </h1>
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort(__('username')) ?></th>
                <th><?= $this->Paginator->sort(__('first_name')) ?></th>
                <th><?= $this->Paginator->sort(__('last_name')) ?></th>
                <th><?= $this->Paginator->sort(__('lti_user_id')) ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Html->link($user->username, ['action' => 'view', $user->id])?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->last_name) ?></td>
                <td><?= h($user->lti_user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete {0} {1}?', $user->first_name, $user->last_name), 'class' => 'btn btn-sm btn-danger']) ?>
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
    </div>
</div>
