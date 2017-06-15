<div class="modal-header">   
    <h4 class="modal-title">Editar Nivel de Rúbrica</h4>
</div>
<div class="modal-body">
    <?= $this->Form->create($rubricLevel) ?>
    <fieldset>
    <?php
        echo $this->Form->input('definition');
        echo $this->Form->input('score');
    ?>
    </fieldset>
    <?= $this->Html->link('Cancelar', ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    <button type="button" class="btn btn-default" data-dismiss="modal"><?= __('Cancelar') ?></button>
    <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
