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
    <dt>Fecha Primera Calificación</dt>
    <dd>
        <?= h($submission->created) ?>
    </dd>
    <br />
    <dt>Fecha Última Modificación</dt>
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
                <th scope="col"><?= __('Score') ?></th>
            </tr>
            <?php foreach ($grades as $grade): ?>
            <tr>
                <td><?= h($grade->user->first_name) ?> <?= h($grade->user->last_name) ?></td>
                <td><?= h($grade->rubric_criteria->description) ?></td>
                <td><?= h($grade->score) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <?= $this->Html->link('Volver', ['controller' => 'Activities', 'action' => 'view', $submission->activity_id], ['class' => 'btn btn-default']) ?>
</div>
