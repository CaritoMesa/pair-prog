<div class="oAuthConsumers index large-9 medium-8 columns content">
    <h3><?= __('O Auth Consumers') ?></h3>
    <table class="table" cellpadding="0" cellspacing="0">
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
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $oAuthConsumer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $oAuthConsumer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $oAuthConsumer->id)]) ?>
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
