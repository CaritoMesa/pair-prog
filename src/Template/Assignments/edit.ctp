<body>
    <h1><?= h($group->name)?></h1>
    <br>
    <div class="related">
        <h3><?= __('Participants') ?></h3>
        <table class="table">
            <tr>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col"><?= __('Role') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($assignments as $assignment): ?>
            <tr>
                <td><?= h($assignment->user->first_name) ?>
                    <?= h($assignment->user->last_name) ?>
                </td>
                <td><?= h($assignment->role->name)?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Assignments', 'action' => 'delete', $assignment->id], ['confirm' => __('Are you sure you want to delete # {0} {1}?', $assignment->user->first_name, $assignment->user->last_name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Boton Agregar Parejas -->
    <br>
    <?= $this->Html->link(__('Cancel'), ['controller' => 'Groups', 'action' => 'view', $assignment->group->activity_id], ['class' => 'btn btn-default'])  ?>

    <button type="button" class="btn btn-primary" escape="false" data-toggle="modal" data-target="#myModal1">
        <span class="glyphicon glyphicon-plus"></span>
        <?=__('Add Participant')?>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?= __('Add Participant') ?></h4>
          </div>
          <div class="modal-body">
            <?= $this->Form->create($save_participant) ?>
            <?= $this->Flash->render() ?>
            <fieldset>
                <?php
                    echo $this->Form->input('user_id', ['options' => $users ]);
                    echo $this->Form->input('role_id', ['options' => $roles ]);
                ?>
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

</body>