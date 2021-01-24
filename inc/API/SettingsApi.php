<?php

namespace Inc\API;

class SettingsApi
{
    public $admin_page = array();
    public $admin_subpages = array();
    public $settings = array();
    public $sections = array();
    public $fields = array();

    public function register()
    {
        if (!empty($this->admin_page)) {
            add_action("admin_menu", array($this, "addAdminMenu"));
        }

        if ( !empty($this->settings) ) {
			add_action( 'admin_init', array( $this, 'registerCustomFields' ) );
		}
    }
    public function addPages(array $pages)
    {
        $this->admin_page = $pages;
        return $this;
    }

    #with subpage function which add subpage
    public function withSubpage(string $title = null)
    {
        if (empty($this->admin_page)) {
            return $this;
        }
        $admin_page = $this->admin_page[0];

        $sub_page = array(
            [
                'parent_slug' => $admin_page["menu_slug"],
                'page_title' => $admin_page["page_title"],
                'menu_title' => ($title) ? $title : $admin_page["menu_title"],
                'capability' => $admin_page["capability"],
                'menu_slug' => $admin_page["menu_slug"],
                'callback' => $admin_page["callback"]

            ],
        );
        $this->admin_subpages = $sub_page;
        return $this;
    }

    #add subPage
    public function addSubPages(array $pages)
    {
        $this->admin_subpages = array_merge($this->admin_subpages, $pages);
        return $this;
    }


    public function setSettings( array $settings )
	{
		$this->settings = $settings;

		return $this;
	}

	public function setSections( array $sections )
	{
		$this->sections = $sections;

		return $this;
	}

	public function setFields( array $fields )
	{
		$this->fields = $fields;

		return $this;
	}

    #functions looping for admin&subadmin pages
    public function addAdminMenu()
    {
        foreach ($this->admin_page as $page) {
            add_menu_page(
                $page['page_title'],
                $page['menu_title'],
                $page['capability'],
                $page['menu_slug'],
                $page['callable'],
                $page['icon_url']
            );
        }

        foreach ($this->admin_subpages as $page) {
            add_submenu_page(
                $page['parent_slug'],
                $page['page_title'],
                $page['menu_title'],
                $page['capability'],
                $page['menu_slug'],
                $page['callback'],

            );
        }
    }

    public function registerCustomFields()
	{
		// register setting
		foreach ( $this->settings as $setting ) {
			register_setting( $setting["option_group"], $setting["option_name"], ( isset( $setting["callback"] ) ? $setting["callback"] : '' ) );
		}

		// add settings section
		foreach ( $this->sections as $section ) {
			add_settings_section( $section["id"], $section["title"], ( isset( $section["callback"] ) ? $section["callback"] : '' ), $section["page"] );
		}

		// add settings field
		foreach ( $this->fields as $field ) {
			add_settings_field( $field["id"], $field["title"], ( isset( $field["callback"] ) ? $field["callback"] : '' ), $field["page"], $field["section"], ( isset( $field["args"] ) ? $field["args"] : '' ) );
		}
	}
}
