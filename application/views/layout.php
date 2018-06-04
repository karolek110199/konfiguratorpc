<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <title><?= $title ?></title>
	
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<link rel="shortcut icon" type="image/ico" href="<?= base_url() ?>favicon.ico" />
	
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="<?= base_url($css_dir) ?>materialize.min.css"  media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?= base_url($css_dir) ?>main.css"  />
    <?php $this->template->render_css(); ?>
    
</head>
<body>
    <nav id="main-nav">
        <div class="container">
            <a href="<?= base_url() ?>" class="left logo">Konfigurator PC</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="<?= base_url() ?>">Strona główna</a></li>
                <li><a href="<?= base_url('konfigurator') ?>">Konfigurator</a></li>
                <li><a href="<?= base_url('about') ?>">O projekcie</a></li>
                <li><a href="<?= base_url('opinions') ?>">Opinie</a></li>
                <li><a href="<?= base_url('faq') ?>">FAQ</a></li>
                <li><a href="<?= base_url('contact') ?>">Kontakt</a></li>
            </ul>
            <div id="show_mobile_nav" class="right hide-on-large-only">
                <i class="large material-icons">apps</i>
            </div>
            <ul id="mobile_nav" class="sidenav sidenav-fixed">
                <li><a href="<?= base_url() ?>">Strona główna</a></li>
                <li><a href="<?= base_url('konfigurator') ?>">Konfigurator</a></li>
                <li><a href="<?= base_url('about') ?>">O projekcie</a></li>
                <li><a href="<?= base_url('opinions') ?>">Opinie</a></li>
                <li><a href="<?= base_url('faq') ?>">FAQ</a></li>
                <li><a href="<?= base_url('contact') ?>">Kontakt</a></li>
            </ul>
        </div>
    </nav>
	
    <header id="main-header">
        <div id="header-content" class="container">

            <h1>Z nami złożysz swoj wymarzony komputer!</h1>
            <h2>Gotowe komputery w dowolnej konfiguracji z systemem do Twojego domu</h2>
            <div class="center"><a class="button button-white" href="<?= base_url('konfigurator#content') ?>">ŻŁÓŻ KOMPUTER</a></div>

        </div>
        <a id="scroll-down" class="scroll-down animated infinite bounce" href="#content"></a>
    </header>
    
    <?php $this->load->view($content); ?>

    <footer>
        <div class="scroll-up"><a href="#main-nav"><img src="<?= base_url($img_dir) ?>scroll-down.png" alt="Skocz do góry"></a></div>
        <div class="container">

            <hr>
            <span class="copyright">&copy; Copyright 2018 by <a href="<?= base_url() ?>">KonfiguratorPC.pl</a></span>
        </div>
    </footer>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="<?= base_url($js_dir) ?>materialize.min.js"></script>
    <script type="text/javascript" src="<?= base_url($js_dir) ?>jquery.counterup.min.js"></script>

    <?php $this->template->render_javascripts(); ?>
    
    <script type="text/javascript">
        jQuery(document).ready(function($) {

            if($(window).height() > 550) {
                $('#main-header').css('min-height', $(window).height()-100 +"px");
            }

            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });

            $('#show_mobile_nav').on('click', function() {
                $('#mobile_nav').toggleClass('show');
            });

            $('#mobile_nav a').on('click', function() {
                $('#mobile_nav').removeClass('show');
            });
            
        });
    </script>
	
</body>
</html>
