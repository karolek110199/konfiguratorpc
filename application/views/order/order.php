<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="content" class="main-section">
    <div class="container">
        <div class="row">
        
            <div class="col s12">
               
                <div class="row">
                    <div class="col s12 m6 font-18">
                        <h3 class="margin-bottom">Podsumowanie zamówienia</h3>
                        
                        <span class="bold">Zamówienie numer: #<?= $id ?></span><br /><br />
                        
                        <span class="bold">Imię i nazwisko:</span> <?= $first_name.' '.$last_name ?><br />
                        <span class="bold">Adres:</span> <?= $adress.', '.$postcode.' '.$city ?><br />
                        <?= $country ?><br />
                        <span class="bold">E-mail:</span> <?= $email ?><br />
                        <span class="bold">Telefon:</span> <?= $telephone ?><br />
                        <br />
                       
                        <span class="bold">Wysyłka i płatność</span><br />
                        <?= $shipment_name ?><br />
                        <?= $payment_name ?><br />
                        
                        <br />
                        <span class="bold">Uwagi do zamówienia</span><br />
                        <?= ($message == '') ? 'Brak uwag' : $message ?>

                    </div>
                    <div class="col s12 m6">
                        <h3>Twoja konfiguracja</h3>
                        
                        <table>
                            <thead>
                                <tr><th>Część</th><th>Nazwa, model</th><th class="right-align">Cena brutto (PLN)</th></tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($hardware as $key => $part) {
                                    echo '<tr><td><span class="bold">'.$this->StoreModel->PARTS_NAME[$part['category']].':</span></td><td>'.$this->StoreModel->getProductName($part['part_id']).'</td><td class="right-align">'.number_format($part['price'], 2, '.', ' ').'</td></tr>';
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr><th colspan="2" class="right-align">Suma:</th><th class="right-align"><?= number_format($total_price, 2, '.', ' ') ?></th></tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                
                <div class="row center">
                    <h5>Łącznie do zapłaty: <?= number_format($total_price, 2, '.', ' ') ?> PLN</h5>
                </div>
                
                
                <div class="row center">
                     <h3 class="margin-bottom">Status: <?= $status_name ?></h3>
                </div>
                
                <?php if($status == 1): ?>
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
                            <a href="<?= base_url('buy/pay?orderid='.$id) ?>"><img src="<?= base_url($img_dir) ?>dotpay_b2.gif" alt="Zapłać z Dotpay" /></a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
               
            </div>
        
        </div>
    </div>
</section>
