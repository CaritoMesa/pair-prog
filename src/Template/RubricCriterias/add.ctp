<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= __('Add Rubric Criteria') ?></h4>
</div>
<div class="modal-body">
    <?= $this->Form->create($rubricCriteria) ?>
    <fieldset>
        <?php
            echo $this->Form->input('description');
            echo $rubricCriteria->rubric_id;
        ?>
    </fieldset>
    <?= $this->Html->link(__('Close'), ['controller' => 'Activities', 'action' => 'view', $actv_id], ['class' => 'btn btn-default']) ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
<div class="modal-footer">
</div>
