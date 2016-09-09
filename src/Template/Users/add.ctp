<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Listado Usuarios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['novalidate' => true]) ?>
    <fieldset>
        <legend><?= __('Nuevo Usuario') ?></legend>
        <?php
            echo $this->Form->input('first_name', ['label' => 'Nombres']);
            echo $this->Form->input('last_name', ['label' => 'Apellidos']);
            echo $this->Form->input('lti_user_id', ['type' => 'text', 'label' => 'Usuario LTI']);
            echo $this->Form->input('username', ['label' => 'Nombre de usuario']);
            echo $this->Form->input('password', ['type' => 'password', 'label' => 'Contraseña', 'value' => '']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
