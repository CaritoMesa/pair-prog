<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit O Auth Consumer'), ['action' => 'edit', $oAuthConsumer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete O Auth Consumer'), ['action' => 'delete', $oAuthConsumer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $oAuthConsumer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List O Auth Consumers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New O Auth Consumer'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="oAuthConsumers view large-9 medium-8 columns content">
    <h3><?= h($oAuthConsumer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Key') ?></th>
            <td><?= h($oAuthConsumer->key) ?></td>
        </tr>
        <tr>
            <th><?= __('Secret') ?></th>
            <td><?= h($oAuthConsumer->secret) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($oAuthConsumer->id) ?></td>
        </tr>
    </table>
</div>
