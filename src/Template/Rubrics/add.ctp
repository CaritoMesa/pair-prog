<div class="modal-header">   
    <h4 class="modal-title">Nueva Rúbrica</h4>
</div>
<div class="modal-body">
    <?= $this->Form->create($rubric) ?>
    <fieldset>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Html->link('Cancelar', ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
 