<?php $this->assign('body_class', 'home'); ?>
<div class="jumbotron">
	<br />
  <h1>Bienvenido <?= $this->request->session()->read('Auth.User.first_name') ?></h1>
  <p>...</p>
  <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> -->
</div>