<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Zamówienia
            <small>Lista zamówień</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin/orders"><i class="fa fa-tag"></i> Zamówienia</a></li>
            <li class="active">Lista zamówień</li>
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

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista wszystkich</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" width="100%" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Typ: activate to sort column ascending">ID</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Typ: activate to sort column ascending">Status</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Miejscowosc: activate to sort column ascending">Data dodania</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Data: activate to sort column ascending">Imię i nazwisko</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Uzytkownik: activate to sort column ascending">Płatność</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Poziom: activate to sort column ascending">Dostawa</th>
                            <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 134.000px;" aria-label="">Akcja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $key => $order): ?>

                            <?php $class = 'odd';
                            if ($key % 2 == 0) {
                                $class = 'even';
                            } ?>

                            <tr role="row" class="<?= $class ?>">
                                <td><?= $order->id ?></td>
                                <td class=""><?= get_order_status($order->status, $this->config->item('order_status')) ?></td>
                                <td class="sorting_1"><?= date('d/m/y, H:i', $order->created) ?></td>
                                <td class=""><?= $order->first_name.' '.$order->last_name ?> <small>(<?= $order->email ?>)</small></td>
                                <td><?= get_order_payment($order->payment, $this->config->item('payment_method')) ?></td>
                                <td><?= get_order_shipment($order->shipment, $this->config->item('shipment_method')) ?></td>
                                <td class="text-center"><a href="/admin/orders/edit/<?= $order->id ?>"><button type="button" class="btn btn-warning" style="margin-right: 10px;"><i class="fa fa-edit"></i></button></a><a href="<?= base_url('order/order?orderid='.$order->id.'&allow='.$order->allow) ?>" target="_blank"><button type="button" class="btn btn-info" style="width: 40px;"><i class="fa fa-eye"></i></button></a></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">ID</th>
                            <th rowspan="1" colspan="1">Status</th>
                            <th rowspan="1" colspan="1">Data dodania</th>
                            <th rowspan="1" colspan="1">Imię i nazwisko</th>
                            <th rowspan="1" colspan="1">Płatność</th>
                            <th rowspan="1" colspan="1">Dostawa</th>
                            <th rowspan="1" colspan="1">Akcja</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
