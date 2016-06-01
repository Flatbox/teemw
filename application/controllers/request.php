<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Request extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		// Not logged in -> Redirect to login
		if (!$this->tank_auth->is_logged_in()) {
		//	redirect('');
		}
	}

	function fillRequest() {
		$this->load->view('request/request_form');
	}

	function createRequest() {
		$this->output->enable_profiler(true);
		$this->form_validation->set_rules('exp_date', 'date d\'expiration', 'trim|required|date');
//<<<<<<< HEAD
//=======
		$this->form_validation->set_rules('dep_add_1', 'adresse de départ ligne 1', 'required');
		$this->form_validation->set_rules('dep_city', 'ville de départ', 'required');
		$this->form_validation->set_rules('dep_start', 'date départ début', 'trim|required|date');
		$this->form_validation->set_rules('dep_end', 'date départ fin', 'trim|required|date');
		$this->form_validation->set_rules('arr_add_1', 'adresse d\'arrivée ligne 1', 'required');
		$this->form_validation->set_rules('arr_city', 'ville d\'arrivée', 'required');
		$this->form_validation->set_rules('arr_start', 'date d\'arrivée début', 'trim|required|date');
		$this->form_validation->set_rules('arr_end', 'date d\'arrivée fin', 'trim|required|date');
		$this->form_validation->set_rules('wares_created', 'sélection marchandises', 'required');
//>>>>>>> origin/master

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('request/request_form');
		}
		else {
			$values = $this->session->userdata('wares');
			$owner = $this->session->userdata('user_id');

			$wares_name = $this->session->userdata('wares_name');
			$wares_desc = $this->session->userdata('wares_desc');
			$wares_id = $this->waresmodel->createWare($wares_name, $wares_desc, $values);

			$expiration_date = $this->input->post('exp_date');
			$expiration_date = date_create_from_format('j-m-Y', $expiration_date);
			$expiration_date = date_format($expiration_date, 'Y-m-d');
			$expiration_date = $expiration_date . " " . $this->input->post('exp_hour') . ":" . $this->input->post('exp_minutes') . ":" . "00";

			$departure_id = $this->citiesmodel->create_address($this->input->post('dep_city_id'), $this->input->post('dep_add_1'), $this->input->post('dep_add_2'));

			$departure_start = $this->input->post('dep_start');
			$departure_start = date_create_from_format('j-m-Y', $departure_start);
			$departure_start = date_format($departure_start, 'Y-m-d');
			$departure_start = $departure_start . " " . $this->input->post('dep_start_hour') . ":" . $this->input->post('dep_start_minutes') . ":" . "00";

			$departure_end = $this->input->post('dep_end');
			$departure_end = date_create_from_format('j-m-Y', $departure_end);
			$departure_end = date_format($departure_end, 'Y-m-d');
			$departure_end = $departure_end . " " . $this->input->post('dep_end_hour') . ":" . $this->input->post('dep_end_minutes') . ":" . "00";

			$arrival_id = $this->citiesmodel->create_address($this->input->post('arr_city_id'), $this->input->post('arr_add_1'), $this->input->post('arr_add_2'));

			$arrival_start = $this->input->post('arr_start');
			$arrival_start = date_create_from_format('j-m-Y', $arrival_start);
			$arrival_start = date_format($arrival_start, 'Y-m-d');
			$arrival_start = $arrival_start . " " . $this->input->post('arr_start_hour') . ":" . $this->input->post('arr_start_minutes') . ":" . "00";

			$arrival_end = $this->input->post('arr_end');
			$arrival_end = date_create_from_format('j-m-Y', $arrival_end);
			$arrival_end = date_format($arrival_end, 'Y-m-d');
			$arrival_end = $arrival_end . " " . $this->input->post('arr_end_hour') . ":" . $this->input->post('arr_end_minutes') . ":" . "00";

			$this->requestmodel->createRequest($owner, $wares_id, $expiration_date, $departure_id, $departure_start, $departure_end, $arrival_id, $arrival_start, $arrival_end);
		}
	}

	function createWare() {
		// Setting the validation rules
		$this->form_validation->set_rules('name', 'nom', 'required');
		$this->form_validation->set_rules('desc', 'description', 'required');

		// If the form isn't correctly filled
		if ($this->form_validation->run() == FALSE)
		{
			$data['boxes'] = $this->goodsModel->get_all_boxes();
			$data['pallets'] = $this->goodsModel->get_all_pallets();
			$data['passengers'] = $this->goodsModel->get_all_passengers();
			$this->load->view('wares/goods_selector', $data); // Re display the same view
		}
		else // If the form is corretly filled
		{
			// Get POST values from form
			$values = $this->input->post();

			// Extract name & description from data get throw the form
			$name = $values['name'];
			$desc = $values['desc'];

			// Unset unnecessary data
			unset($values['submit']);
			unset($values['name']);
			unset($values['desc']);

			// Unset unselected goods
			foreach ($values as $key => $value) {
				$length = strlen($value);
				if($length == 0) {
					unset($values[$key]);
				}
			}

			// // $this->waresModel->createWare($name, $desc, $values);
			$this->session->set_userdata('wares_created', true);
			$this->session->set_userdata('wares', $values);
			$this->session->set_userdata('wares_name', $name);
			$this->session->set_userdata('wares_desc', $desc);
			$this->load->view('request/request_form');
			// $this->fillRequest();
		}
	}

	function get_cities_by_postcode(){
		if (isset($_GET['term'])){
			$q = strtolower($_GET['term']);
			$this->citiesModel->get_cities_by_postcode($q);
		}
	}
function test(){
	$this->get_owner_information(2);
}

	function showRequestById($id){
		$requestData = $this->requestmodel->getRequestById($id);
		unset($requestData['owner']);
		$requestData['departure_loc'] = $this->citiesmodel->get_adress_by_id($requestData['departure_loc']);
		$requestData['arrival_loc'] = $this->citiesmodel->get_adress_by_id($requestData['arrival_loc']);


		$this->load->view('request\show',$requestData);
		$this->load->library('../controllers/wares');
		$this->wares->displayWareById($requestData['wares']);

	}

	function get_owner_information($owner) {
		$ownerData = $this->users->get_userName_by_id(2);

		$this->load->view('request\ownerInformation', $ownerData);
		$this->displayRequestByOwner($owner);
	}

	function displayRequestByOwner($owner){
		$data = $this->requestmodel->get_request_by_owner($owner);

		foreach($data as $key => $value){
		$data[$key]['nbrOffre'] = $this->offermodel->get_number_of_offer($data[$key]['id']);
		$data[$key]['wares'] = $this->waresmodel->get_wares_by_id($data[$key]['wares']);
		$data[$key]['departure_loc'] = $this->citiesmodel->get_adress_by_id($data[$key]['departure_loc']);
		$data[$key]['arrival_loc'] = $this->citiesmodel->get_adress_by_id($data[$key]['arrival_loc']);
		$this->load->view('request\list_element', $data[$key]);
	}
	}


}
