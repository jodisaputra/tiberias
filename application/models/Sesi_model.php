<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesi_model extends CI_Model {

	function list()
	{
		return $this->db->get('sesi')->result();
	}

	function listbyid($id)
	{
		$this->db->where('ss_id', $id);
		return $this->db->get('sesi')->row();
	}

	function insert($data)
	{
		return $this->db->insert('sesi', $data);
	}

	function update($id, $data)
	{
		$this->db->where('ss_id', $id);
		return $this->db->update('sesi', $data);
	}

	function delete($id)
	{
		$this->db->where('ss_id', $id);
		return $this->db->delete('sesi');
	}

}

/* End of file Sesi_model.php */
/* Location: ./application/models/Sesi_model.php */