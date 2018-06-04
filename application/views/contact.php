<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="content" class="main-section">
    <div class="container">
        <div class="row">
            <div class="col s12 m6">
                <h3>Wyślij do nas wiadomość</h3>
                <br /><br />
                <form method="POST">
                    <?php 
                    if($error) { echo '<span class="form_error">Wypełnij poprawnie wszystkie pola formularzu.</span>'; }
                    if($sended) { echo '<h6>Wiadomość została wysłana! Dziękujemy!</h6>'; }
                    ?>
                    <div class="input-field">
                        <input id="fname" name="name" type="text" class="validate" value="<?= set_value('name') ?>" required="" />
                        <label for="name">Twoje imię i nazwisko</label>
                        <?= show_form_error('name') ?>
                    </div>
                    <div class="input-field">
                        <input id="femail" name="email" type="email" class="validate" value="<?= set_value('email') ?>" required="" />
                        <label for="email">Twój email</label>
                        <?= show_form_error('email') ?>
                    </div>
                    <div class="input-field">
                        <input id="ftitle" name="title" type="text" class="validate" value="<?= set_value('title') ?>" required="" />
                        <label for="title">Tytuł wiadomości</label>
                        <?= show_form_error('title') ?>
                    </div>
                    <div class="input-field">
                        <textarea id="message" name="message" class="materialize-textarea" style="min-height: 6rem;"><?= set_value('message') ?></textarea>
                        <label for="message">O czym chcesz napisać?</label>
                    </div>
                    <div class="center">
                        <input type="submit" name="submit" value="WYŚLIJ WIADOMOŚĆ" class="button" />
                    </div>
                </form>

            </div>
            <div class="col s12 m6 right-align">
                <h3>Dane kontaktowe</h3>
                <br /><br />
                KonfiguratorPC<br />
                ul. <br />
                00-116<br />
                Tel.: +48 555-555-555<br />
                E-mail: <br />
            </div>
        </div>
    </div>
</section>