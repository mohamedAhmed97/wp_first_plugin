<?php

namespace Inc\API;

class SettingsApi
{
    public $admin_page = array();

    public function register()
    {
        if (!empty($this->admin_page)) {
            add_action("admin_menu", array($this, "addAdminMenu"));
        }
    }
    public function addPages(array $pages)
    {
        $this->admin_page = $pages;
        return $this;
    }

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
    }
}
