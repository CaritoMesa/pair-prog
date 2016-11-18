<div class="submissions form large-9 medium-8 columns content">
    <?= $this->Form->create($submission) ?>
    <fieldset>
        <legend><?= __('Edit Submission') ?></legend>
        <?php
            echo $this->Form->input('submission');
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('activity_id', ['options' => $activities]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
