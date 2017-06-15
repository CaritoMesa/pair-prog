<div class="modal-header">   
    <h4 class="modal-title">Editar Actividad</h4>
</div>
<div class="modal-body">
    <?= $this->Form->create($activity) ?>
    <fieldset>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('use_groups', ['label' => '¿Utiliza grupos o parejas para su desarrollo?']);
            echo $this->Form->input('activities_group_id', ['label' => 'Actividad en Grupo', 'options' => $activitiesGroups, 'empty' => true]);
            echo $this->Form->input('rubric_id', ['options' => $rubrics, 'empty' => true]);
            echo $this->Form->input('grade_estudiantes', ['label' => 'Porcentaje que valdrá la evaluación que evalue su compañero de grupo (0 a 100)']);
            echo $this->Form->input('grade_max', ['label' => 'Nota máxima']);
            echo $this->Form->input('grade_min', ['label' => 'Nota mínima']);
            echo $this->Form->input('grade_aprobacion', ['label' => 'Nota aprobación']);
            echo $this->Form->input('exigencia', ['label' => 'Exigencia']);
            echo $this->Form->input('score_max', ['label' => 'Puntaje máximo']);
        ?>
    </fieldset>
    <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary pull-right']) ?>
    <?= $this->Form->end() ?>
    <br />
</div>