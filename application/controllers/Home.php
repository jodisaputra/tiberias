<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('JadwalIbadah_model');
		$this->load->model('DetailJadwalIbadah_model');
		$this->load->model('DaftarIbadah_model');
	}

	private function load_template($view, $data = null)
	{
		$this->load->view('template_frontend/header');
		$this->load->view($view,$data);
		$this->load->view('template_frontend/footer');	
	}

	public function index()
	{
		$jadwal = $this->JadwalIbadah_model->list();
		$html = '';

		foreach($jadwal as $j)
		{
			$sub_jadwal = $this->DetailJadwalIbadah_model->list($j->jd_id);

			foreach($sub_jadwal as $s)
			{
				$jadwal_id = $j->jd_id;
				$sesi_id = $s->sjd_sesi;
				$cabang_id = $s->sjd_cabang;
				$subjadwal_id = $s->sjd_id;

				$nama_cabang = '';

				if($s->sjd_cabang == 1)
                {
                	$nama_cabang = 'Tiberias Imperium';
                }
                else
                {
                	$nama_cabang = 'Tiberias Tembesi';
                }

				$link = base_url('DaftarIbadah/daftar/' . $jadwal_id. '/' . $subjadwal_id . '/' . $cabang_id . '/' . $sesi_id);
				$nama_button = $s->ss_namasesi . ' - ' . $nama_cabang;
				$nama_button_full = $s->ss_namasesi . ' - ' . $nama_cabang . ' Sudah Penuh';
 					
 				// class button

				if($s->sjd_sesi == 1) 
				{ 
					$class_button = 'btn-primary btn-sm mb-2'; 
				} 
				elseif($s->sjd_sesi == 2) 
				{ 
					$class_button = 'btn-info btn-sm mb-2'; 
				} 
				else 
				{ 
					$class_button = 'btn-warning btn-sm mb-2'; 
				}

				// cek total jemaat

				$get = $this->DaftarIbadah_model->get($s->sjd_jadwal, $s->sjd_sesi, $s->sjd_cabang);

				// header('content-type: application/json');
				// echo json_encode($get);
				// die;

				// if($get['sjd_kapasitas'] == 0)
				// {
				// 	$html .= "<a href='' class='btn btn-danger btn-sm mb-2'>$nama_button_full</a><br>";
				// }
				// else
				// {
					$html .= "<a href='$link' class='btn $class_button'>$nama_button</a><br>";
				// }
			}

		}


		$data = [
			'jadwal' => $jadwal,
			'html' => $html
		];
		$this->load_template('index', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */