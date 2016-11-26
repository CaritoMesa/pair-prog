<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'index']) ?>">Pares</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
      <?php if ($this->request->session()->read('Auth.User') && !$this->request->session()->read('Auth.User.lti_user_id')): ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= __('Activities')?>  <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Activity'), ['action' => 'add']) ?></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link(__('Activities Groups'), ['controller' => 'ActivitiesGroups', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Submissions'), ['controller' => 'Submissions', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Rubrics'), ['controller' => 'Rubrics', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('List Rubric Criterias'), ['controller' => 'RubricCriterias', 'action' => 'index']) ?></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= __('Users')?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'])?></li>
            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'])?></li>
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= __('LTI')?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?= $this->Html->link(__('List O Auth Consumer'), ['controller' => 'OAuthConsumers', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New O Auth Consumer'), ['controller' => 'OAuthConsumers', 'action' => 'add']) ?></li>
          </ul>
        </li>

        <li><?= $this->Form->postLink(__('Salir'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
        <li class="active"><a href="#"><?= $this->request->session()->read('Auth.User.first_name') ?></a></li>
        
        <?php endif ?>
      </ul>
      
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>