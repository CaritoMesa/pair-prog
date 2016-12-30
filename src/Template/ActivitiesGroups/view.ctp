<div class="activitiesGroups view large-9 medium-8 columns content">
    <h3><?= h($activitiesGroup->name) ?></h3>
    <div class="related">
        <h4><?= __('Related Activities') ?></h4>
        <?php if (!empty($activitiesGroup->activities)): ?>
        <table class="table" cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($activitiesGroup->activities as $activities): ?>
            <tr>
                <td><?= $this->Html->link($activities->name, ['controller' => 'Activities', 'action' => 'view', $activities->id]) ?></td>
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
