<div class="rubrics index large-9 medium-8 columns content">
    <h2>
        <?= __('Rubrics') ?>
        <button type="button" class="btn btn-primary pull-right" escape="false" data-toggle="modal" data-target="#myModal">
        <span class="glyphicon glyphicon-plus"></span>
            <?=__('New Rubric')?>
        </button>
    </h2>
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
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rubrics as $rubric): ?>
            <tr>
                <td><?= $this->Number->format($rubric->id) ?></td>
                <td><?= h($rubric->name) ?></td>
                <td><?= h($rubric->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Rubrics', 'action' => 'view', $rubric->id], ['class' => 'btn btn-xs btn-info']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rubric->id], ['class' => 'btn btn-xs btn-primary']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rubric->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rubric->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
    </div>
</div>
