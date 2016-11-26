<div class="rubricLevels form large-9 medium-8 columns content">
    <?= $this->Form->create($rubricLevel) ?>
    <fieldset>
        <legend><?= __('Edit Rubric Level') ?></legend>
        <?php
            echo $this->Form->input('definition');
            echo $this->Form->input('score');
            echo $this->Form->input('modiefied', ['empty' => true]);
            echo $this->Form->input('rubric_criteria_id', ['options' => $rubricCriterias]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
