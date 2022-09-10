<?php
use Cake\Datasource\ConnectionManager;
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
$cakeDescription = 'BTVMX System';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('main.css') ?>
    <?= $this->Html->css('select2.css') ?>
    <?= $this->Html->css('base/jquery.ui.all.css') ?>
    <?= $this->Html->script("https://cdn.jsdelivr.net/npm/sweetalert2@8") ?>
    <?= $this->Html->css('https://use.fontawesome.com/releases/v5.7.2/css/all.css') ?>
    <?= $this->Html->script(array('jquery-3.2.1.min.js','popper.min.js','bootstrap.min.js')) ?>
    <?= $this->Html->script(array('plugins/pace.min.js','plugins/chart.js')) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body class="app sidebar-mini rtl" data-credencial="usuario">
    <!-- Navbar-->
    <header class=" app-header"><a class="app-header__logo" href=""><?php echo $this->Html->image('whiteBtv.svg', ['alt' => 'logotipo']); ?></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><i class="fas fa-bars fa-2x align-middle"></i></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!--Notification Menu-->
        <!-- <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">

              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div></a></li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>

              </div>
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li> -->
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><?= $this->Html->link('Logout', ['controller' => 'usuarios','action' => 'logout'],['class' => 'dropdown-item']); ?></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name"> <?= $current_user['nombre'] . ' ' . $current_user['apellido1']  ?></p>
          <p class="app-sidebar__user-designation"> <?= $current_user['puesto'] ?> </p>
        </div>
      </div>
      <ul class="app-menu">
        <li><?= $this->Html->link('<i class="app-menu__icon fa fa-tachometer-alt"></i> <span class="app-menu__label">Dashboard</span>', ['controller' => 'pages','action' => 'home'],['escape' => false, 'class' => 'app-menu__item']); ?></li>
        <?php if($current_user['tipoUsuario'] == 4 || $current_user['tipoUsuario'] == 3 ) : ?>
        <li class="treeview"><?= $this->Html->link('<i class="app-menu__icon fa fa-ticket-alt"></i> <span class="app-menu__label">Tickets</span>', ['controller' => 'tickets','action' => 'index'],['escape' => false, 'class' => 'app-menu__item']) ?></li>
        <?php endif; ?>
        <?php if($current_user['tipoUsuario'] == 3 ) : ?>
        <li class="treeview"><?= $this->Html->link('<i class="app-menu__icon fa fa-ticket-alt"></i> <span class="app-menu__label">Intervención</span>', ['controller' => 'intervenciones','action' => 'index'],['escape' => false, 'class' => 'app-menu__item']) ?></li>
        <?php endif; ?>
        <?php if($current_user['tipoUsuario'] == 1 || $current_user['tipoUsuario'] == 2 || $current_user['tipoUsuario'] == 5) :?>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-ticket-alt"></i><span class="app-menu__label">Tickets</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <?php if($current_user['tipoUsuario'] == 2 || $current_user['tipoUsuario'] == 1 || $current_user['tipoUsuario'] == 5 ) : ?>
                <li><?= $this->Html->link('<i class="icon far fa-circle"></i> Tickets', ['controller' => 'tickets','action' => 'index'],['escape' => false, 'class' => 'treeview-item']) ?></li>
                <li><?= $this->Html->link('<i class="icon far fa-circle"></i> Intervención', ['controller' => 'intervenciones','action' => 'index'],['escape' => false, 'class' => 'treeview-item']) ?></li>
              <?php endif; ?>
              <?php if($current_user['tipoUsuario'] != 3 && $current_user['tipoUsuario'] != 5 ) : ?>
                <li><?= $this->Html->link('<i class="icon far fa-circle"></i> Reporte Tecnico', ['controller' => 'reportetecnico','action' => 'index'],['escape' => false, 'class' => 'treeview-item']) ?></li>
                <li><?= $this->Html->link('<i class="icon far fa-circle"></i> Gastos', ['controller' => 'gastos','action' => 'index'],['escape' => false, 'class' => 'treeview-item']) ?></li>
              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?>
        <?php if($current_user['tipoUsuario'] == 1) :?>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-building"></i><span class="app-menu__label">Clientes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><?= $this->Html->link('<i class="icon far fa-circle"></i> Clientes', ['controller' => 'clientes','action' => 'index'],['escape' => false, 'class' => 'treeview-item']) ?></li>
              <li><?= $this->Html->link('<i class="icon far fa-circle"></i> Sucursales', ['controller' => 'sucursales','action' => 'index'],['escape' => false, 'class' => 'treeview-item']) ?></li>
              <li><?= $this->Html->link('<i class="icon far fa-circle"></i> Tabuladores', ['controller' => 'tabulador','action' => 'index'],['escape' => false, 'class' => 'treeview-item']) ?></li>
            </ul>
          </li>
          <!-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-alt"></i><span class="app-menu__label">Compras</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><?= $this->Html->link('<i class="icon far fa-circle"></i> Orden de compra', ['controller' => 'ordencompra','action' => 'index'],['escape' => false, 'class' => 'treeview-item']) ?></li>
            </ul>
          </li> -->
          <!-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-dollar-sign"></i><span class="app-menu__label">Gastos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="/testSystem/gastos"><i class="icon far fa-circle"></i> Gastos</a></li>
              <li><a class="treeview-item" href="/testSystem/gastos/add"><i class="icon far fa-circle"></i> Nuevo gasto</a></li>
            </ul>
          </li> -->
          <li class="treeview"><?= $this->Html->link('<i class="app-menu__icon fa fa-car"></i> <span class="app-menu__label">Vehículos</span>', ['controller' => 'vehiculos','action' => 'index'],['escape' => false, 'class' => 'app-menu__item']) ?></li>
          <!-- <li class="treeview"><?= $this->Html->link('<i class="app-menu__icon fa fa-book"></i> <span class="app-menu__label">Proveedores</span>', ['controller' => 'proveedores','action' => 'index'],['escape' => false, 'class' => 'app-menu__item']) ?></li> -->
          <!-- <li><?= $this->Html->link('<i class="app-menu__icon fa fa-comments-dollar"></i> <span class="app-menu__label">Tabuladores</span>', ['controller' => 'tabulador','action' => 'index'],['escape' => false, 'class' => 'app-menu__item']) ?></li>
          <li><?= $this->Html->link('<i class="app-menu__icon fa fa-comments-dollar"></i> <span class="app-menu__label">ordencompra</span>', ['controller' => 'ordencompra','action' => 'index'],['escape' => false, 'class' => 'app-menu__item']) ?></li>
          <li><?= $this->Html->link('<i class="app-menu__icon fa fa-comments-dollar"></i> <span class="app-menu__label">certificaciones</span>', ['controller' => 'certificaciones','action' => 'index'],['escape' => false, 'class' => 'app-menu__item']) ?></li> -->
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-invoice"></i><span class="app-menu__label">Reportes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><?= $this->Html->link('<i class="icon far fa-circle"></i> Utilidad', ['controller' => 'reportes','action' => 'utilidad'],['escape' => false, 'class' => 'treeview-item']) ?></li>
            </ul>
          </li>
          <!-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-toolbox"></i><span class="app-menu__label">Tecnicos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="/pages/tecnico"><i class="icon far fa-circle"></i> Tecnicos</a></li>
              <li><a class="treeview-item" href="/testSystem/certificaciones"><i class="icon far fa-circle"></i> Certificaciones</a></li>
            </ul>
          </li> -->
          <?php if( $current_user['tipoUsuario'] == 1 || $current_user['tipoUsuario'] == 2) : ?>
            <li class="treeview"><a class="app-menu__item" href="#" data-credencial="1" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><?= $this->Html->link('<i class="icon far fa-circle"></i> Usuarios', ['controller' => 'usuarios','action' => 'index'],['escape' => false, 'class' => 'treeview-item']) ?></li>
                <!-- <li><?= $this->Html->link('<i class="icon far fa-circle"></i> Clientes Contactos', ['controller' => 'usuarios','action' => 'index'],['escape' => false, 'class' => 'treeview-item']) ?></li> -->
              </ul>
            </li>
          <?php endif;?>
        <?php endif; ?>
        <?php if( $current_user['tipoUsuario'] == 2) : ?>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-invoice"></i><span class="app-menu__label">Reportes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><?= $this->Html->link('<i class="icon far fa-circle"></i> Utilidad', ['controller' => 'reportes','action' => 'utilidad'],['escape' => false, 'class' => 'treeview-item']) ?></li>
            </ul>
          </li>
        <?php endif;?>
      </ul>
    </aside>
    <?= $this->Flash->render() ?>
    <main class="app-content">
        <?= $this->fetch('content') ?>
    </main>
    <?= $this->Html->script(array('jquery-3.2.1.min.js','popper.min.js','bootstrap.min.js','main.js')) ?>
    <?= $this->Html->script(array('plugins/pace.min.js','plugins/chart.js')) ?>
    
</body>
</html>

