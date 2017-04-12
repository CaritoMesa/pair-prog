<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= __('Add Rubric') ?></h4>
</div>
<div class="modal-body">
    <?= $this->Form->create($grade) ?>
    <fieldset>
        <?php
            echo $this->Form->radio('score', $score);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<div class="modal-footer">
</div>