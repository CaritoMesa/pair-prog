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
                <th scope="col"><?= __('User') ?></th>
                <th scope="col"><?= __('Criteria Id') ?></th>
                <th scope="col"><?= __('Level Id') ?></th>
                <th scope="col"><?= __('Score') ?></th>
            </tr>
            <?php foreach ($grades as $grade): ?>
            <tr>
                <td><?= h($grade->user->first_name) ?> <?= h($grade->user->last_name) ?></td>
                <td><?= h($grade->criteria_id) ?></td>
                <td><?= h($grade->level_id) ?></td>
                <td><?= h($grade->score) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <?= $this->Html->link('Volver', ['controller' => 'Activities', 'action' => 'view', $submission->activity_id], ['class' => 'btn btn-default']) ?>
</div>
