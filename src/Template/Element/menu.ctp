<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar">.</span>
          <span class="icon-bar">.</span>
        </button>
        <a class="navbar-brand" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'index']) ?>"><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>  Peers    </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
        <?php if ($this->request->session()->read('Auth.User') && !$this->request->session()->read('Auth.User.lti_user_id')): ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= __('Activities')?>  <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
              <li role="separator" class="divider"></li>
              <li><?= $this->Html->link(__('Activities Groups'), ['controller' => 'ActivitiesGroups', 'action' => 'index']) ?></li>
              <li><?= $this->Html->link(__('Submissions'), ['controller' => 'Submissions', 'action' => 'index']) ?></li>
              <li><?= $this->Html->link(__('Rubrics'), ['controller' => 'Rubrics', 'action' => 'index']) ?></li>
              <li><?= $this->Html->link(__('Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
            </ul>
          </li>
          <li><?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
          <li><?= $this->Html->link(__('LTI'), ['controller' => 'OAuthConsumers', 'action' => 'index']) ?></li>
        <?php endif ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li>
          <?= $this->Html->link($this->request->session()->read('Auth.User.first_name'), ['controller' => 'Users', 'action' => 'view', $this->request->session()->read('Auth.User.id')]) ?> 
          </li>
          <li><?= $this->Form->postLink(__('Salir'), ['controller' => 'Users', 'action' => 'logout']) ?></li>        
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>