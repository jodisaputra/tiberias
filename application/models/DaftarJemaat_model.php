<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarJemaat_model extends CI_Model {

	function list()
	{
		return $this->db->get('jemaat')->result();
	}

	function insert($data)
	{
		return $this->db->insert('jemaat', $data);
	}

	function search_jemaat($q)
	{
		$this->db->like('jmt_nama', $q);
		return $this->db->get('jemaat')->result();
	}

}

/* End of file DaftarJemaat_model.php */
/* Location: ./application/models/DaftarJemaat_model.php */