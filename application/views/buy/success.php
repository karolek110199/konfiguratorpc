<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="content" class="main-section">
    <div class="container center">
        
        <h3>Dziękujemy za zamówienie! Możesz teraz dokonać płatności!</h3>
        
        <?php if($payment == 0): ?>
            <div class="row center font-18">
                <h5>Dane do przelewu:</h5>
                Konfigurator PC<br />
                ul....
                <br /><br />
            </div>
        <?php endif; ?>

        <?php if($payment == 2): ?>
            <div class="row center">
                <a href="<?= base_url('buy/pay?orderid='.$order_id) ?>"><img src="<?= base_url($img_dir) ?>dotpay_b2.gif" alt="Zapłać z Dotpay" /></a>
            </div>
        <?php endif; ?>
        
    </div>
</section>
