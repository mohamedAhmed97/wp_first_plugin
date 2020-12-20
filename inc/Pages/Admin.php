<?php

namespace Inc\Pages;

use \Inc\Controller\BaseController;
use \Inc\API\SettingsApi;

class Admin extends BaseController
{
    public $settings;
    public $page = array();
    public $sub_menu = array();
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
        $this->sub_menu = array(
            [
                'parent_slug' => "first_plugin",
                'page_title' => "Custom post type",
                'menu_title' => "CPT",
                'capability' => "manage_options",
                'menu_slug' => "first_plugin_cpt",
                'callback' => function () {
                    echo "<h1>CPT</h1>";
                }
            ],
            [
                'parent_slug' => "first_plugin",
                'page_title' => "Custom taxonomies",
                'menu_title' => "taxonmies",
                'capability' => "manage_options",
                'menu_slug' => "first_plugin_tax",
                'callback' => function () {
                    echo "<h1>Tax</h1>";
                }
            ],
        );
    }
    public function register()
    {
        $this->settings->addPages($this->pages)
            ->withSubpage('Dashboard')
            ->addSubPages($this->sub_menu)
            ->register();
    }

    public function pageTemplate()
    {
        require_once $this->plugin_path . "/templates/school.php";
    }
}
