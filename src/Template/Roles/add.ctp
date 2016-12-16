<div class="roles form large-9 medium-8 columns content">
    <?= $this->Form->create($role) ?>
    <fieldset>
        <legend><?= __('Add Role') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <br>
    <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default'])  ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
