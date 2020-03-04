<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class mengampu_model extends CI_Model {

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
    
    public function getMengampuByID($id)
    {
        return $this->db->get_where('mengampu',['id_mengampu' => $id])->row_array();
    }

    public function getMahasiswafromMengampu($id)
    {
        // mengambil detail mahasiswa dengan cara
        // mengambil id mahasiswa dari tabel mengampu

        // $query = $this->db->query(
        //     "SELECT * FROM mahasiswa 
        //     WHERE id IN (
        //         SELECT mahasiswa.id
        //         FROM mengampu
        //         INNER JOIN mahasiswa ON mahasiswa.id = mengampu.id_mhs
        //         WHERE mengampu.id_mengampu=$id
        //     )"
        // );
        // return $query->row_array();

        $this->db->select('mahasiswa.id');
        $this->db->from('mengampu');
        $this->db->join('mahasiswa', 'mahasiswa.id = mengampu.id_mhs', 'inner');
        $this->db->where('mengampu.id_mengampu', $id);
        $sub_query = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where("id IN ($sub_query)");
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getKelasfromMengampu($id)
    {
        // mengambil detail kelas dengan cara
        // mengambil id kelas dari tabel mengampu

        // $query = $this->db->query(
        //     "SELECT * FROM kelas 
        //     WHERE id_kelas IN (
        //         SELECT kelas.id_kelas
        //         FROM mengampu
        //         INNER JOIN kelas ON kelas.id_kelas = mengampu.id_kelas
        //         WHERE mengampu.id_mengampu=$id
        //     )"
        // );
        // return $query->row_array();

        $this->db->select('kelas.id_kelas');
        $this->db->from('mengampu');
        $this->db->join('kelas', 'kelas.id_kelas = mengampu.id_kelas', 'inner');
        $this->db->where('mengampu.id_mengampu', $id);
        $sub_query = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->where("id_kelas IN ($sub_query)");
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function getMatkulfromMengampu($id)
    {
        // mengambil detail matakuliah dengan cara
        // mengambil id matkul dari tabel mengampu

        // $query = $this->db->query(
        //     "SELECT * FROM matakuliah 
        //     WHERE id_matkul IN (
        //         SELECT matakuliah.id_matkul
        //         FROM mengampu
        //         INNER JOIN matakuliah ON matakuliah.id_matkul = mengampu.id_matkul
        //         WHERE mengampu.id_mengampu=$id
        //     )"
        // );
        // return $query->row_array();

        $this->db->select('matakuliah.id_matkul');
        $this->db->from('mengampu');
        $this->db->join('matakuliah', 'matakuliah.id_matkul = mengampu.id_matkul', 'inner');
        $this->db->where('mengampu.id_mengampu', $id);
        $sub_query = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from('matakuliah');
        $this->db->where("id_matkul IN ($sub_query)");
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cariDataAll()
    {
        // $key=$this->input->post('key');
        // $query = $this->db->query(
        //         SELECT mahasiswa.nim AS nim,
        //             mahasiswa.nama AS nama,
        //             matakuliah.nama_matkul AS nama_matkul,
        //             kelas.nama_kelas AS nama_kelas,
        //             id_mengampu
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
                            kelas.nama_kelas AS nama_kelas,
                            id_mengampu')
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
            "id_mhs" => $this->input->post('mahasiswa', true),
            "id_kelas" => $this->input->post('kelas', true),
            "id_matkul" => $this->input->post('matkul', true)
        ];
        //this->db->insert('Table', $object);
        $this->db->insert('mengampu', $data);
    }

    public function editdata(){
        $data=[
            "id_mhs" => $this->input->post('mahasiswa', true),
            "id_kelas" => $this->input->post('kelas', true),
            "id_matkul" => $this->input->post('matkul', true)
        ];
        $this->db->where('id_mengampu', $this->input->post('id'));
        $this->db->update('mengampu', $data);
    }

    public function hapusdata($id){
        $this->db->where('id_mengampu', $id);
        $this->db->delete('mengampu');
    }
}

/* End of file mengampu_model.php */
