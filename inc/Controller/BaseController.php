<?php

namespace Inc\Controller;

class BaseController
{
    protected $plugin_path;
    protected $plugin_name;
    public function __construct()
    {
        $this->plugin_name = plugin_basename(dirname(__FILE__, 3)."/first_plugin.php");
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
    }
}
/* define("plugin_path", plugin_dir_path(__FILE__));
define("plugin_name",plugin_basename(__FILE__)); */