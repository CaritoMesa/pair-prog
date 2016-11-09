<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Activities Group'), ['action' => 'edit', $activitiesGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Activities Group'), ['action' => 'delete', $activitiesGroup->id], ['confirm' => __('Are you sure you want to delete {0}?', $activitiesGroup->name)]) ?> </li>
        <li><?= $this->Html->link(__('Activities Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="activitiesGroups view large-9 medium-8 columns content">
    <h3><?= h($activitiesGroup->name) ?></h3>
    <div class="related">
        <h4><?= __('Related Activities') ?></h4>
        <?php if (!empty($activitiesGroup->activities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($activitiesGroup->activities as $activities): ?>
            <tr>
                <td><?= $this->Html->link(__($activities->name), ['controller' => 'Activities', 'action' => 'view', $activities->id]) ?></td>
                <td><?= h($activities->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Activities', 'action' => 'edit', $activities->id]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <?php endif; ?>

    </div>
</div>
