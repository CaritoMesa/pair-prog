<!-- Button trigger modal -->
<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
  <?=__('New Rubric')?>
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?= __('Add Rubric') ?></h4>
      </div>
      <div class="modal-body">
        <?= $this->Form->create($rubric) ?>
        <?= $this->Flash->render() ?>
        <fieldset>
            <?php
                echo $this->Form->input('name');
                echo $this->Form->input('description');
            ?>
        </fieldset>
      </div>
      <div class="modal-footer">
        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary pull-right']) ?>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>


