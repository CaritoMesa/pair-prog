<!-- Volver -->
<?= $this->Html->link(__('< Volver'), ['controller' => 'Rubrics', 'action' => 'index']) ?>
<!-- Rubrica -->
<h2><?= h($rubricCriteria->rubric->name) ?></h2>
<h4><?= __('Description') ?></h4>
<?= $this->Text->autoParagraph(h($rubricCriteria->rubric->description)); ?>

<!-- Rubrica -->    
<div class="rubricCriterias view large-9 medium-8 columns content">
    <table class="table">
        <tr>
            <?php foreach ($rubric_criterias as $rubricCriterias): ?>
            <th><?= $rubricCriteria->description ?></th>
            <?php endforeach; ?>


            <td><?= $rubricCriteria->has('rubric') ? $this->Html->link($rubricCriteria->rubric->name, ['controller' => 'Rubrics', 'action' => 'view', $rubricCriteria->rubric->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($rubricCriteria->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($rubricCriteria->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Rubric Levels') ?></h4>
        <?php if (!empty($rubricCriteria->rubric_levels)): ?>
        <table class="table" cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Definition') ?></th>
                <th><?= __('Score') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modiefied') ?></th>
                <th><?= __('Rubric Criteria Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rubricCriteria->rubric_levels as $rubricLevels): ?>
            <tr>
                <td><?= h($rubricLevels->id) ?></td>
                <td><?= h($rubricLevels->definition) ?></td>
                <td><?= h($rubricLevels->score) ?></td>
                <td><?= h($rubricLevels->created) ?></td>
                <td><?= h($rubricLevels->modiefied) ?></td>
                <td><?= h($rubricLevels->rubric_criteria_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RubricLevels', 'action' => 'view', $rubricLevels->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RubricLevels', 'action' => 'edit', $rubricLevels->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RubricLevels', 'action' => 'delete', $rubricLevels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rubricLevels->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
