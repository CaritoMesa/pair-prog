<div class="modal-header">   
    <h4 class="modal-title">Nuevo Criterio para Rúbrica</h4>
</div>
<div class="modal-body">
    <?= $this->Form->create($rubricCriteria) ?>
    <fieldset>
    <?php
        echo $this->Form->input('description');
        echo $rubricCriteria->rubric_id;
    ?>
    </fieldset>
    <?= $this->Html->link('Cancelar', ['controller' => 'Activities', 'action' => 'view', $actv_id], ['class' => 'btn btn-default']) ?>
    <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
