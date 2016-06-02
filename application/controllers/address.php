<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Address extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		// Not logged in -> Redirect to login
		if (!$this->tank_auth->is_logged_in()) {
				redirect('');
		}
	}

	// Function called by the autocomplete jquery plugin to
	// get cities by postcode
  function get_cities_by_postcode(){
		if (isset($_GET['term'])){
			$q = strtolower($_GET['term']);
			$this->citiesmodel->get_cities_by_postcode($q);
		}
	}
}
