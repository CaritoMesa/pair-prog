<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('¿Seguro que quiere eliminar {0}?', $user->name)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Listado de Usuarios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['novalidate' => true]) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('first_name', ['label' => 'Nombres']);
            echo $this->Form->input('last_name');
            echo $this->Form->input('lti_user_id', ['type' => 'text']);
            echo $this->Form->input('username');
            echo $this->Form->input('password', ['type' => 'password', 'value' => '']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
