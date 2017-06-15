<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2>Consumidores de LTI
                <?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span> New'), ['controller' => 'OAuthConsumers', 'action' => 'add'], ['class' => 'btn btn-primary pull-right', 'escape' => false, 'data-toggle' => 'modal', 'data-target' => '#modalOther']) ?> 
            </h2>
        </div>
        <div class="table-responsive">
            <table class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('Llaves') ?></th>
                        <th><?= $this->Paginator->sort('Claves') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($oAuthConsumers as $oAuthConsumer): ?>
                    <tr>
                        <td><?= h($oAuthConsumer->key) ?></td>
                        <td><?= h($oAuthConsumer->secret) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Editar'), ['controller' => 'OAuthConsumers', 'action' => 'edit', $oAuthConsumer->id], ['class' => 'btn btn-sm btn-primary', 'data-toggle' => 'modal', 'data-target' => '#modalOther']) ?> 
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $oAuthConsumer->id], ['confirm' => __('Are you sure you want to delete {0}?', $oAuthConsumer->key), 'class' => 'btn btn-sm btn-danger']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalOther" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->