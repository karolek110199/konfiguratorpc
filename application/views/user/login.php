<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="content" class="main-section">
    <div class="container">
        
        <h3 class="center">Zaloguj się<span class="underline"></span></h3>

        <form method="POST" action="<?= base_url('user/login'); ?>" class="col s12">

            <div class="row item">
                <div class="input-field col s12 m6">
                    <input id="email" name="email" type="email" class="validate" value="<?= set_value('email') ?>" required="" />
                    <label for="email">Email</label>
                    <?= show_form_error('email') ?>
                </div>

                <div class="input-field col s12 m6">
                    <input id="password" name="password" type="password" class="validate" value="<?= set_value('password') ?>" required="" />
                    <label for="password">Hasło</label>
                    <?= show_form_error('password') ?>
                </div>
            </div>

            <div class="row center">
                <input type="submit" name="submit" value="ZALOGUJ SIĘ" class="button" />
            </div>

        </form>
    </div>
</section>
