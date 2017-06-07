<?= $this->Html->css('dashboard') ?>
<div class="container-fluid">
  <div class="row">
    <!-- Actividad -->
    <div class="related">
      <h3><?= h($activity->name) ?></h3>
      <table class="table">
        <tr>
          <th><?= __('Utiliza Grupos') ?></th>
          <td><?php if ($activity->use_groups == 1):?> Si
            <?php else:?> No
            <?php endif; ?>
          </td> 
        </tr>
        <tr>
          <th>
            Porcentaje
          </th>
          <td><?= $this->Number->toPercentage($activity->grade_estudiantes); ?>
          </td>
        </tr>
        <tr>
          <th><?= __('Descripción') ?></th>
          <td><?= $this->Text->autoParagraph(h($activity->description)); ?></td> 
        </tr>
      </table>  
    </div>
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
              <?= $this->Html->link(__('Crear Rúbrica'), ['controller' => 'Rubrics', 'action' => 'add', $activity->id], ['class' => 'btn btn-default'])?>
            <?php else:?> 
            <h4><?= h($activity->rubric->name) ?></h4>
            <?= $this->Text->autoParagraph(h($activity->rubric->description)); ?>
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
              <?php if (!empty($criteria)): ?>
                <table class="table table-hover">
                  <?php foreach ($criteria as $levels): ?>
                    <tr>
                      <td class="active">
                        <?= h($levels->description) ?><br />
                        <!-- REVISAR EDIT Y DELETE -->
                        <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ', ['controller' => 'rubricCriterias', 'action' => 'edit', $levels->id], ['class' => 'btn btn-sm btn-primary', 'escape' => false, 'data-toggle' => 'modal', 'data-target' => '#modal1']) ?>
                        <?= $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> ', ['controller' => 'RubricCriterias', 'action' => 'delete', $levels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $levels->id),'class' => 'btn btn-sm btn-danger', 'escape' => false]) ?>
                      </td>
                      <?php if (!empty($levels->rubric_levels)): ?>
                        <?php foreach ($levels->rubric_levels as $level): ?>
                          <td>
                            <?= h($level->definition) ?><br>
                            <?= h($level->score) ?>pts
                          </td>
                        <?php endforeach; ?>
                      <?php else:?>
                        <td><p class="bg-warning">Aún no se ingresan valores.</p></td>          
                      <?php endif; ?>
                      <td>     
                        <?= $this->Html->link(__('New Rubric Level'), ['controller' => 'RubricLevels', 'action' => 'add', $levels->id], ['class' => 'btn btn-sm btn-primary', 'data-toggle' => 'modal', 'data-target' => '#modal3']) ?>
                        <!-- Level modal -->
                        <div class="modal fade bs-example-modal-sm" id="modal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                          <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </table>
              <?php endif; ?>
            </div>
            <?= $this->Html->link(__('New Rubric Criteria'), ['controller' => 'RubricCriterias', 'action' => 'add', $activity->id], ['class' => 'btn btn-primary', 'escape' => false, 'data-toggle' => 'modal', 'data-target' => '#modal1']) ?>
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
                <h5>Grupos creados</h5>
                <dl class="dl-horizontal">
                  <?php $lista = array()?>
                  <?php foreach ($activity->groups as $group):?>
                    <dt> <?php echo $group->name ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Assignments', 'action' => 'edit', $group->id]) ?>
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
                <br />
                <!-- Boton Agregar Parejas -->
                <button type="button" class="btn btn-primary" escape="false" data-toggle="modal" data-target="#myModal1">
                  <span class="glyphicon glyphicon-plus"></span>
                  <?=__('New Group')?>
                </button>
              </div>
              <div class="col-xs-6" id="particioantes">
                <h3>Participantes sin asignar</h3>
                <ul class="list-unstyled">
                  <?php foreach ($users as $user):?>
                    <?php if (array_search($user->id,$lista) === false):?>
                      <li> <?php echo $user->first_name, ' ',$user->last_name ?></li>
                    <?php endif; ?>
                  <?php  endforeach; ?>
                </ul>
                <br />
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?= __('Nueva Pareja') ?></h4>
                  </div>
                  <div class="modal-body">
                    <?= $this->Form->create($save_group) ?>
                    <?= $this->Flash->render() ?>
                    <fieldset>
                        <?php
                            echo $this->Form->input('name');
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
                  <th><?= __('Created') ?></th>
                  <th><?= __('Modified') ?></th>
                  <th class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($submissions as $submission): ?>
                <tr>
                  <td><?= h($submission->user->first_name) ?> <?= h($submission->user->last_name) ?></td>
                  <td><?= h($submission->created) ?></td>
                  <td><?= h($submission->modified) ?></td>
                  <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Submissions', 'action' => 'view', $submission->id], ['class' => 'btn btn-success btn-xs']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Submissions', 'action' => 'edit', $submission->id], ['class' => 'btn btn-primary btn-xs']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Submissions', 'action' => 'delete', $submission->id], ['class' => 'btn btn-danger btn-xs'], ['confirm' => __('Are you sure you want to delete # {0}?', $submission->id)]) ?>
                    <?= $this->Html->link('Revisar Entrega', ['controller' => 'Rubrics', 'action' => 'apply_rubric', $submission->id], ['class' => 'btn btn-info btn-xs']) ?>
                    <?= $this->Html->link('Calificar', ['controller' => 'Grades', 'action' => 'view', $submission->id], ['class' => 'btn btn-warning btn-xs']) ?>
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