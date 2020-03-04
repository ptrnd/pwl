<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('matkul_model');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }
    

    public function index()
    {
        $data['title'] = 'List Mata Kuliah';
        $data['matkul'] = $this->matkul_model->getAllMatkul();
        if ($this->input->post('key')) {
            $data['matkul'] = $this->matkul_model->cariDataMatkul();
        }
        $this->load->view('template/header', $data);
        $this->load->view('matkul/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {              
        $data['title'] = 'Form Tambah data Mata Kuliah';
        $this->form_validation->set_rules('matkul', 'Mata Kuliah', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('matkul/tambah', $data);
            $this->load->view('template/footer');
        } else {
            # code...
            $this->matkul_model->tambahdatamtk();

            // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flastdata)
            $this->session->set_flashdata('flash-data', 'ditambahkan');                
            // echo "data berhasil ditambah";
            redirect('matkul','refresh');
            
        }
    }

    public function edit($id)
    {              
        $data['title'] = 'Form Edit Data Mata Kuliah';
        $data['matkul'] = $this->matkul_model->getMatkulByID($id);
        $this->form_validation->set_rules('matkul', 'Mata Kuliah', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('matkul/edit', $data);
            $this->load->view('template/footer');
        } else {
            # code...
            $this->matkul_model->editdatamtk();

            // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flastdata)
            $this->session->set_flashdata('flash-data', 'diedit');                
            // echo "data berhasil ditambah";
            redirect('matkul','refresh');
            
        }
    }

    public function hapus($id)
    {
        $this->matkul_model->hapusdatamtk($id);
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('matkul','refresh');
    }
}

/* End of file Matkul.php */
