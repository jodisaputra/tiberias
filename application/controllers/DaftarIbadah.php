<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarIbadah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DaftarIbadah_model');
	}

	private function load_template($view, $data = null)
	{
		$this->load->view('template_frontend/header');
		$this->load->view($view,$data);
		$this->load->view('template_frontend/footer');	
	}

	public function daftar($id_jadwal, $id_sesi, $id_cabang, $id_subjadwal)
	{
		$get = $this->DaftarIbadah_model->get($id_jadwal, $id_sesi, $id_cabang);

		$data = [
			'title' => 'Form Pendaftaran untuk ' . $get->ss_namasesi . ' - ' . $get->cb_namacabang,
			'action' => site_url('DaftarIbadah/simpan'),
			'sesi' => set_value('sesi', $get->ss_namasesi),
			'id_sesi' => $get->ss_id,
			'cabang' => set_value('sesi', $get->cb_namacabang),
			'id_jemaat' => set_value('id_jemaat'),
			'nama_jemaat' => set_value('nama_jemaat'),
			'id_cabang' => $get->cb_id,
			'id_subjadwal' => $id_subjadwal,
			'id_jadwal' => $id_jadwal
		];

		$this->load_template('daftar_ibadah/form', $data);
	}

	public function simpan()
	{
		$this->form_validation->set_rules('jemaat[]','Jemaat','required|trim');

		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if($this->form_validation->run() == false) 
		{
			$this->session->set_flashdata('message', 'Isilah Form Dengan Benar');
			$this->session->set_flashdata('tipe', 'error');
			$this->daftar($this->input->post('id_jadwal'), $this->input->post('id_sesi'), $this->input->post('id_cabang'), $this->input->post('id_subjadwal'));
		}
		else 
		{

			$cek = 

			foreach($this->input->post('jemaat') as $t)
			{
				$data[$t] = [
					'ji_sub_jadwal' => $this->input->post('id_subjadwal'),
					'ji_jemaat'	=> $t,
					'ji_status' => 'y'
				];
			}
			
			if($this->DaftarIbadah_model->insert($data))
			{
				$this->session->set_flashdata('message', 'Pendaftaran Ibadah Berhasil !');
				$this->session->set_flashdata('tipe', 'success');
				redirect(base_url());
			}
			else 
			{
				$this->session->set_flashdata('message', 'Pendaftaran Ibadah Gagal !');
				$this->session->set_flashdata('tipe', 'error');
				redirect(base_url());
			}
		}
	}

}

/* End of file DaftarIbadah.php */
/* Location: ./application/controllers/DaftarIbadah.php */