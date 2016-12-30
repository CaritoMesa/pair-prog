<div class="oAuthConsumers index large-9 medium-8 columns content">
    <h1>
        <?= __('O Auth Consumers') ?>
        <?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span> New'), ['controller' => 'OAuthConsumers', 'action' => 'add'], ['class' => 'btn btn-primary pull-right', 'escape' => false]) ?>
    </h1>
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('key') ?></th>
                <th><?= $this->Paginator->sort('secret') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($oAuthConsumers as $oAuthConsumer): ?>
            <tr>
                <td><?= $this->Number->format($oAuthConsumer->id) ?></td>
                <td><?= h($oAuthConsumer->key) ?></td>
                <td><?= h($oAuthConsumer->secret) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $oAuthConsumer->id], ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $oAuthConsumer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $oAuthConsumer->key), 'class' => 'btn btn-sm btn-danger']) ?>
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
