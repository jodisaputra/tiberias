<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarIbadah_model extends CI_Model {

	function get($id_jadwal, $id_sesi, $id_cabang)
	{
		$this->db->join('jadwal', 'jadwal.jd_id = sub_jadwal.sjd_jadwal');
		$this->db->join('cabang', 'cabang.cb_id = sub_jadwal.sjd_cabang');
		$this->db->join('sesi', 'sesi.ss_id = sub_jadwal.sjd_sesi');
		$this->db->where('sjd_jadwal', $id_jadwal);
		$this->db->where('sjd_sesi', $id_sesi);
		$this->db->where('sjd_cabang', $id_cabang);
		return $this->db->get('sub_jadwal')->row();
	}

	function insert($data)
	{
		foreach($data as $d)
		{
			$this->db->insert('jemaat_ibadah', $d);
		}

		return TRUE;
	}

	function cek($id_subjadwal, $id_jemaat)
	{
		$this->db->where('ji_sub_jadwal', $id_subjadwal);
		$this->db->where('ji_jemaat', $id_jemaat);
		return $this->db->get('jemaat_ibadah')->row();
	}

}

/* End of file DaftarIbadah_model.php */
/* Location: ./application/models/DaftarIbadah_model.php */