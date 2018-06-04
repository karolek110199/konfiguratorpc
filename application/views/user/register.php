<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="content" class="main-section">
    <div class="container">
        
        <h3 class="center">Rejestracja konta<span class="underline"></span></h3>

        <form method="POST" action="<?= base_url('user/register'); ?>" class="col s12">
            
            <h3>Hasło</h3>

            <div class="row item">
                <div class="input-field col s12 m6">
                    <input id="password" name="password" type="password" class="validate" value="<?= set_value('password') ?>" required="" />
                    <label for="password">Hasło</label>
                    <?= show_form_error('password') ?>
                </div>
                <div class="input-field col s12 m6">
                    <input id="password_conf" name="password_conf" type="password" class="validate" value="<?= set_value('password_conf') ?>" required="" />
                    <label for="password_conf">Potwierdź hasło</label>
                    <?= show_form_error('password_conf') ?>
                </div>
            </div>
            
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
            
            <div class="row item">
                <input type="checkbox" id="terms" name="terms" required="" />
                <label for="terms">Przeczytałem i zgadzam się z <a href="<?= base_url('regulamin#content') ?>" target="_blank">regulaminem</a>.</label>
                <br /><?= show_form_error('terms') ?>
            </div>
            
            <div class="row center">
                <input type="submit" name="submit" value="ZAŁÓŻ KONTO" class="button" />
            </div>
             
            
        </form>
        
        
    </div>
</section>
