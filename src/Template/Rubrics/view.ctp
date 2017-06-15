<div class="container-fluid">
  <!-- Info rubrica -->
  <div class="rubrics view large-9 medium-8 columns content">
      <h2><?= h($rubric->name) ?></h2>
      <blockquote>
        <?= $this->Text->autoParagraph(h($rubric->description)); ?>
      </blockquote>
      <?= $this->Html->link(__('Cancel'), ['controller' => 'Rubrics', 'action' => 'index'], ['class' => 'btn btn-default']) ?>
      <br>
  <!-- Modal -->
  <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- Cirterios Rubrica -->  
  <div class="related">
    <h4><?= __('Related Rubric Criterias') ?></h4>
    <?php if (!empty($rubric->rubric_criterias)): ?>
      <table class="table table-hover">
        <?php foreach ($criterias as $criteria): ?>
          <tr>
            <td class="active">
              <?= h($criteria->description) ?>
              <br>
              <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ', ['controller' => 'rubricCriterias', 'action' => 'edit', $criteria->id], ['class' => 'btn btn-sm btn-primary', 'escape' => false, 'data-toggle' => 'modal', 'data-target' => '#modal1']) ?>
              <?= $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> ', ['controller' => 'RubricCriterias', 'action' => 'delete', $criteria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $criteria->id),'class' => 'btn btn-sm btn-danger', 'escape' => false]) ?>
            </td>
            <?php if (!empty($criteria->rubric_levels)): ?>
              <?php foreach ($criteria->rubric_levels as $level): ?>
                <td>
                  <?= h($level->definition) ?><br>
                  <?= h($level->score) ?>pts
                </td>
              <?php endforeach; ?>
            <?php else:?>
              <td><p class="bg-warning">Aún no se ingresan valores.</p></td>          
            <?php endif; ?>
            <td>     
              
              <?= $this->Html->link(__('New Rubric Level'), ['controller' => 'RubricLevels', 'action' => 'add', $criteria->id], ['class' => 'btn btn-sm btn-primary', 'data-toggle' => 'modal', 'data-target' => '#modal3']) ?>
              <!-- Level modal -->
              <div class="modal fade bs-example-modal-sm" id="modal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    ...
                  </div>
                </div>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php endif; ?>
    <?= $this->Html->link(__('New Rubric Criteria'), ['controller' => 'RubricCriterias', 'action' => 'add', $rubric->id], ['class' => 'btn btn-primary', 'escape' => false, 'data-toggle' => 'modal', 'data-target' => '#modal1']) ?>
  </div>
</div>
