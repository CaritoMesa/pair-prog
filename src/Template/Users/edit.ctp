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
