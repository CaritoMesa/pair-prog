<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Peer'), ['action' => 'edit', $peer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Peer'), ['action' => 'delete', $peer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Peers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Peer'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="peers view large-9 medium-8 columns content">
    <h3><?= h($peer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($peer->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($peer->id) ?></td>
        </tr>
    </table>
</div>
