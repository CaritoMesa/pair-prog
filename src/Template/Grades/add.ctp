<div class="grades form large-9 medium-8 columns content">
    <?= $this->Form->create($grade) ?>
    <fieldset>
        <legend><?= __('Add Grade') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('submission_id', ['options' => $submissions]);
            echo $this->Form->input('criteria_id', ['options' => $rubricCriterias]);
            echo $this->Form->input('score');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
