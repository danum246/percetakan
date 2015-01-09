<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('session_logged') != TRUE) {
		 	$this->load->view('login');
		 }
	}

	function index()
	{
		$data['page'] = 'home';
		$this->load->view('template',$data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */