<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	function cek($username, $password)
    {
        $this->db->where('usr_username', $username);
        $this->db->where('usr_password', md5($password));
        return $this->db->get('user');
    }

}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */