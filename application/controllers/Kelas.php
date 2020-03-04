<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kelas_model');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // modul untuk mengambil database
        // $this->load->database();
        $data['title'] = 'List Kelas';
        $data['kelas'] = $this->kelas_model->getAllKelas();
        if ($this->input->post('key')) {
            $data['kelas'] = $this->kelas_model->cariDataKelas();
        }
        $this->load->view('template/header', $data);
        $this->load->view('kelas/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Form Tambah data Kelas';
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('ruang', 'Ruang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('kelas/tambah', $data);
            $this->load->view('template/footer');
        } else {
            # code...
            $this->kelas_model->tambahdatakls();

            // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flastdata)
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            // echo "data berhasil ditambah";
            redirect('kelas', 'refresh');
        }
    }

    public function hapus($id)
    {
        $this->kelas_model->hapusdatakls($id);
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('kelas', 'refresh');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Kelas';
        $data['kelas'] = $this->kelas_model->getKelasByID($id);
        $this->load->view('template/header', $data);
        $this->load->view('kelas/detail', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {              
        $data['title'] = 'Form Edit Data Kelas';
        $data['kelas'] = $this->kelas_model->getKelasByID($id);
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('ruang', 'Ruang', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('kelas/edit', $data);
            $this->load->view('template/footer');
        } else {
            # code...
            $this->kelas_model->editdatakls();

            // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flastdata)
            $this->session->set_flashdata('flash-data', 'diedit');                
            // echo "data berhasil ditambah";
            redirect('kelas','refresh');
            
        }
    }
}

/* End of file Kelas.php */
