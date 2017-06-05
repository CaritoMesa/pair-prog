<div class="well">
    <h3><?= h($submission->user->first_name) ?> <?= h($submission->user->last_name) ?></h3>
    <dt>Actividad</dt>
    <dd>
        <?= h($submission->activity->name) ?>
    </dd>
    <br />
    <dt>Calificación</dt>
    <dd>
        <?= h($submission->grade) ?>
    </dd>
    <br />
    <dt>Fecha Creación Registro</dt>
    <dd>
        <?= h($submission->created) ?>
    </dd>
    <br />
    <dt>Fecha Modificación Registro</dt>
    <dd>
        <?= h($submission->modified) ?>
    </dd>
    <br />
    <dt>Entrega</dt>
    <div class="row">
        <div class="thumbnail">
            <div class="caption">
                <pre class="brush: py">
                    <?= $this->Text->autoParagraph(h($submission->submission)); ?>
                </pre>
            </div>
        </div>
    </div>
    <br />
    <div class="related">
        <h4><?= __('Puntaje Obtenido') ?></h4>
        <?php if (!empty($grades)): ?>
        <table class="table  table-bordered table-hover">
            <tr>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col"><?= __('Criterio') ?></th>
                <th scope="col"><?= __('Level Id') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($grades as $grade): ?>
            <tr>
                <td><?= h($grade->user->first_name) ?> <?= h($grade->user->last_name) ?></td>
                <td><?= h($grade->rubric_criteria->description) ?></td>
                <td><?= h(nivel($grade->level_id)) ?></td>
                <td><?= h($grade->score) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Grades', 'action' => 'view', $grade->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Grades', 'action' => 'edit', $grade->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Grades', 'action' => 'delete', $grade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <?= $this->Html->link('Volver', ['controller' => 'Activities', 'action' => 'view', $submission->activity_id], ['class' => 'btn btn-default']) ?>
</div>
