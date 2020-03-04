<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class matkul_model extends CI_Model {

    public function getAllMatkul()
    {
        $query = $this->db->get('matakuliah');
        return $query->result_array();
    }
    
    public function tambahdatamtk(){
        $data=[
            "nama_matkul" => $this->input->post('matkul', true),
            "tahun_ajaran" => $this->input->post('tahun', true)
        ];
        //this->db->insert('Table', $object);
        $this->db->insert('matakuliah', $data);
    }

    public function hapusdatamtk($id){
        $this->db->where('id_matkul', $id);
        $this->db->delete('matakuliah');
    }

    public function getMatkulByID($id)
    {
        return $this->db->get_where('matakuliah',['id_matkul' => $id])->row_array();
    }

    public function editdatamtk()
    {
        $data=[
            "nama_matkul" => $this->input->post('matkul',true),
            "tahun_ajaran" => $this->input->post('tahun',true)
        ];
        $this->db->where('id_matkul', $this->input->post('id'));
        $this->db->update('matakuliah', $data);
    }

    public function cariDataMatkul()
    {
        $key=$this->input->post('key');
        $this->db->like('nama_matkul', $key);
        $this->db->or_like('tahun_ajaran', $key);
        return $this->db->get('matakuliah')->result_array();
        
    }
}

/* End of file matkul_model.php */
