<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mengampu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mengampu_model');
        // $this->load->model('mahasiswa_model');
        // $this->load->model('kelas_model');
        // $this->load->model('matkul_model');

        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Mengampu';
        $data['mengampu'] = $this->mengampu_model->getAll();
        if ($this->input->post('key')) {
            $data['mengampu'] = $this->mengampu_model->cariDataAll();
        }
        $this->load->view('template/header', $data);
        $this->load->view('mengampu/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Form Tambah data';
        $data['mahasiswa'] = $this->mengampu_model->getAllMahasiswa();
        $data['matakuliah'] = $this->mengampu_model->getAllMatkul();
        $data['kelas'] = $this->mengampu_model->getAllKelas();
        $data['invalid'] = ""; // <-- untuk konfirmasi error pada input data
        $valueMhs = $this->input->post('mahasiswa');
        $valueKls = $this->input->post('kelas');
        $valueMtk = $this->input->post('matkul');

        $this->load->view('template/header', $data);
        $this->load->view('mengampu/tambah', $data);
        $this->load->view('template/footer');

        if ($valueMhs == 0 || $valueKls == 0 || $valueMtk == 0) {
            $data['invalid'] = "Ada field yang belum dipilih. Pilih fieldnya terlebih dahulu.";
            $this->session->set_flashdata('flash', 'Ada field yang belum dipilih.');
        } else {
            # code...
            $this->mengampu_model->tambahdata();
            // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flastdata)
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            // echo "data berhasil ditambah";
            redirect('mengampu', 'refresh');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Form Tambah data';
        $data['mengampu'] = $this->mengampu_model->getMengampuByID($id);

        $data['mahasiswa1'] = $this->mengampu_model->getMahasiswafromMengampu($id);
        $data['kelas1'] = $this->mengampu_model->getKelasfromMengampu($id);
        $data['matakuliah1'] = $this->mengampu_model->getMatkulfromMengampu($id);

        $data['mahasiswa'] = $this->mengampu_model->getAllMahasiswa();
        $data['matakuliah'] = $this->mengampu_model->getAllMatkul();
        $data['kelas'] = $this->mengampu_model->getAllKelas();

        $valueMhs = $this->input->post('mahasiswa');
        $valueKls = $this->input->post('kelas');
        $valueMtk = $this->input->post('matkul');

        if ($valueMhs == 0 || $valueKls == 0 || $valueMtk == 0) {
            $this->load->view('template/header', $data);
            $this->load->view('mengampu/edit', $data);
            $this->load->view('template/footer');
        } else {
            # code...
            $this->mengampu_model->editdata();

            // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flastdata)
            $this->session->set_flashdata('flash-data', 'diedit');
            // echo "data berhasil ditambah";
            redirect('mengampu', 'refresh');
        }
    }

    public function hapus($id)
    {
        $this->mengampu_model->hapusdata($id);
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('mengampu', 'refresh');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Data';
        $data['mengampu'] = $this->mengampu_model->getMengampuByID($id);
        $data['mahasiswa'] = $this->mengampu_model->getMahasiswafromMengampu($id);
        $data['kelas'] = $this->mengampu_model->getKelasfromMengampu($id);
        $data['matakuliah'] = $this->mengampu_model->getMatkulfromMengampu($id);
        $this->load->view('template/header', $data);
        $this->load->view('mengampu/detail', $data);
        $this->load->view('template/footer');
    }
}

/* End of file Mengampu.php */
