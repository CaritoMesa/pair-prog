<head>
    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
</head>
<body>
<?= $this->Html->css('dashboard') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><?= $this->Html->link(__('List Grades'), ['action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
                <li><?= $this->Html->link(__('Apply Rubric'), ['controller' => 'Rubrics', 'action' => 'applyRubric', $submission->activity->rubric_id]) ?></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
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
                    <td>14</td>
                </tr>
            </table>
            <div class="row">
                <h4><?= __('Submission') ?></h4>
                <pre class="brush: py">
                <?= $this->Text->autoParagraph(h($submission->submission)); ?>
                </pre>
            </div>
            <h2 class="sub-header">Detalle Calificación</h2>
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
                            <td><?= $grades->rubrics_item_id ?></td>
                            <td></td>
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
    </div>
</div>
</body>