<div class="modal-header">   
    <h4 class="modal-title">Nuevo Consumidor LTI</h4>
</div>
<div class="modal-body">
    <?= $this->Form->create($oAuthConsumer) ?>
    <fieldset>
    <?php
        echo $this->Form->input('key', ['label' => 'Llave']);
        echo $this->Form->input('secret', ['label' => 'Contraseña']);
    ?>
    </fieldset>
    <?= $this->Html->link('Cancelar', ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
