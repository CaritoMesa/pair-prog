<?= $this->Html->css('dashboard') ?>
<div class="container-fluid">

</div>

<div class="container-fluid">
    <div class="row">
        <div class="page-heading">            
            <h1>Revisión Entrega</h1>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <table class="table" class="vertical-table">
                            <tr>
                                <th><?= __('User') ?></th>
                                <td><?= $submission->has('user') ? $this->Html->link([$submission->user->first_name, ' ', $submission->user->last_name], ['controller' => 'Users', 'action' => 'view', $submission->user->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Activity') ?></th>
                                <td><?= $submission->has('activity') ? $this->Html->link($submission->activity->name, ['controller' => 'Activities', 'action' => 'view', $submission->activity->id]) : '' ?></td>
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
                                <th><?= __('Calificación') ?></th>
                                <td>...</td>
                            </tr>
                        </table>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-8">
            <div class="thumbnail">
              <div class="caption">
                                <h4><?= __('Submission') ?></h4>
                        <pre class="brush: py">
                        <?= $this->Text->autoParagraph(h($submission->submission)); ?>
                        </pre>
              </div>
            </div>
          </div>
        </div>
 
    
<div class="tabbable">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Detalle Calificación</a></li>
    <li><a href="#tab2" data-toggle="tab">Aplicar Rúbrica</a></li>
  </ul>
  
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
        <div class="table-responsive">
                <?php if (!empty($submission->grades)): ?>
                    <table class="table table-striped">
                    <thead>
                    <tr>
                        <th><?= __('id') ?></th>
                        <th><?= __('user') ?></th>
                        <th><?= __('submission_id') ?></th>
                        <th><?= __('rubrics_item_id') ?></th>
                        <th><?= __('score') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($submission->grades as $grades): ?>
                        <tr>
                            <td><?= $this->Number->format($grades->id) ?></td>
                            <td><?= $grades->user_id ?></td>
                            <td><?= $grades->submission_id ?></td>
                            <td><?= $grades->criteria_id ?></td>
                            <td><?= $grades->score ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $grade->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $grade->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $grade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    </table>
                <?php endif; ?>
            </div>
    </div>

    <div class="tab-pane" id="tab2">
        <li><?= $this->Html->link(__('Aplicar Rúbrica'), ['controller' => 'Rubrics', 'action' => 'applyRubric', $submission->activity->rubric_id], ['id' => ['$submission->activity->rubric_id'], 'idSubmission' => ['$submission->id']]) ?></li>

      <p>...</p>
      <br />
    </div>
  </div>
</div>
                
        
    </div>    
</div>