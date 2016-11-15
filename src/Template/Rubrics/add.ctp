<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Rubrics'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rubric Criterias'), ['controller' => 'RubricCriterias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rubrics Items'), ['controller' => 'RubricsItems', 'action' => 'index']) ?></li>
</nav>
<div class="rubrics form large-9 medium-8 columns content">
    <?= $this->Form->create($rubric) ?>
    <fieldset>
        <legend><?= __('Add Rubric') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
        ?>
        <table class="vertical-table">
        <tr>
            <td>
            <?php 
            echo $this->Form->input('rubric_criterias.description',['label' => 'Criteria']);
            ?>
                
            </td>
            <td><?php 
            echo $this->Form->input('rubric_levels.definition',['label' => 'Level']);
            ?>
            </td>
            <td><?php 
            echo $this->Form->input('rubric_levels.definition',['label' => 'Level']);
            ?>
            </td>
        </tr>
        <tr>
            <td>
            <?php 
            echo $this->Form->input('rubric_criterias.description',['label' => 'Criteria']);
            ?>
                
            </td>
            <td><?php 
            echo $this->Form->input('rubric_levels.definition',['label' => 'Level']);
            ?>
            </td>
            <td><?php 
            echo $this->Form->input('rubric_levels.definition',['label' => 'Level']);
            ?>
            </td>
        </tr>
        <tr>
            <td>
            <?php 
            echo $this->Form->input('rubric_criterias.description',['label' => 'Criteria']);
            ?>
                
            </td>
            <td><?php 
            echo $this->Form->input('rubric_levels.definition',['label' => 'Level']);
            ?>
            </td>
            <td><?php 
            echo $this->Form->input('rubric_levels.definition',['label' => 'Level']);
            ?>
            </td>
        </tr>
        </table>
        <?= $this->Form->button(__('Add Criteria')) ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
