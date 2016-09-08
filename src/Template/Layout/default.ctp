<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Pares | 
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <link href="css/style.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="<?= $this->fetch('body_class') ?>">
    <nav class="top-bar expanded" data-topbar role="navigation"> 
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href="">Pares</a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
            <?php if ($this->request->session()->read('Auth.User') && !$this->request->session()->read('Auth.User.lti_user_id')): ?>
                <li><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'index']) ?>"><?= __('Inicio') ?></a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'Activities', 'action' => 'index']) ?>"><?= __('Actividades') ?></a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'OAuthConsumers', 'action' => 'index']) ?>"><?= __('LTI') ?></a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>"><?= __('Usuarios') ?></a></li>
                <li><?= $this->Form->postLink(__('Salir'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
                <li><a href=""><?= $this->request->session()->read('Auth.User.first_name') ?></a></li>
            <?php endif ?>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
