<div class="activitiesGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($activitiesGroup) ?>
    <fieldset>
        <legend><?= __('Add Activities Group') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
