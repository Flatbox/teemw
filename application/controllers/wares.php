<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Wares extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		// Not logged in -> Redirect to login
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}
	}

	function showGoods() {
		$data['boxes'] = $this->goodsmodel->get_all_boxes();
		$data['pallets'] = $this->goodsmodel->get_all_pallets();
		$data['passengers'] = $this->goodsmodel->get_all_passengers();
		$this->load->view('wares/goods_selector', $data);
	}

	function displayWareById($id){
		$data = $this->waresmodel->get_wares_by_id($id);
		$this->load->view('wares\displaytop', $data);
		$this->load->view('wares\content', $data);
	}
	function displayWare($id){
		$data = $this->waresmodel->get_wares_by_id($id);
		$this->load->view('wares\display', $data);
	}
}
