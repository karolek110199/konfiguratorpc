<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="content" class="main-section">
    <div class="container">
        <h1>Wybierz procesor:<span class="underline"></span></h1>

        <div id="choose-processor" class="row">

            <div class="col s12 m3 offset-m2 center">
                <h2>INTEL</h2>
                <div class="item">
                    <div class="filter"><a href="<?= base_url('konfigurator#content') ?>"><span>Przejdź<br />dalej</span></a></div>
                    <img src="<?= base_url($img_dir) ?>intel.jpg" alt="INTEL" />
                </div>
                Platforma wybierana przede wszystkim przez graczy...
            </div>

            <div class="col s12 m3 offset-m2 center">
                <h2>AMD</h2>
                <div class="item">
                    <div class="filter"><a href="<?= base_url('konfigurator#content') ?>"><span>Przejdź<br />dalej</span></a></div>
                    <img src="<?= base_url($img_dir) ?>amd.jpg" alt="AMD" />
                </div>
                Nic nie może się równać z potęgą AMD podczas pracy...
            </div>

        </div>

        <div id="askforhardware" class="center">
            <h3>Nie wiesz co wybrać?<span class="underline"></span></h3>
            <p class="font-18">Napisz do nas! Powiedz czego potrzebujesz i jakie są Twoje wymagania, a my dobierzemy specjalnie dla Ciebie najlepszy zestaw!</p>
            <div class="center"><a class="button" href="#">ZAPYTAJ O SPRZĘT</a></div>
        </div>

    </div>
</section>

<?php $this->load->view('parts/counter'); ?>

<?php $this->load->view('parts/howitwork'); ?>
