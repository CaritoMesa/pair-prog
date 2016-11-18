<div class="activities view large-9 medium-8 columns content">
    <h3><?= h($activity->name) ?></h3>
    
    <div class="row">
        <?= $this->Text->autoParagraph(h($activity->description)); ?>
        <?= $this->Html->link(__('Related Submission'), ['controller' => 'Submissions', 'action' => 'submit', $activity->id]) ?>
    </div>
    <div class="related">
        <h4><?= __('Related Submissions for',' ') ?>
        <?= h($this->request->session()->read('Auth.User.first_name')) ?></h4>
        <?php if (!empty($activity->submissions)): ?>
        <table class="table" cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Submission') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
            </tr>
            <?php foreach ($activity->submissions as $submissions): ?>
                <?php if ($submissions->user_id === $this->request->session()->read('Auth.User.id')): ?>  
                    <tr>
                        <td><?= h($submissions->submission) ?></td>
                        <td><?= h($submissions->created) ?></td>
                        <td><?= h($submissions->modified) ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>    
</div>
