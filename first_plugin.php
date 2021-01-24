<?php

/**
 * author:mohamed ahmed
 * version:1.0.0
 * author uri:https://facebook.com 
 * plugin Name:first
 * description:first plugin i will create >>>>>>
 */

if (!defined('ABSPATH')) {
    die;
}
#check for vender/autoload
if (file_exists(dirname(__FILE__) . "/vendor/autoload.php")) {
    require_once dirname(__FILE__) . "/vendor/autoload.php";
}

// function that runs when shortcode is called
function wpb_demo_shortcode()
{

    // Things that you want to do. 
    $message = 'Hello world!';

    // Output needs to be return
    return $message;
}
// register shortcode
add_shortcode('greeting', 'wpb_demo_shortcode');

use Inc;
use Inc\Active;
use Inc\Deactive;

function active()
{
    Active::active();
}
register_activation_hook(__FILE__, "active");

function deactive()
{
    Deactive::deactive();
}
register_deactivation_hook(__FILE__, 'deactive');

if (class_exists('Inc\\Init')) {
    Inc\Init::registerServices();
}
