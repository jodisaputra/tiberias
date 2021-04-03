<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalIbadah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('message', 'Login terlebih dahulu');
	        $this->session->set_flashdata('tipe', 'error');
	        redirect(base_url('Login'));  
		}
		$this->load->model('JadwalIbadah_model');
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
			'list' => $this->JadwalIbadah_model->list()
		];
		$this->load_template('admin/jadwal_ibadah/index', $data);
	}

	public function tambah()
	{
		$data = [
			'button' => 'Tambah',
			'action' => base_url('JadwalIbadah/simpan'),
			'nama_ibadah' => set_value('nama_ibadah'),
			'tanggal' => set_value('tanggal')
		];
		$this->load_template('admin/jadwal_ibadah/form', $data);
	}

	public function simpan()
	{
		$this->form_validation->set_rules('nama_ibadah','Nama Ibadah','required|trim');
		$this->form_validation->set_rules('tanggal','Tanggal Ibadah','required|trim');

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
				'jd_nama_ibadah'	=> $this->input->post('nama_ibadah'),
				'jd_tanggal'	=> $this->input->post('tanggal'),
			];
			
			if($this->JadwalIbadah_model->insert($data))
			{
				$this->session->set_flashdata('message', 'Jadwal Ibadah Berhasil Disimpan');
				$this->session->set_flashdata('tipe', 'success');
				redirect(base_url('JadwalIbadah'));
			}
			else 
			{
				$this->session->set_flashdata('message', 'Jadwal Ibadah Gagal Disimpan');
				$this->session->set_flashdata('tipe', 'error');
				redirect(base_url('JadwalIbadah'));
			}
		}
	}

	public function ubah($id)
	{
		$row = $this->JadwalIbadah_model->listbyid($id);
		$data = [
			'button' => 'Ubah',
			'action' => base_url('JadwalIbadah/simpan_perubahan'),
			'nama_ibadah' => set_value('nama_cabang', $row->jd_nama_ibadah),
			'tanggal' => set_value('tanggal', $row->jd_tanggal),
			'id_jadwal' => $row->jd_id
		];
		$this->load_template('admin/jadwal_ibadah/form', $data);
	}

	public function simpan_perubahan()
	{
		$this->form_validation->set_rules('nama_ibadah','Nama Ibadah','required|trim');
		$this->form_validation->set_rules('tanggal','Tanggal Ibadah','required|trim');

		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if($this->form_validation->run() == false) 
		{
			$this->session->set_flashdata('message', 'Isilah Form Dengan Benar');
			$this->session->set_flashdata('tipe', 'error');
			$this->ubah($this->input->post('id_jadwal'));
		}
		else 
		{
			$data = [
				'jd_nama_ibadah'	=> $this->input->post('nama_ibadah'),
				'jd_tanggal'	=> $this->input->post('tanggal'),
			];
			
			if($this->JadwalIbadah_model->update($this->input->post('id_jadwal'), $data))
			{
				$this->session->set_flashdata('message', 'Jadwal Ibadah Berhasil Disimpan');
				$this->session->set_flashdata('tipe', 'success');
				redirect(base_url('JadwalIbadah'));
			}
			else 
			{
				$this->session->set_flashdata('message', 'Jadwal Ibadah Gagal Disimpan');
				$this->session->set_flashdata('tipe', 'error');
				redirect(base_url('JadwalIbadah'));
			}
		}
	}

	public function hapus($id)
	{
		if($this->JadwalIbadah_model->delete($id))
		{
			$this->session->set_flashdata('message', 'Jadwal Ibadah Berhasil Dihapus');
			$this->session->set_flashdata('tipe', 'success');
			redirect(base_url('JadwalIbadah'));
		}
		else 
		{
			$this->session->set_flashdata('message', 'Jadwal Ibadah Gagal Dihapus');
			$this->session->set_flashdata('tipe', 'error');
			redirect(base_url('JadwalIbadah'));
		}
	}


}

/* End of file JadwalIbadah.php */
/* Location: ./application/controllers/JadwalIbadah.php */