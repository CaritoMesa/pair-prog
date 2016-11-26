<div class="rubricLevels form large-9 medium-8 columns content">
    <?= $this->Form->create($rubricLevel) ?>
    <fieldset>
        <legend><?= __('Add Rubric Level') ?></legend>
        <?php
            echo $this->Form->input('definition');
            echo $this->Form->input('score');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
