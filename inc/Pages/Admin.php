<?php

namespace Inc\Pages;

use \Inc\Controller\BaseController;
use \Inc\API\SettingsApi;

class Admin extends BaseController
{
    public $settings;
    public $page = array();
    public function __construct()
    {
        parent::__construct();
        $this->settings = new SettingsApi();
        $this->pages = array(
            [
                'page_title' => "schools",
                'menu_title' => "school",
                'capability' => "manage_options",
                'menu_slug' => "first_plugin",
                'callable' => array($this, "pageTemplate"),
                'icon_url' => "dashicons-admin-home"
            ]
        );
    }
    public function register()
    {
        $this->settings->addPages($this->pages)->register();
    }

    public function pageTemplate()
    {
        require_once $this->plugin_path . "/templates/school.php";
    }
}
