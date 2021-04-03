<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('message', 'Login terlebih dahulu');
	        $this->session->set_flashdata('tipe', 'error');
	        redirect(base_url('Login'));  
		}
		$this->load->model('Sesi_model');
	}

	private function load_template($view, $data = null)
	{
		$this->load->view('template_backend/header');
		$this->load->view($view,$data);
		$this->load->view('template_backend/footer');	
	}

	public function index()
	{
		$data = [
			'list' => $this->Sesi_model->list()
		];
		$this->load_template('admin/sesi/index', $data);
	}

	public function tambah()
	{
		$data = [
			'button' => 'Tambah',
			'action' => base_url('Sesi/simpan'),
			'nama_sesi' => set_value('nama_sesi')
		];
		$this->load_template('admin/sesi/form', $data);
	}

	public function simpan()
	{
		$this->form_validation->set_rules('nama_sesi','Nama Sesi','required|trim');

		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if($this->form_validation->run() == false) 
		{
			$this->session->set_flashdata('message', 'Isilah Form Dengan Benar');
			$this->session->set_flashdata('tipe', 'error');
			$this->tambah();
		}
		else 
		{
			$data = [
				'ss_namasesi'	=> $this->input->post('nama_sesi'),
			];
			
			if($this->Sesi_model->insert($data))
			{
				$this->session->set_flashdata('message', 'Sesi Berhasil Disimpan');
				$this->session->set_flashdata('tipe', 'success');
				redirect(base_url('Sesi'));
			}
			else 
			{
				$this->session->set_flashdata('message', 'Sesi Gagal Disimpan');
				$this->session->set_flashdata('tipe', 'error');
				redirect(base_url('Sesi'));
			}
		}
	}

	public function ubah($id)
	{
		$row = $this->Sesi_model->listbyid($id);
		$data = [
			'button' => 'Ubah',
			'action' => base_url('Sesi/simpan_perubahan'),
			'nama_sesi' => set_value('nama_sesi', $row->ss_namasesi),
			'id_sesi' => $row->ss_id
		];
		$this->load_template('admin/sesi/form', $data);
	}

	public function simpan_perubahan()
	{
		$this->form_validation->set_rules('nama_sesi','Nama Sesi','required|trim');

		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if($this->form_validation->run() == false) 
		{
			$this->session->set_flashdata('message', 'Isilah Form Dengan Benar');
			$this->session->set_flashdata('tipe', 'error');
			$this->ubah($this->input->post('id_sesi'));
		}
		else 
		{
			$data = [
				'ss_namasesi'	=> $this->input->post('nama_sesi'),
			];
			
			if($this->Sesi_model->update($this->input->post('id_sesi'), $data))
			{
				$this->session->set_flashdata('message', 'Sesi Berhasil Disimpan');
				$this->session->set_flashdata('tipe', 'success');
				redirect(base_url('Sesi'));
			}
			else 
			{
				$this->session->set_flashdata('message', 'Sesi Gagal Disimpan');
				$this->session->set_flashdata('tipe', 'error');
				redirect(base_url('Sesi'));
			}
		}
	}

	public function hapus($id)
	{
		if($this->Sesi_model->delete($id))
		{
			$this->session->set_flashdata('message', 'Sesi Berhasil Dihapus');
			$this->session->set_flashdata('tipe', 'success');
			redirect(base_url('Sesi'));
		}
		else 
		{
			$this->session->set_flashdata('message', 'Sesi Gagal Dihapus');
			$this->session->set_flashdata('tipe', 'error');
			redirect(base_url('Sesi'));
		}
	}

}

/* End of file Sesi.php */
/* Location: ./application/controllers/Sesi.php */