<div class="activities form large-9 medium-8 columns content">
    <?= $this->Form->create($activity) ?>
    <fieldset>
        <legend><?= __('Add Activity') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('use_groups');
            echo $this->Form->input('activities_group_id', ['options' => $activitiesGroups, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn']) ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-lg btn-primary btn-block']) ?>
    <?= $this->Form->end() ?>
</div>
