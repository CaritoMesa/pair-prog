<div class="well">
    <h3><?= h($submission->user->first_name) ?> <?= h($submission->user->last_name) ?></h3>
    <dt>Actividad</dt>
    <dd>
        <?= h($submission->activity->name) ?>
    </dd>
    <br />
    <dt>Puntaje Total</dt>
    <dd>
        <?= h($submission->score) ?>
    </dd>
    <br />
    <dt>Calificación</dt>
    <dd>
        <?= h($this->Number->precision($submission->grade, 1)) ?>
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
    <div class="related">
        <h4><?= __('Puntaje Obtenido') ?></h4>
        <?php if (!empty($grades)): ?>
        <table class="table  table-bordered table-hover">
            <tr>
                <th scope="col"><?= __('Usuario Calificador') ?></th>
                <th scope="col"><?= __('Criterio Calificado') ?></th>
                <th scope="col"><?= __('Puntaje Obtenido') ?></th>
                <th scope="col"><?= __('Descripción del Puntaje Obtenido') ?></th>      
            </tr>
            <?php foreach ($grades as $grade): ?>
            <tr>
                <td><?= h($grade->user->first_name) ?> <?= h($grade->user->last_name) ?></td>
                <td><?= h($grade->rubric_criteria->description) ?></td>
                <td><?= h($grade->score) ?></td>
                <td><?= h($grade->rubric_level->definition) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <?= $this->Html->link('Volver', ['controller' => 'Activities', 'action' => 'view', $submission->activity_id], ['class' => 'btn btn-default']) ?>
</div>
