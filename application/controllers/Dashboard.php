<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('message', 'Login terlebih dahulu');
	        $this->session->set_flashdata('tipe', 'error');
	        redirect(base_url('Login'));  
		}
	}

	private function load_template($view, $data = null)
	{
		$this->load->view('template_backend/header');
		$this->load->view($view,$data);
		$this->load->view('template_backend/footer');	
	}

	public function index()
	{
		$this->load_template('admin/index');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */