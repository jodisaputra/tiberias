<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang_model extends CI_Model {

	function list()
	{
		return $this->db->get('cabang')->result();
	}

	function listbyid($id)
	{
		$this->db->where('cb_id', $id);
		return $this->db->get('cabang')->row();
	}

	function insert($data)
	{
		return $this->db->insert('cabang', $data);
	}

	function update($id, $data)
	{
		$this->db->where('cb_id', $id);
		return $this->db->update('cabang', $data);
	}

	function delete($id)
	{
		$this->db->where('cb_id', $id);
		return $this->db->delete('cabang');
	}	

}

/* End of file Cabang_model.php */
/* Location: ./application/models/Cabang_model.php */