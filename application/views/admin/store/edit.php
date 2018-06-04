<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Magazyn
            <small>Edytuj produkt</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin/store"><i class="fa fa-tag"></i> Magazyn</a></li>
            <li class="active">Edytuj produkt</li>
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
            <h3 class="box-title">Edytowanie produktu</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group">
                    <label for="ftype">Typ</label>
                    <select name="type" id="ftype" class="form-control">
                        <?php 
                            foreach($this->StoreModel->getAvailableTypes() as $name => $v)
                            {
                                echo '<option value="'.$name.'" '.(($name == $product->type) ? "selected" : "").'>'.$name.'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fprice">Cena</label>
                    <input type="text" name="price" id="fprice" class="form-control" placeholder="PLN" value="<?= $product->price ?>" />
                </div>
                <div class="form-group">
                    <label for="fmanufacturer">Producent</label>
                    <input type="text" name="manufacturer" id="fmanufacturer" class="form-control" value="<?= $product->manufacturer ?>" />
                    <label for="fproducentcode">Kod producenta</label>
                    <input type="text" name="producentcode" id="fproducentcode" class="form-control" value="<?= $product->producent_code ?>" />
                    <label for="fean">EAN</label>
                    <input type="text" name="ean" id="fean" class="form-control" value="<?= $product->ean ?>" />
                </div>
                <div class="form-group">
                    <label for="fmodel">Model</label>
                    <input type="text" name="model" id="fmodel" class="form-control" value="<?= $product->model ?>"/>
                </div>
                <div class="form-group">
                    <label for="fname">Pełna nazwa</label>
                    <input type="text" name="name" id="fname" class="form-control" value="<?= $product->name ?>" />
                </div>
                <div class="form-group">
                    <label for="fimg">Obrazek</label>
                    <input type="file" name="product_img" id="fimg" />
                    <?= (isset($product->img) && $product->img != '') ? '<img src="'.base_url('uploads/').$product->img.'" style="max-height: 200px;" />' : '' ?>
                </div>
                <div class="form-group">
                    <h4>Pola dodatkowe</h4>    

                    <div class="fields">
                        <?php $i=1;foreach($product->field as $name => $value): ?>
                        <div class="field row">
                            <div class="col-xs-3"><input type="text" name="afield-<?= $i ?>" id="fafield-<?= $i ?>" class="form-control input-sm" placeholder="Nazwa pola #1" value="<?= $name ?>" /></div>
                            <div class="col-xs-8"><input type="text" name="afieldw-<?= $i ?>" id="fafieldw-<?= $i ?>" class="form-control input-sm" placeholder="Wartość #1" value="<?= $value ?>" /></div>
                        </div>
                        <?php $i++;endforeach; ?>
                        
                    </div>

                    <span id="add_field" class="btn btn-sm btn-info">Dodaj pole</span> <span id="delete_field" class="btn btn-sm btn-danger">X</span>
                </div>
                
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <a href="/admin/store"><span class="btn btn-default">Wróc</span></a>
                <button type="submit" class="btn btn-info pull-right">Zaktualizuj</button>
            </div>
            </form>
        </div>
        

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
