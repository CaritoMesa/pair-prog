<div>
    <?= $this->Form->create($rubric) ?>
    <fieldset>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <button type="button" class="btn btn-default" data-dismiss="modal"><?= __('Volver') ?></button>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
 