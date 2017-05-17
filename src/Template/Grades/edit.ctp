<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
    <?= $this->Form->create($grade) ?>
    <fieldset>
        <div class="radio">
            <?php
                h($grade->id);
                echo $this->Form->radio('score', $radio);
            ?>
        </div>   
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

