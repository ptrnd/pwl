<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['mengampu'] = $this->home_model->getAll();
        if ($this->input->post('key')) {
            $data['mengampu'] = $this->home_model->cariDataAll();
        }
        $this->load->view('template/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {              
        $data['title'] = 'Form Tambah data';
        // $data['jurusan'] = ['kimia', 'mesin', 'informatika', 'sipil'];
        // $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('nim', 'Nim', 'required|numeric');
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('home/tambah', $data);
            $this->load->view('template/footer');
        } else {
            # code...
            $this->mahasiswa_model->tambahdata();

            // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flastdata)
            $this->session->set_flashdata('flash-data', 'ditambahkan');                
            // echo "data berhasil ditambah";
            redirect('home','refresh');
        }
    }


}

/* End of file Home.php */
