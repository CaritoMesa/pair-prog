<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= __('Add Rubric Level') ?></h4>
</div>
<div class="modal-body">
    <?= $this->Form->create($rubricLevel) ?>
    <fieldset>
        <?php
            echo $this->Form->input('definition');
            echo $this->Form->input('score');
        ?>
    </fieldset>
    <button type="button" class="btn btn-default" data-dismiss="modal"><?= __('Cerrar') ?></button>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
<div class="modal-footer">
</div>