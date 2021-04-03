<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
	}

	public function index()
	{
		$this->load->view('auth/login');
	}

	public function proses()
	{
		// Melakukan validasi input username dan password
	    $this->form_validation->set_rules('username', 'username', 'required|trim');
	    $this->form_validation->set_rules('password', 'password', 'required|trim');
	    $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
	    // Jika validasi input username dan password bernilai false 
	    // maka user/admin diminta melakukan input ulang
	    if ($this->form_validation->run() == FALSE) 
	    {
	      $this->load->view('auth/login'); // Menampilkan halaman utama login
	    } 
	    // Jika validasi input username dan password bernilai false 
	    // maka user/admin diminta melakukan input ulang
	    else 
	    {
		    // Input username dan password dengan fungsi POST  
		    $username = $this->input->post('username');
		    $password = $this->input->post('password');

		    $cek = $this->Users_model->cek($username, $password);

		    if ($cek->num_rows() > 0) 
		    {
		      foreach ($cek->result() as $qad) 
		      {        
		        $sess_data['username'] = $qad->usr_username;
		        $sess_data['nama'] = $qad->usr_nama;
		        $this->session->set_userdata($sess_data);
		        $this->session->set_flashdata('message', 'Selamat Datang '.$qad->usr_nama);
		        $this->session->set_flashdata('tipe', 'success');
		        redirect(base_url('Dashboard'));
		      }
		    }
		    else
		    {
		    	$this->session->set_flashdata('message', 'Username atau Password salah');
		        $this->session->set_flashdata('tipe', 'error');
		        redirect(base_url('Login'));
		    }
		}
	}

	public function logout() 
	{
    	$this->session->sess_destroy();
    	redirect(base_url('Login'));
  	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */