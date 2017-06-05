<!-- Columns are always 50% wide, on mobile and desktop -->
<div class="row">
  <div class="col-xs-6">
    <div class="container-fluid">
      <div class="row">
        <div class="page-heading">            
            <h3>Entrega</h3>
        </div>
        <div class="row">
            <div class="thumbnail">
                <table class="table">
                    <tr>
                        <th><?= __('User') ?></th>
                        <td><?= $submission->user->first_name, ' ', $submission->user->last_name ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($submission->created) ?></td>     
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($submission->modified) ?></td>  
                    </tr>
                    <tr>
                        <th><?= __('Activity') ?></th>
                        <td><?= $submission->activity->description ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Calificación') ?></th>
                        <td>...</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="thumbnail">
              <div class="caption">
                <pre class="brush: py">
                    <?= $this->Text->autoParagraph(h($submission->submission)); ?>
                </pre>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xs-6">
    <div class="related">
        <h2><?= h($rubric->name) ?></h2>
        <br /><?= $this->Text->autoParagraph(h($rubric->description)); ?><br />...
    <?php if (!empty($rubric->rubric_criterias)): ?>
        <?php $id=0 ?>
        <table class="table table-bordered">
            <tr>
                <th>Item</th>
                <th>Puntaje</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($rubric->rubric_criterias as $rubricCriterias): ?>
            <tr>
                <td><?= h($rubricCriterias->description) ?></td>        
                <td>
                    <?php foreach ($grade as $valor): ?>
                        <?php if ($rubricCriterias->id == $valor->criteria_id): ?>
                            <?= h($valor->score) ?>
                </td>
                <td>        
                            <?= $this->Html->link(__('Evaluar'), ['controller' => 'Grades', 'action' => 'edit', $valor->id], ['class' => 'btn btn-primary pull-center', 'escape' => false, 'data-toggle' => 'modal', 'data-target' => '#modalOther']) ?>
                
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <?= $this->Html->link(__('Cancel'), ['controller' => 'Activities', 'action' => 'index'], ['class' => 'btn btn-primary']) ?>
</div>
<?php  
echo $this->Html->script('wysiwyg', ['block' => 'scriptBottom']);
echo $this->fetch('scriptBottom');
?>
<!-- Modal -->
<div class="modal fade" id="modalOther" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  </div>
</div>