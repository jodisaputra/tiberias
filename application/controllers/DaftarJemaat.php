<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarJemaat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DaftarJemaat_model');
    }

    private function load_template($view, $data = null)
    {
        $this->load->view('template_frontend/header');
        $this->load->view($view,$data);
        $this->load->view('template_frontend/footer');  
    }

    public function listjemaat()
    {
        $q = trim($this->input->get('search'));
        $listjemaat = $this->DaftarJemaat_model->search_jemaat($q);
        $jemaat = array(); 

        if ($listjemaat)
        {
            $key=0;
            foreach ($listjemaat as $row) 
            {
                $jemaat[$key]["id"] = $row->jmt_id;
                $jemaat[$key]["text"] = $row->jmt_nama; 
                $key++;
            }
        }
        else
        {
            $jemaat[0]['id'] = '';
            $jemaat[0]['text'] = "Jemaat tidak ditemukan !";
        }

        echo json_encode($jemaat);
    }

    public function index()
    {
        $data = [
            'action' => site_url('DaftarJemaat/simpan'),
            'nama' => set_value('nama'),
            'no_telp' => set_value('no_telp'),
            'jenis_kelamin' => set_value('jenis_kelamin')
        ];
        $this->load_template('daftar_jemaat/form', $data);
    }

    public function simpan()
    {
        $this->form_validation->set_rules('nama','Nama Lengkap Jemaat','required|trim');
        $this->form_validation->set_rules('no_telp','No Telepon / No. Whatsapp','required|trim|numeric');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');

        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

        if($this->form_validation->run() == false) 
        {
            $this->session->set_flashdata('message', 'Isilah Form Dengan Benar');
            $this->session->set_flashdata('tipe', 'error');
            $this->index();
        }
        else 
        {
            $data = [
                'jmt_nama'    => $this->input->post('nama'),
                'jmt_notelepon'    => $this->input->post('no_telp'),
                'jmt_jeniskelamin' => $this->input->post('jenis_kelamin')
            ];
            
            if($this->DaftarJemaat_model->insert($data))
            {
                $this->session->set_flashdata('message', 'Data Jemaat berhasil disimpan !');
                $this->session->set_flashdata('tipe', 'success');
                redirect(base_url('DaftarJemaat'));
            }
            else 
            {
                $this->session->set_flashdata('message', 'Data Jemaat gagal disimpan !');
                $this->session->set_flashdata('tipe', 'error');
                redirect(base_url('DaftarJemaat'));
            }
        }
    }

}   

/* End of file DaftarJemaat.php */
/* Location: ./application/controllers/DaftarJemaat.php */