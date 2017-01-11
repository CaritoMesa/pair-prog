<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= __('Edit Rubric') ?></h4>
</div>
<div class="modal-body">
    <?= $this->Form->create($rubric) ?>
    <fieldset>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <button type="button" class="btn btn-default" data-dismiss="modal"><?= __('Close') ?></button>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
<div class="modal-footer">
</div>
