<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailJadwalIbadah_model extends CI_Model {

	function cek($id_jadwal, $id_sesi, $id_cabang)
	{
		$this->db->where('sjd_jadwal', $id_jadwal);
		$this->db->where('sjd_sesi', $id_sesi);
		$this->db->where('sjd_cabang', $id_cabang);
		return $this->db->get('sub_jadwal');
	}

	function list($id_jadwal)
	{
		$this->db->join('jadwal', 'jadwal.jd_id = sub_jadwal.sjd_jadwal');
		$this->db->join('cabang', 'cabang.cb_id = sub_jadwal.sjd_cabang');
		$this->db->join('sesi', 'sesi.ss_id = sub_jadwal.sjd_sesi');
		$this->db->where('sjd_jadwal', $id_jadwal);
		return $this->db->get('sub_jadwal')->result();
	}

	function listbyid($id)
	{
		$this->db->where('sjd_id', $id);
		return $this->db->get('sub_jadwal')->row();
	}

	function insert($data)
	{
		return $this->db->insert('sub_jadwal', $data);
	}

	function update($id, $data)
	{
		$this->db->where('sjd_id', $id);
		return $this->db->update('sub_jadwal', $data);
	}

	function delete($id)
	{
		$this->db->where('sjd_id', $id);
		return $this->db->delete('sub_jadwal');
	}

	function delete_jemaatibadah($id_jemaatibadah)
	{
		$this->db->where('ji_id', $id_jemaatibadah);
		return $this->db->delete('jemaat_ibadah');
	}

	function list_jemaat($id_subjadwal)
	{
		$this->db->join('sub_jadwal', 'sub_jadwal.sjd_id = jemaat_ibadah.ji_sub_jadwal');
		$this->db->join('jadwal', 'jadwal.jd_id = sub_jadwal.sjd_jadwal');
		$this->db->join('sesi', 'sesi.ss_id = sub_jadwal.sjd_sesi');
		$this->db->join('cabang', 'cabang.cb_id = sub_jadwal.sjd_cabang');
		$this->db->join('jemaat', 'jemaat.jmt_id = jemaat_ibadah.ji_jemaat');
		$this->db->where('jemaat_ibadah.ji_sub_jadwal', $id_subjadwal);
		return $this->db->get('jemaat_ibadah')->result();
	}	

}

/* End of file DetailJadwalIbadah_model.php */
/* Location: ./application/models/DetailJadwalIbadah_model.php */