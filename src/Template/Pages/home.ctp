<?php $this->assign('body_class', 'home'); ?>

<header>
    <div class="header-image">
        <h1><?= __('Welcome')?>
        <?= $this->request->session()->read('Auth.User.first_name') ?></h1>
    </div>
</header>

