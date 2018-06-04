<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['template_settings_file'] = 'konfigurator/template';

$config['order_status'] = array(
    0 => 'Nowe',
    1 => 'Oczekuje na płatność',
    2 => 'W trakcie dokonywania płatności',
    3 => 'Opłacone',
    4 => 'W trakcie realizacji',
    5 => 'Gotowe do wysyłki',
    6 => 'Wysłane',
    7 => 'Zrealizowane',
    8 => 'Anulowane'
);

$config['payment_method'] = array(
    0 => 'Przelew tradycyjny',
    1 => 'Płatności internetowe PayU',
    2 => 'Płatności internetowe Dotpay',
    3 => 'Płatność przy odbiorze'
);

$config['shipment_method'] = array(
    0 => 'Przesyłka kurierska - płatność z góry',
    1 => 'Przesyłka kurierska - płatność przy odbiorze',
    2 => 'Przesykła pocztowa - płatność z góry',
    3 => 'Paczkomat 24/7'
);
