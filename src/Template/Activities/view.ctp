<nav>
    <ul class="nav nav-pills">
        <li><?= $this->Html->link(__('Rubric'), ['controller' => 'Rubrics', 'action' => 'view', $activity->rubric->id]) ?></li>
        <li><?= $this->Html->link(__('Groups'), ['controller' => 'Groups', 'action' => 'view', $activity->id]) ?></li>
        <li><?= $this->Html->link(__('Entregas'), ['controller' => 'Submissions', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="activities view large-9 medium-8 columns content">
    <h3><?= h($activity->name) ?></h3>
    <table class="table">
        <tr>
            <th><?= __('Use Groups') ?></th>
            <td><?php if ($activity->use_groups == 1):?>
                    Si
                <?php else:?>
                    No
                <?php endif; ?>
            </td> 
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <blockquote>
            <?= $this->Text->autoParagraph(h($activity->description)); ?>    
        </blockquote>
    </div>
    <div class="related">
        <h4><?= __('Related Submissions') ?></h4>
        <?php if (!empty($activity->submissions)): ?>
        <table class="table" cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('User') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Calificación') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($activity->submissions as $submissions): ?>
            <tr>
                <td><?= h($submissions->user_id) ?></td>
                <td><?= h($submissions->created) ?></td>
                <td><?= h($submissions->modified) ?></td>
                <td></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Submissions', 'action' => 'view', $submissions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Submissions', 'action' => 'edit', $submissions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Submissions', 'action' => 'delete', $submissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $submissions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
