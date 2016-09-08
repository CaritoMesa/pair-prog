<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
        <fieldset>
            <legend><?= __('Ingrese su usuario y contraseña') ?></legend>
            <?= $this->Form->input('username', ['label' => 'Nombre de usuario']) ?>
            <?= $this->Form->input('password', ['label' => 'Contraseña']) ?>
             
        </fieldset>
    <?= $this->Form->button(__('Ingresar')); ?>
    <?= $this->Form->end() ?>
</div>