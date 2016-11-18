<!-- Volver -->
<?= $this->Html->link(__('< Volver'), ['controller' => 'Rubrics', 'action' => 'index']) ?>
<!-- Info rubrica -->
<div class="rubrics view large-9 medium-8 columns content">
    <h2><?= h($rubric->name) ?></h2>
    <table class="table table-condensed vertical-table">    
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($rubric->description) ?></td>
        </tr>
    </table>
<!-- Cirterios Rubrica -->   
    <div class="related">
        <h4><?= __('Related Rubric Criterias') ?></h4>
        <?php if (!empty($rubric->rubric_criterias)): ?>
        <table class="table table-bordered" cellpadding="0" cellspacing="0">
            <?php foreach ($rubric->rubric_criterias as $rubricCriterias): ?>
            <tr>
                <td><?= h($rubricCriterias->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RubricCriterias', 'action' => 'view', $rubricCriterias->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RubricCriterias', 'action' => 'edit', $rubricCriterias->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RubricCriterias', 'action' => 'delete', $rubricCriterias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rubricCriterias->id)]) ?>
                </td>
                <td>
                    <?= h($rubricCriterias->description)?>     
                    Nivel <br> pts
                </td>
                 <td>     
                    Nivel <br> pts
                </td>
                 <td>     
                    Nivel <br> pts
                </td>
                 <td>     
                    Nivel <br> pts
                </td> <td>     
                    Nivel <br> pts
                </td>
                <td>     
                    <?= $this->Html->link(__('New Rubric Level'), ['controller' => 'RubricLevels', 'action' => 'add', $rubricCriterias->id, ['class' => 'btn btn-sm btn-primary']]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
<?= $this->Html->link(__('New Rubric Criteria'), ['controller' => 'RubricCriterias', 'action' => 'add', $rubric->id, ['class' => 'btn btn-sm btn-primary']]) ?>