<div class="modal-header">   
    <h4 class="modal-title">Cambiar Contraseña</h4>
</div>
<div class="modal-body">
    <?= $this->Form->create($user, ['novalidate' => true]) ?>
    <fieldset>
        <?php
            echo $this->Form->input(__('password'), ['type' => 'password', 'value' => '']);
        ?>
    </fieldset>
    <?= $this->Html->link('Cancelar', ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
