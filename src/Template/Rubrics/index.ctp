<div>
    <h1>
        <?= __('Rubrics') ?>
        <?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span> New'), ['controller' => 'Rubrics', 'action' => 'add'], ['class' => 'btn btn-primary pull-right', 'escape' => false, 'data-toggle' => 'modal', 'data-target' => '#modalOther']) ?> 
        
    </h1>
<!-- Modal -->
<div class="modal fade" id="modalOther" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div>
    <table class="table table-hover table-condensed">
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
                <td><?= $this->Html->link($rubric->name, ['action' => 'view', $rubric->id]) ?></td>
                <td><?= $this->Text->truncate($rubric->description, 60, ['ellipsis' => '...', 'exact' => false]) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rubric->id], ['class' => 'btn btn-sm btn-primary', 'escape' => false, 'data-toggle' => 'modal', 'data-target' => '#modalOther']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rubric->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rubric->name), 'class' => 'btn btn-sm btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
    </div>
</div>


