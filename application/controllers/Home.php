<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('JadwalIbadah_model');
		$this->load->model('DetailJadwalIbadah_model');
	}

	private function load_template($view, $data = null)
	{
		$this->load->view('template_frontend/header');
		$this->load->view($view,$data);
		$this->load->view('template_frontend/footer');	
	}

	public function index()
	{
		$data = [
			'jadwal' => $this->JadwalIbadah_model->list()
		];
		$this->load_template('index', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */