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

    public function alecadddOptionsGroup( $input )
	{
		return $input;
	}

	public function alecadddAdminSection()
	{
		echo 'Check this beautiful section!';
	}

	public function firstTextExample()
	{
		$value = esc_attr( get_option( 'text_example' ) );
		echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something Here!">';
	}

	public function firstFirstName()
	{
		$value = esc_attr( get_option( 'first_name' ) );
		echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write your First Name">';
	}
}
