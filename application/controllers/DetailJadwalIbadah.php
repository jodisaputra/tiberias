<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailJadwalIbadah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('message', 'Login terlebih dahulu');
	        $this->session->set_flashdata('tipe', 'error');
	        redirect(base_url('Login'));  
		}
		$this->load->model('DetailJadwalIbadah_model');
		$this->load->model('Sesi_model');
		$this->load->model('Cabang_model');
	}

	private function load_template($view, $data = null)
	{
		$this->load->view('template_backend/header');
		$this->load->view($view,$data);
		$this->load->view('template_backend/footer');	
	}

	public function detail($id_jadwal)
	{
		$data = [
			'list' => $this->DetailJadwalIbadah_model->list($id_jadwal)
		];
		$this->load_template('admin/sub_jadwal_ibadah/index', $data);
	}

	public function tambah($id)
	{
		$cabang = $this->Cabang_model->list();
		$sesi = $this->Sesi_model->list();
		$data = [
			'button' => 'Tambah',
			'action' => base_url('DetailJadwalIbadah/simpan'),
			'cabang' => set_value('cabang'),
			'sesi' => set_value('sesi'),
			'id_jadwal' => $id,
			'listcabang' => $cabang,
			'listsesi' => $sesi
		];
		$this->load_template('admin/sub_jadwal_ibadah/form', $data);
	}

	public function simpan()
	{
		$this->form_validation->set_rules('cabang','Cabang Ibadah','required');
		$this->form_validation->set_rules('sesi','Sesi Ibadah','required');

		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if($this->form_validation->run() == false) 
		{
			$this->session->set_flashdata('message', 'Isilah Form Dengan Benar');
			$this->session->set_flashdata('tipe', 'error');
			$this->tambah($this->input->post('id_jadwal'));
		}
		else 
		{
			// cek jika cabang dan sesi sudah ada
			$cek = $this->DetailJadwalIbadah_model->cek($this->input->post('id_jadwal'), $this->input->post('sesi'), $this->input->post('cabang'));

			if($cek->num_rows() > 0)
			{
				$this->session->set_flashdata('message', 'Maaf, Sesi untuk Cabang Ibadah ini sudah ada!');
				$this->session->set_flashdata('tipe', 'error');
				$this->tambah($this->input->post('id_jadwal'));
			}
			else
			{
				$data = [
					'sjd_jadwal'	=> $this->input->post('id_jadwal'),
					'sjd_sesi'	=> $this->input->post('sesi'),
					'sjd_cabang'	=> $this->input->post('cabang')
				];
				
				if($this->DetailJadwalIbadah_model->insert($data))
				{
					$this->session->set_flashdata('message', 'Jadwal Ibadah Berhasil Disimpan');
					$this->session->set_flashdata('tipe', 'success');
					redirect(base_url('DetailJadwalIbadah/detail/' . $this->input->post('id_jadwal')));
				}
				else 
				{
					$this->session->set_flashdata('message', 'Jadwal Ibadah Gagal Disimpan');
					$this->session->set_flashdata('tipe', 'error');
					redirect(base_url('DetailJadwalIbadah/detail/' . $this->input->post('id_jadwal')));
				}
			}
		}
	}

	public function ubah($id)
	{
		$row = $this->DetailJadwalIbadah_model->listbyid($id);
		$cabang = $this->Cabang_model->list();
		$sesi = $this->Sesi_model->list();

		$data = [
			'button' => 'Ubah',
			'action' => base_url('DetailJadwalIbadah/simpan_perubahan'),
			'cabang' => set_value('cabang', $row->sjd_cabang),
			'sesi' => set_value('sesi', $row->sjd_sesi),
			'id_jadwal' => $row->sjd_jadwal,
			'id_subjadwal' => $row->sjd_id,
			'listcabang' => $cabang,
			'listsesi' => $sesi
		];
		$this->load_template('admin/sub_jadwal_ibadah/form', $data);
	}

	public function simpan_perubahan()
	{
		$this->form_validation->set_rules('cabang','Cabang Ibadah','required');
		$this->form_validation->set_rules('sesi','Sesi Ibadah','required');

		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if($this->form_validation->run() == false) 
		{
			$this->session->set_flashdata('message', 'Isilah Form Dengan Benar');
			$this->session->set_flashdata('tipe', 'error');
			$this->tambah($this->input->post('id_subjadwal'));
		}
		else 
		{
			$data = [
				'sjd_jadwal'	=> $this->input->post('id_jadwal'),
				'sjd_sesi'	=> $this->input->post('sesi'),
				'sjd_cabang'	=> $this->input->post('cabang')
			];
			
			if($this->DetailJadwalIbadah_model->update($this->input->post('id_subjadwal'), $data))
			{
				$this->session->set_flashdata('message', 'Jadwal Ibadah Berhasil Diubah');
				$this->session->set_flashdata('tipe', 'success');
				redirect(base_url('DetailJadwalIbadah/detail/' . $this->input->post('id_jadwal')));
			}
			else 
			{
				$this->session->set_flashdata('message', 'Jadwal Ibadah Gagal Diubah');
				$this->session->set_flashdata('tipe', 'error');
				redirect(base_url('DetailJadwalIbadah/detail/' . $this->input->post('id_jadwal')));
			}
		}
	}

	public function hapus($id, $id_jadwal)
	{
		if($this->DetailJadwalIbadah_model->delete($id))
		{
			$this->session->set_flashdata('message', 'Jadwal Ibadah Berhasil Dihapus');
			$this->session->set_flashdata('tipe', 'success');
			redirect(base_url('DetailJadwalIbadah/detail/' . $id_jadwal));
		}
		else 
		{
			$this->session->set_flashdata('message', 'Jadwal Ibadah Gagal Dihapus');
			$this->session->set_flashdata('tipe', 'error');
			redirect(base_url('DetailJadwalIbadah/detail/' . $id_jadwal));
		}
	}

}

/* End of file DetailJadwalIbadah.php */
/* Location: ./application/controllers/DetailJadwalIbadah.php */