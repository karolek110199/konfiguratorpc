<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('show_form_error'))
{
    function show_form_error($name)
    {
        if(isset($_SESSION['error_msg'][$name])) echo '<span class="form_error">'.$_SESSION['error_msg'][$name].'</span>';
    }   
}

if(!function_exists('set_value'))
{
    function set_value($name)
    {
        if(isset($_SESSION['data'][$name])) echo $_SESSION['data'][$name];
    }   
}
