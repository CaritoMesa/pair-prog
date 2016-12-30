<div class="submissions index large-9 medium-8 columns content">
    <h1><?= __('Submissions') ?>
    </h1>
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('activity_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($submissions as $submission): ?>
            <tr>
                <td><?= $this->Number->format($submission->id) ?></td>
                <td><?= $submission->has('user') ? $this->Html->link($submission->user->first_name, ['controller' => 'Users', 'action' => 'view', $submission->user->id]) : '' ?></td>
                <td><?= $submission->has('activity') ? $this->Html->link($submission->activity->name, ['controller' => 'Activities', 'action' => 'view', $submission->activity->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $submission->id], ['class' => 'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $submission->id], ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $submission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $submission->id), 'class' => 'btn btn-sm btn-danger']) ?>
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
