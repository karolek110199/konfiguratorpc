<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="content" class="main-section">
    <div class="container">
        
        <form method="POST" action="<?= base_url('buy/summary'); ?>" class="col s12">
            
            <?php if(isset($continue)) { echo '<h4>Dokończ swoje zamówienie!</h4>'; } ?>
            
            <h3>Twoje dane</h3>
            
            <div class="row item">
                <div class="input-field col s12 m6">
                    <input id="first_name" name="first_name" type="text" class="validate" value="<?= set_value('first_name') ?>" required="" />
                    <label for="first_name">Imię</label>
                    <?= show_form_error('first_name') ?>
                </div>
                <div class="input-field col s12 m6">
                    <input id="last_name" name="last_name" type="text" class="validate" value="<?= set_value('last_name') ?>" required="" />
                    <label for="last_name">Nazwisko</label>
                    <?= show_form_error('last_name') ?>
                </div>
            </div>
            <div class="row item">
                <div class="input-field col s12 m6">
                    <input id="email" name="email" type="email" class="validate" value="<?= set_value('email') ?>" required="" />
                    <label for="email">E-mail</label>
                    <?= show_form_error('email') ?>
                </div>
                <div class="input-field col s12 m6">
                    <input id="telephone" name="telephone" type="text" class="validate" value="<?= set_value('telephone') ?>" required="" />
                    <label for="telephone">Telefon</label>
                    <?= show_form_error('telephone') ?>
                </div>
            </div>
            <div class="row item">
                <div class="input-field col s12 m6">
                    <input id="adress" name="adress" type="text" class="validate" value="<?= set_value('adress') ?>" required="" />
                    <label for="adress">Adres</label>
                    <?= show_form_error('adress') ?>
                </div>
                <div class="input-field col s12 m6">
                    <input id="city" name="city" type="text" class="validate" value="<?= set_value('city') ?>" required="" />
                    <label for="city">Miejscowość</label>
                    <?= show_form_error('city') ?>
                </div>
            </div>
            <div class="row item">
                <div class="input-field col s12 m6">
                    <input id="postcode" name="postcode" type="text" class="validate" value="<?= set_value('postcode') ?>" required="" />
                    <label for="postcode">Kod pocztowy</label>
                    <?= show_form_error('postcode') ?>
                </div>
                <div class="col s12 m6">
                    <label>Kraj</label>
                    <select id="country" name="country" class="browser-default">
                        <option value="Polska" selected>Polska</option>
                    </select>
                </div>
            </div>
            
            <h3 class="margin-top">Wysyłka i płatność</h3>
            
            <div class="row item">
                <div class="col s12 m6">
                    <label>Metoda wysyłki</label>
                    <select id="shipment" name="shipment" class="browser-default">
                        <option value="0" selected>Przesyłka kurierska - płatność z góry</option>
                    </select>
                </div>
                <div class="col s12 m6">
                    <label>Sposób płatności</label>
                    <select id="payment" name="payment" class="browser-default">
                        <option value="2" selected>Płatność internetowa Dotpay</option>
                        <option value="0">Tradycyjny przelew bankowy</option>
                    </select>
                </div>
            </div>
            
            <h3 class="margin-top">Dodatkowe informacje</h3>
             
            <div class="row item">
                <div class="input-field col s12 m12">
                    <textarea id="message" name="message" class="materialize-textarea"><?= set_value('message') ?></textarea>
                    <label for="message">Uwagi do zamówienia</label>
                </div>
            </div>
            
            <div class="row item">
                <input type="checkbox" id="terms" name="terms" required="" />
                <label for="terms">Przeczytałem i zgadzam się z <a href="<?= base_url('regulamin#content') ?>" target="_blank">regulaminem</a>.</label>
                <br /><?= show_form_error('terms') ?>
            </div>
            
            <div class="row center">
                <input type="submit" name="submit" value="PODSUMOWANIE" class="button" />
            </div>
             
            
        </form>
        
        
    </div>
</section>
