<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('message', 'Login terlebih dahulu');
	        $this->session->set_flashdata('tipe', 'error');
	        redirect(base_url('Login'));  
		}
		$this->load->model('Cabang_model');
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
			'list' => $this->Cabang_model->list()
		];
		$this->load_template('admin/cabang/index', $data);
	}

	public function tambah()
	{
		$data = [
			'button' => 'Tambah',
			'action' => base_url('Cabang/simpan'),
			'nama_cabang' => set_value('nama_cabang')
		];
		$this->load_template('admin/cabang/form', $data);
	}

	public function simpan()
	{
		$this->form_validation->set_rules('nama_cabang','Nama Cabang','required|trim');

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
				'cb_namacabang'	=> $this->input->post('nama_cabang'),
			];
			
			if($this->Cabang_model->insert($data))
			{
				$this->session->set_flashdata('message', 'Cabang Berhasil Disimpan');
				$this->session->set_flashdata('tipe', 'success');
				redirect(base_url('Cabang'));
			}
			else 
			{
				$this->session->set_flashdata('message', 'Cabang Gagal Disimpan');
				$this->session->set_flashdata('tipe', 'error');
				redirect(base_url('Cabang'));
			}
		}
	}

	public function ubah($id)
	{
		$row = $this->Cabang_model->listbyid($id);
		$data = [
			'button' => 'Ubah',
			'action' => base_url('Cabang/simpan_perubahan'),
			'nama_cabang' => set_value('nama_cabang', $row->cb_namacabang),
			'id_cabang' => $row->cb_id
		];
		$this->load_template('admin/cabang/form', $data);
	}

	public function simpan_perubahan()
	{
		$this->form_validation->set_rules('nama_cabang','Nama Cabang','required|trim');

		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if($this->form_validation->run() == false) 
		{
			$this->session->set_flashdata('message', 'Isilah Form Dengan Benar');
			$this->session->set_flashdata('tipe', 'error');
			$this->ubah($this->input->post('id_cabang'));
		}
		else 
		{
			$data = [
				'cb_namacabang'	=> $this->input->post('nama_cabang'),
			];
			
			if($this->Cabang_model->update($this->input->post('id_cabang'), $data))
			{
				$this->session->set_flashdata('message', 'Cabang Berhasil Disimpan');
				$this->session->set_flashdata('tipe', 'success');
				redirect(base_url('Cabang'));
			}
			else 
			{
				$this->session->set_flashdata('message', 'Cabang Gagal Disimpan');
				$this->session->set_flashdata('tipe', 'error');
				redirect(base_url('Cabang'));
			}
		}
	}

	public function hapus($id)
	{
		if($this->Cabang_model->delete($id))
		{
			$this->session->set_flashdata('message', 'Cabang Berhasil Dihapus');
			$this->session->set_flashdata('tipe', 'success');
			redirect(base_url('Cabang'));
		}
		else 
		{
			$this->session->set_flashdata('message', 'Cabang Gagal Dihapus');
			$this->session->set_flashdata('tipe', 'error');
			redirect(base_url('Cabang'));
		}
	}

}

/* End of file Cabang.php */
/* Location: ./application/controllers/Cabang.php */