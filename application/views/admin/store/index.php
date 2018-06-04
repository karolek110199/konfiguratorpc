<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Magazyn
            <small>Lista produktów</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin/store"><i class="fa fa-tag"></i> Magazyn</a></li>
            <li class="active">Lista produktów</li>
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
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Typ: activate to sort column ascending">Typ</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Miejscowosc: activate to sort column ascending">Cena</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Data: activate to sort column ascending">Producent</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Uzytkownik: activate to sort column ascending">EAN</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Poziom: activate to sort column ascending">Nazwa</th>
                            <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 134.000px;" aria-label="">Akcja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $key => $product): ?>

                            <?php $class = 'odd';
                            if ($key % 2 == 0) {
                                $class = 'even';
                            } ?>

                            <tr role="row" class="<?= $class ?>">
                                <td class="sorting_1"><?= $product->id ?></td>
                                <td><?= $product->type ?></td>
                                <td><?= $product->price ?></td>
                                <td><?= $product->manufacturer ?></td>
                                <td><?= $product->ean ?></td>
                                <td><?= $product->name ?></td>
                                <td class="text-center"><a href="/admin/store/edit/<?= $product->id ?>"><button type="button" class="btn btn-warning" style="margin-right: 10px;"><i class="fa fa-edit"></i></button></a></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">ID</th>
                            <th rowspan="1" colspan="1">Typ</th>
                            <th rowspan="1" colspan="1">Cena</th>
                            <th rowspan="1" colspan="1">Producent</th>
                            <th rowspan="1" colspan="1">EAN</th>
                            <th rowspan="1" colspan="1">Nazwa</th>
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
