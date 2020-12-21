<?php

namespace Inc\Pages;

use \Inc\Controller\BaseController;
use \Inc\API\SettingsApi;
use \Inc\Controller\TemplateController;
class Admin extends BaseController
{
    public $settings;
    public $template;
    public $page = array();
    public $sub_menu = array();
    public function __construct()
    {
        parent::__construct();
        $this->settings = new SettingsApi();
        $this->template=new TemplateController();
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
                'callback' =>  array($this->template, "cptTemplate"),
            ],
            [
                'parent_slug' => "first_plugin",
                'page_title' => "Custom taxonomies",
                'menu_title' => "taxonmies",
                'capability' => "manage_options",
                'menu_slug' => "first_plugin_tax",
                'callback' =>array($this->template, "customTaxonomiesTemplate")
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
