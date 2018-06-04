<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Panel kontrolny</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Panel</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= $new_orders ?></h3>
                    <p>Nowych zamówień</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pricetag"></i>
                </div>
                <a href="/admin/orders" class="small-box-footer">Zobacz zamówienia <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>0</h3>
                    <p>Nowych wiadomości</p>
                </div>
                <div class="icon">
                    <i class="ion ion-email"></i>
                </div>
                <a href="#" class="small-box-footer">Otwórz skrzynkę pocztową <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>0</h3>
                    <p>Raportów</p>
                </div>
                <div class="icon">
                    <i class="ion ion-alert"></i>
                </div>
                <a href="#" class="small-box-footer">Przejrzyj <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </section>
</div>
<!-- /.content-wrapper -->
