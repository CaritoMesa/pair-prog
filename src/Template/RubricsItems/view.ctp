<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Edit Rubrics Item'), ['action' => 'edit', $rubricsItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rubrics Item'), ['action' => 'delete', $rubricsItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rubricsItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rubrics Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rubrics Item'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rubricsItems view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th><?= __('Rubric') ?></th>
            <td><?= $rubricsItem->has('rubric') ? $this->Html->link($rubricsItem->rubric->name, ['controller' => 'Rubrics', 'action' => 'view', $rubricsItem->rubric->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Weight') ?></th>
            <td><?= $this->Number->format($rubricsItem->weight) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($rubricsItem->description)); ?>
    </div>
</div>
