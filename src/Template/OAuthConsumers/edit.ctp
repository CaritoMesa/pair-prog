<div class="oAuthConsumers form large-9 medium-8 columns content">
    <?= $this->Form->create($oAuthConsumer) ?>
    <fieldset>
        <legend><?= __('Edit O Auth Consumer') ?></legend>
        <?php
            echo $this->Form->input('key');
            echo $this->Form->input('secret');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
