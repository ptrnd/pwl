<?php


defined('BASEPATH') or exit('No direct script access allowed');

class kelas_model extends CI_Model
{
    public function getAllKelas()
    {
        $query = $this->db->get('kelas');
        return $query->result_array();
    }


    public function tambahdatakls(){
        $data=[
            "nama_kelas" => $this->input->post('kelas', true),
            "ruang_kelas" => $this->input->post('ruang', true)
        ];
        //this->db->insert('Table', $object);
        $this->db->insert('kelas', $data);
    }

    public function hapusdatakls($id){
        $this->db->where('id_kelas', $id);
        $this->db->delete('kelas');
    }

    public function getKelasByID($id)
    {
        return $this->db->get_where('kelas',['id_kelas' => $id])->row_array();
    }

    public function editdatakls()
    {
        $data=[
            "nama_kelas" => $this->input->post('kelas', true),
            "ruang_kelas" => $this->input->post('ruang', true)
        ];
        $this->db->where('id_kelas', $this->input->post('id'));
        $this->db->update('kelas', $data);
    }

    public function cariDataKelas()
    {
        $key=$this->input->post('key');
        $this->db->like('nama_kelas', $key);
        $this->db->or_like('ruang_kelas', $key);
        return $this->db->get('kelas')->result_array();
        
    }
}

/* End of file kelas_model.php */
