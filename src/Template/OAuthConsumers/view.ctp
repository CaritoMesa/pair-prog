<div class="oAuthConsumers view large-9 medium-8 columns content">
    <h3><?= h($oAuthConsumer->id) ?></h3>
    <table class="table" class="vertical-table">
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
