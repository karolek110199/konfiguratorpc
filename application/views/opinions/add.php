<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="content" class="main-section">
    <div class="container">

        <h3 class="center">Dodaj opinię<span class="underline"></span></h3>

        <form method="POST" action="<?= base_url('opinions/add') ?>">
            
            <div class="center">
                <?php if(isset($error)): ?>
                    <span class="form_error"><?= $error ?></span>
                <?php endif; ?>
            </div>

            <div class="row item">
                <div class="input-field col s12 m6 offset-m3">
                    <input id="name" name="name" type="text" class="validate" value="<?= set_value('name') ?>" required="" />
                    <label for="name">Imię i nazwisko/Pseudonim</label>
                    <?= show_form_error('name') ?>
                </div>
            </div>

           <div class="row item">
                <div class="input-field col s12 m6 offset-m3">
                    <textarea id="opinion" name="opinion" class="materialize-textarea"><?= set_value('opinion') ?></textarea>
                    <label for="opinion">Treść opinii</label>
                </div>
            </div>

            <div class="row item">
                <div id="rate" class="input-field col s12 m6 offset-m3" style="cursor:pointer;">
                <input id="inputrate" name="inputrate" type="hidden" value="5" />
                    <span style="font-size:24px;">Ocena:</span>
                    <?php for($i = 0; $i < 5; $i++): ?>
                        <i data-id="<?= $i ?>" class="material-icons star">star</i>
                    <?php endfor; ?>
                </div>
            </div>
 
            <div class="center"><input type="submit" name="submit" value="DODAJ OPINIĘ" class="button" /></div>
        </form>
    </div>
</section>

<?php $this->load->view('parts/counter'); ?>

<?php $this->load->view('parts/howitwork'); ?>
