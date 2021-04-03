<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalIbadah_model extends CI_Model {

	function list()
	{
		return $this->db->get('jadwal')->result();
	}

	function listbyid($id)
	{
		$this->db->where('jd_id', $id);
		return $this->db->get('jadwal')->row();
	}

	function insert($data)
	{
		return $this->db->insert('jadwal', $data);
	}

	function update($id, $data)
	{
		$this->db->where('jd_id', $id);
		return $this->db->update('jadwal', $data);
	}

	function delete($id)
	{
		$this->db->where('jd_id', $id);
		return $this->db->delete('jadwal');
	}	

}

/* End of file JadwalIbadah_model.php */
/* Location: ./application/models/JadwalIbadah_model.php */