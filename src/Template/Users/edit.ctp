<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['novalidate' => true]) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input(__('first_name'));
            echo $this->Form->input(__('last_name'));
            echo $this->Form->input('email');
            echo $this->Form->input(__('username'));
            echo $this->Form->input(__('password'));
        ?>
    </fieldset>
    <a class="btn btn-default" href="/users/index" role="button">Cancel</a>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
