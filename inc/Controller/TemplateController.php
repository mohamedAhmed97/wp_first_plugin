<?php

namespace Inc\Controller;
use Inc\Controller\BaseController;
class TemplateController extends BaseController
{

    public function cptTemplate()
    {
        require_once $this->plugin_path . "/templates/cpt.php";
    }

    public function customTaxonomiesTemplate()
    {
        require_once $this->plugin_path . "/templates/customTaxonomies.php";
    }
}
