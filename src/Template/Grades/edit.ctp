<div class="modal-header">   
    <h4 class="modal-title">Aplicar Rúbrica</h4>
</div>
<div class="modal-body">
    <?= $this->Form->create($grade) ?>
    <fieldset>
        <div class="radio">
            <?php
                echo $this->Form->radio('level_id', $radio);
            ?>
        </div>   
    </fieldset>
    <?= $this->Html->link('Cancelar', ['controller' => 'Rubrics', 'action' => 'apply_rubric', $grade->submission_id], ['class' => 'btn btn-default']) ?>
    <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary pull-right']) ?>
    <?= $this->Form->end() ?>
</div>

