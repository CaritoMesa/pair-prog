<div class="oAuthConsumers form large-9 medium-8 columns content">
    <?= $this->Form->create($oAuthConsumer) ?>
    <fieldset>
        <legend><?= __('Edit O Auth Consumer') ?></legend>
        <?php
            echo $this->Form->input('key');
            echo $this->Form->input('secret');
        ?>
    </fieldset>
     <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
