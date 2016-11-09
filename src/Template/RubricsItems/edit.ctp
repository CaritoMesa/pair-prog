<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Rubrics'), ['controller' => 'Rubrics', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="rubricsItems form large-9 medium-8 columns content">
    <?= $this->Form->create($rubricsItem) ?>
    <fieldset>
        <legend><?= __('Edit Rubrics Item') ?></legend>
        <?php
            echo $this->Form->input('description');
            echo $this->Form->input('weight');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
