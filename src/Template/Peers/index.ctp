<?= $this->Paginator->numbers(['before' => ''< ' . __('previous')', 'after' => '']) ?><nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Peer'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="peers index large-9 medium-8 columns content">
    <h3><?= __('Peers') ?></h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peers as $peer): ?>
            <tr>
                <td><?= $this->Number->format($peer->id) ?></td>
                <td><?= h($peer->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $peer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $peer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $peer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peer->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers(['before' => ''< ' . __('previous')', 'after' => '']) ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
