<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('get_order_status'))
{
    function get_order_status($status_num, $config)
    {
        return (!isset($config[$status_num])) ? 'Nieznany' : $config[$status_num];
    }
}

if(!function_exists('get_order_shipment'))
{
    function get_order_shipment($num, $config)
    {
        return (!isset($config[$num])) ? 'Nieznany typ dostawy' : $config[$num];
    }
}

if(!function_exists('get_order_payment'))
{
    function get_order_payment($num, $config)
    {
        return (!isset($config[$num])) ? 'Nieznany typ płatności' : $config[$num];
    }
}
