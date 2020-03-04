<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class home_model extends CI_Model {
    
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('mengampu');
        $this->db->join('mahasiswa', 'mahasiswa.id = mengampu.id_mhs', 'inner');
        $this->db->join('matakuliah', 'matakuliah.id_matkul = mengampu.id_matkul', 'inner');
        $this->db->join('kelas', 'kelas.id_kelas = mengampu.id_kelas', 'inner');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getAllMahasiswa()
    {
        $query = $this->db->get('mahasiswa');
        return $query->result_array();
    }
    
    public function getAllMatkul()
    {
        $query = $this->db->get('matakuliah');
        return $query->result_array();
    }

    public function getAllKelas()
    {
        $query = $this->db->get('kelas');
        return $query->result_array();
    }
    
    public function cariDataAll()
    {
        // $key=$this->input->post('key');
        // $query = $this->db->query(
        //         SELECT mahasiswa.nim AS nim,
        //             mahasiswa.nama AS nama,
        //             matakuliah.nama_matkul AS nama_matkul,
        //             kelas.nama_kelas AS nama_kelas
        //         FROM mengampu 
        //         INNER JOIN mahasiswa ON mengampu.id_mhs = mahasiswa.id 
        //         INNER JOIN matakuliah ON mengampu.id_matkul = matakuliah.id_matkul 
        //         INNER JOIN kelas ON mengampu.id_kelas = kelas.id_kelas
        //         WHERE nim LIKE '".$key."'
        //         OR nama LIKE '".$key."'  
        //         OR nama_matkul LIKE '".$key."' 
        //         OR nama_kelas LIKE '".$key."'"
        // );
        // return $query->result_array();

        $key=$this->input->post('key');
        $this->db->select('mahasiswa.nim AS nim, 
                            mahasiswa.nama AS nama,
                            matakuliah.nama_matkul AS nama_matkul,
                            kelas.nama_kelas AS nama_kelas')
                 ->from('mengampu')
                 ->join('mahasiswa', 'mahasiswa.id = mengampu.id_mhs')
                 ->join('matakuliah', 'matakuliah.id_matkul = mengampu.id_matkul')
                 ->join('kelas', 'kelas.id_kelas = mengampu.id_kelas')
                 ->like('nama', $key)
                 ->or_like('nim', $key)
                 ->or_like('nama_matkul', $key)
                 ->or_like('nama_kelas', $key);
        return $this->db->get()->result_array();
    }

    public function tambahdata(){
        $data=[
            "nama" => $this->input->post('nama', true),
            "nim" => $this->input->post('nim', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true),
        ];
        //this->db->insert('Table', $object);
        $this->db->insert('mahasiswa', $data);
    }
}

/* End of file home_model.php */
