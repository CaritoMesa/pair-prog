<div class="submissions form large-9 medium-8 columns content">
    <?= $this->Form->create($submission) ?>
    <fieldset>
        <legend><?= __('Add Submission') ?></legend>
        <?php
            echo $this->Form->input('activity_id', ['options' => $activities]);
            echo $this->Form->input('submission');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
