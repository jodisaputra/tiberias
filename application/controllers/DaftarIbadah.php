<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarIbadah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DaftarIbadah_model');
		$this->load->model('DetailJadwalIbadah_model');
	}

	private function load_template($view, $data = null)
	{
		$this->load->view('template_frontend/header');
		$this->load->view($view,$data);
		$this->load->view('template_frontend/footer');	
	}

	public function daftar($id_jadwal, $id_subjadwal, $id_cabang, $id_sesi)
	{
		$get = $this->DaftarIbadah_model->get($id_jadwal, $id_cabang, $id_sesi);

		$data = [
			'title' => 'Form Pendaftaran untuk ' . $get['ss_namasesi'] . ' - ' . $get['cb_namacabang'],
			'action' => site_url('DaftarIbadah/simpan'),
			'id_jadwal' => $id_jadwal,
			'id_subjadwal' => $id_subjadwal,
			'id_cabang' => $id_cabang,
			'id_sesi' => $id_sesi,
			'sesi' => set_value('sesi', $get['ss_namasesi']),
			'cabang' => set_value('cabang', $get['cb_namacabang']),
			'get' => $get
		];

		// header('content-type: application/json');
		// echo json_encode($data);
		// die;

		$this->load_template('daftar_ibadah/form', $data);
	}

	public function simpan()
	{
		$jadwal_id = $this->input->post('id_jadwal');
		$subjadwal_id = $this->input->post('id_subjadwal');
		$cabang_id = $this->input->post('id_cabang');
		$sesi_id = $this->input->post('id_sesi');

		$get_detail_jadwal = $this->DetailJadwalIbadah_model->listbyid($subjadwal_id);

		$kapasitas_ibadah = $get_detail_jadwal->sjd_kapasitas;

		foreach($this->input->post('jemaat') as $t)
		{
			$cek_daftar = $this->DaftarIbadah_model->cek($this->input->post('id_jadwal'), $t)->row();
			
			$data[$t] = [
				'ji_sub_jadwal' => $this->input->post('id_subjadwal'),
				'ji_jemaat'	=> $t,
				'ji_status' => 'y'
			];

			if($cek_daftar)
			{
				$this->session->set_flashdata('message', 'Maaf, Anda Sudah pernah Mendaftar !');
				$this->session->set_flashdata('tipe', 'error');
				$this->daftar($jadwal_id, $sesi_id, $cabang_id, $subjadwal_id);
			}
			else
			{
				// cek jika jumlah jemaat yang didaftarkan lebih dari jumlah kapasitas ibadah
				$count_pendaftar = count($this->input->post('jemaat'));

				if($kapasitas_ibadah < $count_pendaftar)
				{
					$this->session->set_flashdata('message', 'Maaf, Jumlah Pendaftar melebihi dari Jumlah Kursi Maksimal untuk Ibadah. Sisa Kursi yang tersedia yaitu ' . $kapasitas_ibadah);
					$this->session->set_flashdata('tipe', 'error');
					$this->daftar($jadwal_id, $sesi_id, $cabang_id, $subjadwal_id);
				}
				else
				{
					if($this->DaftarIbadah_model->insert($data))
					{
						$kurang_total = $kapasitas_ibadah - 1;

						$data_update = [
							'sjd_kapasitas' => $kurang_total
						];

						$this->DetailJadwalIbadah_model->update($subjadwal_id, $data_update);

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
	}

}

/* End of file DaftarIbadah.php */
/* Location: ./application/controllers/DaftarIbadah.php */