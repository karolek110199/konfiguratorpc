<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Zamówienia
            <small>Edytuj zamówienie</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin/orders"><i class="fa fa-tag"></i> Zamówienia</a></li>
            <li class="active">Edytuj zamówienie</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <?php if (isset($error)): ?>

            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Wystąpił błąd!</h4>
                <?= $error; ?>
            </div>

        <?php endif; ?>

        <?php if (isset($success)): ?>

            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Sukces!</h4>
                <?= $success; ?>
            </div>

        <?php endif; ?>

        <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Edycja zamówienia</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST">
            <div class="box-body">
                <div class="form-group">
                <label for="istatus">Status zamówienia</label>
                <select name="status" id="istatus" class="form-control">
                    <?php 
                        foreach($this->config->item('order_status') as $key => $status)
                        {
                            echo '<option value="'.$key.'">'.$status.'</option>';
                        }
                    ?>
                </select>
                </div>
                
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <a href="/admin/orders"><span class="btn btn-default">Wróc</span></a>
                <button type="submit" class="btn btn-info pull-right">Zapisz zmiany</button>
            </div>
            </form>
        </div>
        

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
