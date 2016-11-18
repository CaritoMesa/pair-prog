<div class="rubricCriterias form large-9 medium-8 columns content">
    
    <?= $this->Form->create($rubricCriteria) ?>
    <fieldset>
        <legend><?= __('Add Rubric Criteria') ?></legend>
        <?php
            echo $this->Form->input('description');
            echo $this->Form->input('rubric_id', ['options' => $rubrics]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
