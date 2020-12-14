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
use Inc\Active;
use Inc\Deactive;
if (!class_exists("FirstPlugin")) {
    class FirstPlugin
    {
        public $plugin_name;
        public function __construct()
        {
            $this->plugin_name = plugin_basename(__FILE__);
            add_action("admin_menu", array($this, "adminPage"));
            #add settings link
            add_filter("plugin_action_links_$this->plugin_name", array($this, "settingLink"));
        }

        public function adminPage()
        {
            add_menu_page(
                "schools",
                "school",
                "manage_options",
                "first_plugin",
                array($this, "pageTemplate"),
                "dashicons-admin-home"
            );
        }
        #settingLink
        public function settingLink($links)
        {
            $setting_link = '<a href="admin.php?page=first_plugin">settings</a>';
            array_push($links, $setting_link);
            return $links;
        }
        #pageTemplate
        public function pageTemplate()
        {
            require_once plugin_dir_path(__FILE__) . "templates/school.php";
        }
        #active
        public function active()
        {
           Active::active();
        }

        public function deactive()
        {
           Deactive::deactive();
        }
    }

    $firstPlugin = new FirstPlugin();
    #register active
    register_activation_hook(__FILE__, array($firstPlugin, 'active'));
    #register deactive
    register_deactivation_hook(__FILE__, array($firstPlugin, 'deactive'));
}
