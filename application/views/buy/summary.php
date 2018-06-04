<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="content" class="main-section">
    <div class="container">
        <div class="row">
        
            <form method="POST" action="<?= base_url('buy/buy'); ?>" class="col s12">
               
                <div class="row">
                    <div class="col s12 m6 font-18">
                        <h3 class="margin-bottom">Podsumowanie zamówienia</h3>
                        
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
                                foreach($hardware as $name => $id) {
                                    if(is_array($id)) {
                                        foreach($id as $key => $idd) {
                                            echo '<tr><td><span class="bold">'.$this->StoreModel->PARTS_NAME[$name].':</span></td><td>'.$this->StoreModel->getProductName($idd).'</td><td class="right-align">'.number_format($this->StoreModel->getProductPrice($idd), 2, '.', ' ').'</td></tr>';
                                        }
                                    }else{
                                        echo '<tr><td><span class="bold">'.$this->StoreModel->PARTS_NAME[$name].':</span></td><td>'.$this->StoreModel->getProductName($id).'</td><td class="right-align">'.number_format($this->StoreModel->getProductPrice($id), 2, '.', ' ').'</td></tr>';
                                    }
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
                    <input type="checkbox" id="terms" name="terms" required="" />
                    <label for="terms">Potwierdzam poprawność danych, akceptuję <a href="<?= base_url('regulamin#content') ?>" target="_blank">regulamin</a> i zobowiązuje się do zapłaty.</label>
                </div>

                <div class="row center">
                    <input type="submit" value="ZAMAWIAM I PŁACĘ" class="button" />
                </div>
            </form>
        
        </div>
    </div>
</section>
