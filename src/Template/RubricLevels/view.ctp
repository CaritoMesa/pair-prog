<div class="rubricLevels view large-9 medium-8 columns content">
    <h3><?= h($rubricLevel->id) ?></h3>
    <table class="table" class="vertical-table">
        <tr>
            <th><?= __('Rubric Criteria') ?></th>
            <td><?= $rubricLevel->has('rubric_criteria') ? $this->Html->link($rubricLevel->rubric_criteria->id, ['controller' => 'RubricCriterias', 'action' => 'view', $rubricLevel->rubric_criteria->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($rubricLevel->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Score') ?></th>
            <td><?= $this->Number->format($rubricLevel->score) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($rubricLevel->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modiefied') ?></th>
            <td><?= h($rubricLevel->modiefied) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Definition') ?></h4>
        <?= $this->Text->autoParagraph(h($rubricLevel->definition)); ?>
    </div>
</div>
