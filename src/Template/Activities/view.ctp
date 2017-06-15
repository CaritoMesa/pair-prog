<div class="container-fluid">
<!-- Actividad -->
  <div class="well">
      <h3><?= h($activity->name) ?></h3>
      <dl class="dl-horizontal">
        <dt>Utiliza Grupos</dt>
        <dd>
            <?php if ($activity->use_groups == 1):?> Si
            <?php else:?> No
            <?php endif; ?>
        </dd>
        <dt>El porcentaje del estudiante revisor es</dt>
        <dd>
            <?= $this->Number->toPercentage($activity->grade_estudiantes); ?>
        </dd>
        <dt>Nota máxima</dt>
        <dd><?= $this->Number->precision($activity->grade_max, 1) ?></dd>
        <dt>Nota mínima</dt>
        <dd><?= $this->Number->precision($activity->grade_min, 1) ?></dd>
        <dt>Nota aprobación</dt>
        <dd><?= $this->Number->precision($activity->grade_aprobacion, 1) ?></dd>
        <dt>Exigencia</dt>
        <dd><?= $this->Number->precision($activity->exigencia, 1) ?></dd>
        <dt>Puntaje máximo</dt>
        <dd><?= $this->Number->precision($activity->score_max, 1) ?></dd>
        <dt>Descripción</dt>
        <dd>
            <?= $this->Text->autoParagraph(h($activity->description)); ?>
        </dd>
        <br />
      </dl>
      <?= $this->Html->link('Volver', ['controller' => 'Activities', 'action' => 'index'], ['class' => 'btn btn-default']) ?>
      <?= $this->Html->link(__('Editar Actividad'), ['action' => 'edit', $activity->id], ['class' => 'btn btn-sm btn-primary', 'data-toggle' => 'modal', 'data-target' => '#modalOther']) ?>
  </div>
</div>

  <div class="row">
    <!-- Acordeón -->
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Rúbrica</a>
          </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
            <?php if (empty($activity->rubric_id)):?>
              <?= $this->Html->link(__('Crear Rúbrica'), ['controller' => 'Rubrics', 'action' => 'add', $activity->id], ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#modalOther'])?>
            <?php else:?> 
            <h4><?= h($activity->rubric->name) ?></h4>
            <?= $this->Text->autoParagraph(h($activity->rubric->description)); ?>
            <!-- Cirterios Rubrica --> 
            <div class="related">
            <h4><?= __('Related Rubric Criterias') ?></h4>
            <?php if (!empty($criteria)): ?>
                <table class="table table-hover">
                  <?php foreach ($criteria as $levels): ?>
                    <tr>
                      <td class="active">
                        <?= h($levels->description) ?><br />
                        <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ', ['controller' => 'rubricCriterias', 'action' => 'edit', $levels->id], ['class' => 'btn btn-xs btn-primary', 'escape' => false, 'data-toggle' => 'modal', 'data-target' => '#modalOther']) ?>
                        <?= $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> ', ['controller' => 'RubricCriterias', 'action' => 'delete', $levels->id], ['confirm' => __('Are you sure you want to delete {0}?', $levels->description),'class' => 'btn btn-xs btn-danger', 'escape' => false]) ?>
                      </td>
                      <?php if (!empty($levels->rubric_levels)): ?>
                        <?php foreach ($levels->rubric_levels as $level): ?>
                          <td>
                            <?= h($level->definition) ?><br>
                            <?= h($level->score) ?> pts<br>
                            <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ', ['controller' => 'RubricLevels', 'action' => 'edit', $level->id], ['class' => 'btn btn-xs btn-primary', 'escape' => false, 'data-toggle' => 'modal', 'data-target' => '#modalOther']) ?>
                            <?= $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> ', ['controller' => 'RubricLevels', 'action' => 'delete', $level->id], ['confirm' => __('Are you sure you want to delete {0}?', $level->definition),'class' => 'btn btn-xs btn-danger', 'escape' => false]) ?>
                          </td>
                        <?php endforeach; ?>
                      <?php else:?>
                        <td><p class="bg-warning">Aún no se ingresan valores.</p></td>          
                      <?php endif; ?>
                      <td>     
                        <?= $this->Html->link(__('New Rubric Level'), ['controller' => 'RubricLevels', 'action' => 'add', $levels->id], ['class' => 'btn btn-xs btn-primary', 'data-toggle' => 'modal', 'data-target' => '#modalOther']) ?>   
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </table>
              <?php endif; ?>
            </div>
            <?= $this->Html->link(__('New Rubric Criteria'), ['controller' => 'RubricCriterias', 'action' => 'add', $activity->id], ['class' => 'btn btn btn-sm btn-primary', 'escape' => false, 'data-toggle' => 'modal', 'data-target' => '#modalOther']) ?>
            </div>
          <?php endif;?>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Parejas</a>
          </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-6">
                <h4>Grupos creados</h4>
                <dl class="dl-horizontal">
                  <?php $lista = array()?>
                  <?php foreach ($activity->groups as $group):?>
                    <dt> <?php echo $group->name ?>
                    </dt>
                    <?php $bandera = 0 ?>
                    <?php foreach ($assignments as $assignment):?>
                      <?php if ($group->id === $assignment->group->id):?>
                        <?php $lista[] = $assignment->user->id ?>
                        <dd><?php echo $assignment->user->first_name, ' ',$assignment->user->last_name?></dd>
                        <? $bandera = 1 ?>
                      <?php endif; ?>
                    <?php  endforeach; ?>
                    <?php if ($bandera === 0):?>
                      <dd class="bg-danger"><?php echo "NO se han asignado participantes"?></dd> 
                    <?php endif; ?>
                  <?php  endforeach; ?>
                  <br />
                </dl>    
              </div>
            </div> 
            <?= $this->Html->link(__('Asignar Parejas'), ['controller' => 'Groups', 'action' => 'view', $activity->id], ['class' => 'btn btn-primary']) ?>

          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Entregas Realizadas</a>
          </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="panel-body">
            <?php if (!empty($submissions)): ?>
              <table class="table" cellpadding="0" cellspacing="0">
                <tr>
                  <th><?= __('User') ?></th>
                  <th>Puntaje</th>
                  <th>Calificación</th>
                  <th><?= __('Created') ?></th>
                  <th><?= __('Modified') ?></th>
                  <th class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($submissions as $submission): ?>
                <tr>
                  <td><?= h($submission->user->first_name) ?> <?= h($submission->user->last_name) ?></td>
                  <td><?= h($this->Number->precision($submission->score, 2)) ?></td>
                  <td><?= h($this->Number->precision($submission->grade, 1)) ?></td>
                  <td><?= h($submission->created) ?></td>
                  <td><?= h($submission->modified) ?></td>
                  <td class="actions">
                    <?= $this->Html->link('Revisar Entrega', ['controller' => 'Rubrics', 'action' => 'apply_rubric', $submission->id], ['class' => 'btn btn-info btn-xs']) ?>
                    <?= $this->Html->link('Calificar', ['controller' => 'Submissions', 'action' => 'view', $submission->id], ['class' => 'btn btn-success btn-xs']) ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </table>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalOther" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
