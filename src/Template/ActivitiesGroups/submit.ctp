<div class="activities view large-9 medium-8 columns content">
    <h3><?= h($activitiesGroup->name) ?></h3>
    <div class="row">
    	<?= $this->request->session()->read('Auth.User.first_name') ?>
    	<br>
        <?= $this->Html->link(__('Related Submission'), ['controller' => 'Assignments', 'action' => 'submit', $activitiesGroup->id]) ?>
    </div>
   
</div>
