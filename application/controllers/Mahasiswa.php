<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Mahasiswa extends CI_Controller {
    
        //fungsi akan dijalankan saat diinstansiasi
        public function __construct()
        {
            parent::__construct();
            $this->load->model('mahasiswa_model');
            $this->load->helper('url', 'form');
            $this->load->library('form_validation');
            if($this->session->userdata('level')!="admin"){
                redirect('login','refresh');
            }
        }
        
        public function index()
        {   
            // modul untuk mengambil database
            // $this->load->database();
            $data['title'] = 'List Mahasiswa';
            $data['mahasiswa'] = $this->mahasiswa_model->getAllMahasiswa();
            if ($this->input->post('key')) {
                $data['mahasiswa'] = $this->mahasiswa_model->cariDataMahasiswa();
            }
            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/index', $data);
            $this->load->view('template/footer');
        }

        public function tambah()
        {              
            $data['title'] = 'Form Tambah data Mahasiswa';
            $data['jurusan'] = ['kimia', 'mesin', 'informatika', 'sipil'];
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('nim', 'Nim', 'required|numeric');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('mahasiswa/tambah', $data);
                $this->load->view('template/footer');
            } else {
                # code...
                $this->mahasiswa_model->tambahdatamhs();

                // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flastdata)
                $this->session->set_flashdata('flash-data', 'ditambahkan');                
                // echo "data berhasil ditambah";
                redirect('mahasiswa','refresh');
                
            }
        }

        public function hapus($id)
        {
            $this->mahasiswa_model->hapusdatamhs($id);
            $this->session->set_flashdata('flash-data', 'dihapus');
            redirect('mahasiswa','refresh');
        }

        public function detail($id)
        {
            $data['title'] = 'Detail Mahasiswa';
            $data['mahasiswa'] = $this->mahasiswa_model->getMahasiswaByID($id);
            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/detail', $data);
            $this->load->view('template/footer');
        }
        
        public function edit($id)
        {              
            $data['title'] = 'Form Edit Data Mahasiswa';
            $data['mahasiswa'] = $this->mahasiswa_model->getMahasiswaByID($id);
            $data['jurusan'] = ['kimia', 'mesin', 'informatika', 'sipil'];
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('nim', 'Nim', 'required|numeric');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('mahasiswa/edit', $data);
                $this->load->view('template/footer');
            } else {
                # code...
                $this->mahasiswa_model->editdatamhs();

                // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flastdata)
                $this->session->set_flashdata('flash-data', 'diedit');                
                // echo "data berhasil ditambah";
                redirect('mahasiswa','refresh');
            }
        }
    }
    
    
    /* End of file Controllername.php */
    
?>