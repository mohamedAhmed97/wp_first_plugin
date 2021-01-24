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
        $this->template = new TemplateController();
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
                'callback' => array($this->template, "customTaxonomiesTemplate")
            ],
        );
    }
    public function register()
    {
        $this->setSettings();
        $this->setSections();
        $this->setFields();
        
        $this->settings->addPages($this->pages)
            ->withSubpage('Dashboard')
            ->addSubPages($this->sub_menu)
            ->register();
    }

    public function pageTemplate()
    {
        require_once $this->plugin_path . "/templates/school.php";
    }

    public function setSettings()
	{
		$args = array(
			array(
				'option_group' => 'alecaddd_options_group',
				'option_name' => 'text_example',
				'callback' => array( $this->template, 'alecadddOptionsGroup' )
			),
			array(
				'option_group' => 'alecaddd_options_group',
				'option_name' => 'first_name'
			)
		);

		$this->settings->setSettings( $args );
	}

	public function setSections()
	{   
		$args = array(
			array(
				'id' => 'first_admin_index',
				'title' => 'Settings',
				'callback' => array( $this->template, 'alecadddAdminSection' ),
				'page' => 'first_plugin'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		$args = array(
			array(
				'id' => 'text_example',
				'title' => 'Text Example',
				'callback' => array( $this->template, 'firstTextExample' ),
				'page' => 'first_plugin',
				'section' => 'first_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
			),
			array(
				'id' => 'first_name',
				'title' => 'First Name',
				'callback' => array( $this->template, 'firstFirstName' ),
				'page' => 'first_plugin',
				'section' => 'first_admin_index',
				'args' => array(
					'label_for' => 'first_name',
					'class' => 'example-class'
				)
			)
		);

		$this->settings->setFields( $args );
	}
}
