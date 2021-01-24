<?php

namespace Inc\Base;

use \Inc\Controller\BaseController;

class ShortCode extends BaseController
{
    public function register()
    {
        add_shortcode("greeting_$this->plugin_name_short_code", array($this, 'setShortCode'));
    }

    public function setShortCode($atts)
    {
        ob_start();
        // Things that you want to do. 
        require ($this->plugin_path . "/templates/school.php");
        

        // return "<h1>H </h1>";
        $a = shortcode_atts( array(
            'foo' => 'something',
            'bar' => 'something else',
        ), $atts );
    
        return $a['foo'];
        // return ob_get_clean();
    }
}
