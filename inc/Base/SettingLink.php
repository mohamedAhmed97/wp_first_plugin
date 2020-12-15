<?php

namespace Inc\Base;

use \Inc\Controller\BaseController;

class SettingLink extends BaseController
{
    public function register()
    {
        add_filter("plugin_action_links_$this->plugin_name", array($this, 'settingLink'));
    }

    public function settingLink($links)
    {
        $setting_link = '<a href="admin.php?page=first_plugin">setting</a>';
        array_push($links, $setting_link);
        return $links;
    }
}
