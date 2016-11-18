<div class="rubrics form large-9 medium-8 columns content">
    <?= $this->Form->create($rubric) ?>
    <fieldset>
        <legend><?= __('Edit Rubric') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <!-- Guardar cambios -->
    <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-sm btn-default']) ?>
    <?= $this->Form->button(__('Save'), ['class' => 'btn btn-sm btn-info']) ?>
    <?= $this->Form->end() ?>
</div>

