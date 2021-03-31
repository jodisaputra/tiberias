<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	private function load_template($view, $data = null)
	{
		$this->load->view('template_frontend/header');
		$this->load->view($view,$data);
		$this->load->view('template_frontend/footer');	
	}

	public function index()
	{
		$this->load_template('index');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */