<div class="modal-header">Crear Grupo de Actividades</h4>
</div>
<div class="modal-body">
    <?= $this->Form->create($activitiesGroup) ?>
    <fieldset>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary pull-right']) ?>
    <?= $this->Form->end() ?>
    <br />
</div>