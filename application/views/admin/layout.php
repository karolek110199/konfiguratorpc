<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zaplecze | Konfigurator PC</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url($admin_dir) ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url($admin_dir) ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url($admin_dir) ?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url($admin_dir) ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url($admin_dir) ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="<?= base_url($admin_dir) ?>dist/css/skins/skin-green-light.min.css">

    <?php $this->template->render_css(); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="<?= base_url() ?>" class="logo" style="color: #02477e; font-weight: 900;">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">KPC</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">Konfigurator PC</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Pokaż menu</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Masz 4 wiadomości</li>
                                <li>
                                    <!-- inner menu: contains the messages -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <!-- User Image -->
                                                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <!-- Message title and timestamp -->
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <!-- The message -->
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                    </ul>
                                    <!-- /.menu -->
                                </li>
                                <li class="footer"><a href="#">Zobacz wszystkie wiadomości</a></li>
                            </ul>
                        </li>
                        <!-- /.messages-menu -->

                        <!-- Notifications Menu -->
                        <li class="dropdown notifications-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Masz 10 powiadomień</li>
                                <li>
                                    <!-- Inner Menu: contains the notifications -->
                                    <ul class="menu">
                                        <li><!-- start notification -->
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <!-- end notification -->
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">Zobacz wszystkie</a></li>
                            </ul>
                        </li>
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="<?= base_url($admin_dir) ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="<?= base_url($admin_dir) ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p style="color: #444;">
                                        <?= $_SESSION['name'] ?> - <?= $_SESSION['rank'] ?>
                                        <small>Dołączyłeś <?= date('d.m.Y', $_SESSION['registered']) ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="/admin/logout" class="btn btn-default btn-flat">Wyloguj</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url($admin_dir) ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $_SESSION['name'] ?></p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li <?= ($active_page == 'index') ? 'class="active"' : '' ?>><a href="/admin/index"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                    <li <?= ($active_page == 'orders') ? 'class="active"' : '' ?>><a href="/admin/orders"><i class="fa fa-tag"></i> <span>Zamówienia</span></a></li>
                    <li <?= ($active_page == 'clients') ? 'class="active"' : '' ?>><a href="/admin/clients"><i class="fa fa-users"></i> <span>Klienci</span></a></li>
                    <li <?= ($active_page == 'store') ? 'class="active treeview"' : '' ?>><a href="/admin/store"><i class="fa fa-database"></i> <span>Magazyn</span></a>
                        <ul class="treeview-menu">
                            <li><a href="/admin/store/"><i class="fa fa-circle-o"></i>Lista</a></li>
                            <li><a href="/admin/store/add"><i class="fa fa-circle-o"></i>Dodaj produkt</a></li>
                        </ul>
                    </li>             
                    <li <?= ($active_page == 'settings') ? 'class="active"' : '' ?>><a href="/admin/settings"><i class="fa fa-users"></i> <span>Ustawienia</span></a></li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <?php $this->load->view($content); ?>

        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                INFO
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2017 <a href="#">Konfigurator PC</a>.</strong> All rights reserved.
        </footer>

        <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    <script src="<?= base_url($admin_dir) ?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url($admin_dir) ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url($admin_dir) ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url($admin_dir) ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url($admin_dir) ?>dist/js/adminlte.min.js"></script>

    <?php $this->template->render_javascripts(); ?>

    <script>
        $(document).ready(function () {
            $('#example1').DataTable({
                "scrollX": true,
                "order": [[0, "desc"]],
                "language": {
                    "lengthMenu": "Pokaż _MENU_ wpisów na stronę",
                    "zeroRecords": "Nic nie znaleziono",
                    "info": "Strona _PAGE_ z _PAGES_",
                    "infoEmpty": "Brak wpisów",
                    "infoFiltered": "(przefiltrowano _MAX_ wszystkich rekordów)",
                    "search": "Szukaj:",
                    "paginate": {
                        "first": "Pierwsza",
                        "last": "Ostatnia",
                        "next": ">",
                        "previous": "<"
                    }
                }
            });
        });
    </script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. -->
</body>
</html>
