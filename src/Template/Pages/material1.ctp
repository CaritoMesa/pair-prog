<?php $this->assign('body_class', 'home'); ?>

<header>
    <div class="header-image">
        <h1>ACTIVIDAD 1</h1>
    </div>
</header>
	<div>
	<?php
		echo $this->Form->create($submission, [
    	'context' => [
        	'validator' => [
            	'Users' => 'register',
            	'Comments' => 'default'
       	 	]
    	]
]);
		 ?>
	</div>
        <h3> Para realizar actividad haga click en 'Realizar Actividad'</h3>
        <?= $this->Html->link(__('Realizar entrega Actividad 1'), ['controller' => 'Submissions', 'action' => 'add']) ?>
        <br>
        <?php echo $this->Form->button('Realizar actividad');
