<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['novalidate' => true]) ?>
    <fieldset>
        <legend><?= __('Nuevo Usuario') ?></legend>
        <?php
            echo $this->Form->input('first_name', ['label' => 'Nombres']);
            echo $this->Form->input('last_name', ['label' => 'Apellidos']);
            echo $this->Form->input('username', ['label' => 'Nombre de usuario']);
            echo $this->Form->input('password', ['type' => 'password', 'label' => 'Contraseña', 'value' => '']);
        ?>
    </fieldset>
    <a class="btn btn-default" href="/users/index" role="button">Cancel</a>
    
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>