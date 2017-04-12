<!-- Cirterios Rubrica -->  
<div class="related">
    <h2><?= h($rubric->name) ?></h2>
    <blockquote>
        <?= $this->Text->autoParagraph(h($rubric->description)); ?>
    </blockquote>
    <?php if (!empty($rubric->rubric_criterias)): ?>
        <?php $id=0 ?>
        <table class="table table-bordered">
            <?php foreach ($rubric->rubric_criterias as $rubricCriterias): ?>
            <tr>
                <td class="active">
                    <?= h($rubricCriterias->description) ?>
                    <?= $this->Html->link(__('Evaluar'), ['controller' => 'Grades', 'action' => 'add', $rubricCriterias->id], ['class' => 'btn btn-primary pull-right', 'escape' => false, 'data-toggle' => 'modal', 'data-target' => '#modalOther']) ?>
                </td>
                <td>
                    <?php foreach ($prueba as $pp): ?>
                        <?php if ($pp->rubric_criteria_id === $rubricCriterias->id): ?>     
                            <?php echo $this->Form->radio($id, $pp->definition);
                            echo ' ('.$pp->score.' pts.)';?> 
                            <br />
                        <?php endif; ?>
                    <?php endforeach; ?>     
                </td>
                <?php ++$id ?>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <?= $this->Html->link(__('Cancel'), ['controller' => 'Activities', 'action' => 'submit'], ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->button(__('Submit')) ?>
</div>
<!-- Modal -->
<div class="modal fade" id="modalOther" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->