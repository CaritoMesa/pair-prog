<div class="modal-header">   
    <h4 class="modal-title">Nuevo Usuario</h4>
</div>
<div class="modal-body">
    <?= $this->Form->create($user, ['novalidate' => true]) ?>
    <fieldset>
        <?php
            echo $this->Form->input(__('first_name'), ['label' => 'Nombres']);
            echo $this->Form->input(__('last_name'), ['label' => 'Apellidos']);
            echo $this->Form->input('email', ['label' => 'E-mail']);
            echo $this->Form->input(__('username'), ['label' => 'Nombre de Usuario']);
        ?>
    </fieldset>
    <?= $this->Html->link('Cancelar', ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
