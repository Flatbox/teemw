<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Offer extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		// Not logged in -> Redirect to login

		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

	}

	function showValideRequest()
	{
		$allRequest = $this->requestmodel->getValideRequest();

					$this->load->view('request/show',$requestData);

		$this->load->library('../controllers/wares');
		foreach ($allRequest as  $requestData) {
			unset($requestData['owner']);
			$requestData['departure_loc'] = $this->citiesmodel->get_adress_by_id($requestData['departure_loc']);
			$requestData['arrival_loc'] = $this->citiesmodel->get_adress_by_id($requestData['arrival_loc']);

			$requestData['mode'] = 'BROOKERS';

			$this->load->view('request/show',$requestData);

			$this->wares->displayWareById($requestData['wares']);
		}
	}
	function anserToRequest($id){

		$this->output->enable_profiler(true);

		//-----------------------POPULATE REQUEST INFOS----------------
		$requestData = $this->requestmodel->getRequestById($id);
		unset($requestData['owner']);
		$requestData['departure_loc'] = $this->citiesmodel->get_adress_by_id($requestData['departure_loc']);
		$requestData['arrival_loc'] = $this->citiesmodel->get_adress_by_id($requestData['arrival_loc']);

		$this->load->library('../controllers/wares');
		$this->wares->displayWareById($requestData['wares']);


		//$this->load->view('request\show',$requestData);


		//----------------------control form--------------------------

		$this->form_validation->set_rules('price', 'price', 'required');

		//-------------------TREATMENT-------------------------------
		if ($this->form_validation->run() == FALSE)
		{

			$this->load->view('offer\offer_form',$requestData);

		}
		else {
			/*
			$owner = $this->session->userdata('user_id');
			$request = $id;
			$price = $this->input->post('price');
			$this->offermodel->createOffer($owner, $request, $price);
			*/

			$insert = array(
				'owner'  => $this->session->userdata('user_id'),
				'request'  =>  $id,
				'price'  => $this->input->post('price')
			);

			//--------------DEPARTURE LOC---------------------
			if(
			($requestData['departure_loc']['city_id'] == $this->input->post('dep_city_id'))
			AND ($requestData['departure_loc']['line1'] == $this->input->post('dep_add_1'))
			AND ($requestData['departure_loc']['line2'] == $this->input->post('dep_add_2'))
			){
				$insert['departure_loc'] = $requestData['departure_loc'];
			}else {
				$insert['departure_loc'] = $this->citiesmodel->create_address($this->input->post('dep_city_id'), $this->input->post('dep_add_1'), $this->input->post('dep_add_2'));
			}

			if(
			($requestData['arrival_loc']['city_id'] == $this->input->post('arr_city_id'))
			AND ($requestData['arrival_loc']['line1'] == $this->input->post('arr_add_1'))
			AND ($requestData['arrival_loc']['line2'] == $this->input->post('dep_add_2'))
			){
				$insert['arrival_loc'] = $requestData['arrival_loc'];
			}else {
				$insert['arrival_loc'] = $this->citiesmodel->create_address($this->input->post('arr_city_id'), $this->input->post('arr_add_1'), $this->input->post('dep_add_2'));
			}
			$this->offermodel->createOfferArray($insert);
			redirect((base_url() . 'offer/showValideRequest'));
		}


	}
}
