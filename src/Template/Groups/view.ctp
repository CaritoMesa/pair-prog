<!-- Casi falta segundo comboboxc -->
<!-- <?php //$this->Html->script('views/groups/view.js', array('inline' => FALSE)); ?>

<?php
    //echo $this->Form->input('Group.name', array('options' => $names, 'id' => 'group-name'));
?>
<div id="participants">
  <?php //echo $this->Form->input('User.name', array('empty' => 'Select ...', 'type' => 'select', 'id' => 'user-name')); ?>
</div> -->

<!-- Agregar Parejas -->
<h1><?= h($activity->name) ?></h1>
<blockquote>
  <p><?= h($activity->description) ?></p>
</blockquote>

<!-- Columns are always 50% wide, on mobile and desktop -->
<div class="row">
  <div class="col-xs-6">
        <?php //echo $this->Form->select(__('Groups'), $groups, ['multiple' => true], ['onclick' => "javascript:recargar();"]) ?>
        <h3>Grupos creados</h3>
        <dl class="dl-horizontal">
            <?php $lista = array()?>
            <?php foreach ($groups as $group):?>
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
        <?= $this->Html->link(__('Cancel'), ['controller' => 'Activities', 'action' => 'view', $group->activity_id], ['class' => 'btn btn-default'])  ?>

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

<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?= __('Add Rubric') ?></h4>
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

<!-- Modal #2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?= __('Edit Rubric') ?></h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
        <?= $this->Form->create($save_ssignment) ?>
        <?= $this->Flash->render() ?>
        <fieldset>

            <?php echo $group//$this->Form->input('name',['type' => 'select', 'multiple' => true]);?>
        </fieldset>       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary pull-right']) ?>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>