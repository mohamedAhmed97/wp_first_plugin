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
            add_action("admin_menu", array($this, "adminPage"));
        }

        public function adminPage()
        {
            add_menu_page(
                "schools",
                "school",
                "manage_options",
                "first_plugin",
                array($this,"pageTemplate"),
                "dashicons-admin-home"
            );
        }
        #active
        public function active()
        {
            require_once plugin_dir_path(__FILE__) . "/inc/first_active.php";
            FirstActive::active();
        }

        public function deactive()
        {
            require_once plugin_dir_path(__FILE__) . "/inc/first_deactive.php";
            FirstDeactive::deactive();
        }
    }

    $firstPlugin = new FirstPlugin();
    #register active
    register_activation_hook(__FILE__, array($firstPlugin, 'active'));
    #register deactive
    register_deactivation_hook(__FILE__, array($firstPlugin, 'deactive'));
}
