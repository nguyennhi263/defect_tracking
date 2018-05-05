<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Fontawesome -->
    <?= $this->Html->css('font-awesome.min.css') ?>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <!-- My script & stylesheet-->
    <?= $this->Html->css('main.css') ?>
    <?= $this->Html->script('myajax.js') ?>
    <?= $this->Html->script('main.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


</head>
<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#"><img src="/defect_tracking/webroot/img/cake-logo.png" alt="Logo" style="width:40px;">Defect Tracking</a>
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
     
      <?= $this->Html->link(__('Defect Management'), ['controller' => 'DefectHeaders', 'action' => 'index'],['class'=>'nav-link']) ?>
    </li>
    <li>
    <?= $this->Html->link(__('Project Management'), ['controller' => 'Projects', 'action' => 'index'],['class'=>'nav-link']) ?>
    </li>
    <li class="nav-item">
      <?= $this->Html->link(__('Trade Management'), ['controller' => 'Trades', 'action' => 'index'],['class'=>'nav-link']) ?>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Report
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Defect Management</a>
        <a class="dropdown-item" href="#">Project Management</a>
        <a class="dropdown-item" href="#">Report</a>
      </div>
    </li>
  </ul>
</nav>
<br>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
