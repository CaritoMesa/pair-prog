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
        <?php if (!empty($submission->grades)): ?>
        <table class="table  table-bordered table-hover">
            <tr>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col"><?= __('Submission Id') ?></th>
                <th scope="col"><?= __('Criteria Id') ?></th>
                <th scope="col"><?= __('Level Id') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($submission->grades as $grades): ?>
            <tr>
                <td><?= h($grades->users->first_name) ?></td>
                <td><?= h($grades->submission_id) ?></td>
                <td><?= h($grades->criteria_id) ?></td>
                <td><?= h($grades->level_id) ?></td>
                <td><?= h($grades->score) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Grades', 'action' => 'view', $grades->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Grades', 'action' => 'edit', $grades->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Grades', 'action' => 'delete', $grades->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grades->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <?= $this->Html->link('Volver', ['controller' => 'Activities', 'action' => 'view', $submission->activity_id], ['class' => 'btn btn-default']) ?>
</div>
