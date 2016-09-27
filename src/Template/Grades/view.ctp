<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Grade'), ['action' => 'edit', $grade->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Grade'), ['action' => 'delete', $grade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Grades'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Submissions'), ['controller' => 'Submissions', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="grades view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th><?= __('Submission') ?></th>
            <td><?= $grade->has('submission') ? $this->Html->link($grade->submission->submission, ['controller' => 'Submissions', 'action' => 'view', $grade->submission->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Rubrics Item') ?></th>
            <td><?= $grade->has('rubrics_item') ? $this->Html->link($grade->rubrics_item->description, ['controller' => 'RubricsItems', 'action' => 'view', $grade->rubrics_item->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Achievement') ?></th>
            <td><?= $grade->achievement ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Score') ?></th>
            <td><?= $this->Number->format($grade->score) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($grade->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($grade->modified) ?></td>
        </tr>
    </table>
</div>
