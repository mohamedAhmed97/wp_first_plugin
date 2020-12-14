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

if (!class_exists("FirstPlugin")) {
    class FirstPlugin
    {
        public function __construct()
        {
            echo "hello";
        }

        public function active()
        {
            require_once plugin_dir_path(__FILE__)."/inc/first_active.php";
            FirstActive::active();
        }

        public function deactive()
        {
            require_once plugin_dir_path(__FILE__)."/inc/first_deactive.php";
            FirstDeactive::deactive();
        }

    }

    $firstPlugin=new FirstPlugin();


}
