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

use Inc;
use Inc\Active;
use Inc\Deactive;

define("plugin_path", plugin_dir_path(__FILE__));
define("plugin_name",plugin_basename(__FILE__));
function active()
{
    Active::active();
}
function deactive()
{
    Deactive::deactive();
}
if (class_exists('Inc\\Init')) {
    Inc\Init::registerServices();
}
register_activation_hook(__FILE__, "active");
register_deactivation_hook(__FILE__, 'deactive');
