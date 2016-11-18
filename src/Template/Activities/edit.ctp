<div class="activities form large-9 medium-8 columns content">
    <?= $this->Form->create($activity) ?>
    <fieldset>
        <legend><?= __('Edit Activity') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('activities_group_id', ['options' => $activitiesGroups, 'empty' => true]);
            echo $this->Form->input('rubric_id', ['options' => $rubrics, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
