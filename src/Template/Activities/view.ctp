<?= $this->Html->css('dashboard') ?>
<div class="container-fluid">
  <div class="row">
    <!-- Menú -->
    <div class="sidebar">
      <ul class="nav nav-sidebar nav-pills nav-stacked">
        <li><?= $this->Html->link(__('Descripción'), ['controller' => 'Activities', 'action' => 'view', $activity->id]) ?></li>
        <li><?= $this->Html->link(__('Asignar Parejas'), ['controller' => 'Groups', 'action' => 'view', $activity->id]) ?></li>
        <li><?= $this->Html->link(__('Calificaciones'), ['controller' => 'Rubrics', 'action' => 'applyRubric', $activity->rubric_id]) ?></li>
      </ul>
    </div>
  </div>
  <div class="row">
    <!-- Actividad -->
    <div class="related">
      <h3><?= h($activity->name) ?></h3>
      <table class="table">
        <tr>
          <th><?= __('Use Groups') ?></th>
          <td><?php if ($activity->use_groups == 1):?>
              Si
            <?php else:?>
              No
            <?php endif; ?>
          </td> 
        </tr>
      </table>  
      <blockquote>
        <?= $this->Text->autoParagraph(h($activity->description)); ?>    
      </blockquote>
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
              <h5><?= __('Related Rubric Criterias') ?></h5>
              <?php if (!empty($criteria)): ?>
                <table class="table table-hover">
                  <?php foreach ($criteria as $levels): ?>
                    <tr>
                      <td class="active">
                        <?= h($levels->description) ?><br />
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
            <?= $this->Html->link(__('New Rubric Criteria'), ['controller' => 'RubricCriterias', 'action' => 'add', $activity->rubric_id], ['class' => 'btn btn-primary', 'escape' => false, 'data-toggle' => 'modal', 'data-target' => '#modal1']) ?>
            </div>
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
                        <dd> <?php echo $assignment->user->first_name, ' ',$assignment->user->last_name?>
                        </dd>
                        <? $bandera = 1 ?>
                    <?php endif; ?>
                <?php  endforeach; ?>
                <?php if ($bandera === 0):?>
                    <dd class="bg-danger"><?php echo "NO se han asignado participantes"?></dd> 
                <?php endif; ?>
          <?php  endforeach; ?>
          <br>
        </dl>
        <br>
        <?= $this->Html->link(__('Cancel'), ['controller' => 'Activities', 'action' => 'index'], ['class' => 'btn btn-default'])  ?>

        <!-- Boton Agregar Parejas -->
        <button type="button" class="btn btn-primary" escape="false" data-toggle="modal" data-target="#myModal1">
            <span class="glyphicon glyphicon-plus"></span>
            <?=__('New Group')?>
        </button>
  </div>
  <div class="col-xs-6" id="particioantes">
    <?php //echo $this->Form->input('Integrantes', ['options' => $users, 'multiple' => true]) ?>
    <h3>Participantes sin asignar</h3>
    <ul class="list-unstyled">
        <?php foreach ($users as $user):?>
            <?php if (array_search($user->id,$lista) === false):?>
                <li> <?php echo $user->first_name, ' ',$user->last_name ?></li>
            <?php endif; ?>
        <?php  endforeach; ?>
    </ul>
    <br>
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
          <?php if (!empty($activity->submissions)): ?>
            <table class="table" cellpadding="0" cellspacing="0">
              <tr>
                <th><?= __('User') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Calificación') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($activity->submissions as $submissions): ?>
              <tr>
                <td><?= h($submissions->user_id) ?></td>
                <td><?= h($submissions->created) ?></td>
                <td><?= h($submissions->modified) ?></td>
                <td></td>
                <td class="actions">
                  <?= $this->Html->link(__('View'), ['controller' => 'Submissions', 'action' => 'view', $submissions->id]) ?>
                  <?= $this->Html->link(__('Edit'), ['controller' => 'Submissions', 'action' => 'edit', $submissions->id]) ?>
                  <?= $this->Form->postLink(__('Delete'), ['controller' => 'Submissions', 'action' => 'delete', $submissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $submissions->id)]) ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingFour">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Evaluación</a>
        </h4>
      </div>
      <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
        <div class="panel-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
      </div>
    </div>
  </div>
</div>