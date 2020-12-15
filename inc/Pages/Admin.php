<?php

namespace Inc\Pages;
use \Inc\Controller\BaseController;
class Admin extends BaseController
{
    public function register()
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
            array($this, "pageTemplate"),
            "dashicons-admin-home"
        );
    }

    public function pageTemplate()
    {
        require_once $this->plugin_path."/templates/school.php";
    }
}
