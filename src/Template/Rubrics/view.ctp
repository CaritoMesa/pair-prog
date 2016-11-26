<!-- Volver -->
<?= $this->Html->link(__('< Volver'), ['controller' => 'Rubrics', 'action' => 'index']) ?>

<!-- Info rubrica -->
<div class="rubrics view large-9 medium-8 columns content">
    <h2><?= h($rubric->name) ?></h2>
    <?= $this->Text->autoParagraph(h($rubric->description)); ?>

<!-- Cirterios Rubrica -->  
    <div class="related">
        <h4><?= __('Related Rubric Criterias') ?></h4>
 
        <?php if (!empty($rubric->rubric_criterias)): ?>
        <table class="table table-bordered">
            <?php foreach ($rubric->rubric_criterias as $rubricCriterias): ?>
            <tr>
                <td><?= h($rubricCriterias->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RubricCriterias', 'action' => 'view', $rubricCriterias->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RubricCriterias', 'action' => 'edit', $rubricCriterias->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RubricCriterias', 'action' => 'delete', $rubricCriterias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rubricCriterias->id)]) ?>
                </td>
                <?php for($i = 0; $i < count($criteria); ++$i): ?>
                <?php if ($rubricCriterias->id == $criteria[$i]["rubric_criteria_id"]): ?> 
                <td>
                      
                        <?= h($criteria[$i]["definition"])?>  
                        <br>
                        <?= h($criteria[$i]["score"])?> 
                        pts
                    
                </td>
                <?php endif; ?>
                <?php endfor; ?>
                <td>     
                    <?= $this->Html->link(__('New Rubric Level'), ['controller' => 'RubricLevels', 'action' => 'add', $rubricCriterias->id, ['class' => 'btn btn-sm btn-primary']]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
<?= $this->Html->link(__('New Rubric Criteria'), ['controller' => 'RubricCriterias', 'action' => 'add', $rubric->id, ['class' => 'btn btn-sm btn-primary']]) ?>


<!-- Modal --> 
<!-- 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>
...more buttons...

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>-->
<!-- Migas de pan 
Add at the end of the trail
<$this->Breadcrumbs->add(
    'Products',
    ['controller' => 'products', 'action' => 'index']
);?>-->