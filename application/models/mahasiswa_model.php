<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class mahasiswa_model extends CI_Model {
    
        public function getAllMahasiswa()
        {
            //https://www.codeigniter.com/user_guide/database/query_builder.html#selecting-data
            $query = $this->db->get('mahasiswa');
            
            //https://www.codeigniter.com/user_guide/database/results.html
            return $query->result_array();
            
            // atau bisa seperti yang dibawah

            // return $this->db->get('mahasiswa')->result_array();
            
        }

        public function getAllMatkul()
        {
            $query = $this->db->get('matakuliah');
            return $query->result_array();
        }
        
        public function getAll()
        {
            $this->db->select('*');
            $this->db->from('mengampu');
            $this->db->join('mahasiswa', 'mahasiswa.id = mengampu.id_mhs');
            $this->db->join('matakuliah', 'matakuliah.id_matkul = mengampu.id_matkul');
            $this->db->join('kelas', 'kelas.id_kelas = mengampu.id_kelas');
            $query = $this->db->get();
            return $query->result_array();
        }

        public function tambahdatamhs(){
            $data=[
                "nama" => $this->input->post('nama', true),
                "nim" => $this->input->post('nim', true),
                "email" => $this->input->post('email', true),
                "jurusan" => $this->input->post('jurusan', true),
            ];
            //this->db->insert('Table', $object);
            $this->db->insert('mahasiswa', $data);
        }

        public function hapusdatamhs($id){
            $this->db->where('id', $id);
            $this->db->delete('mahasiswa');
        }

        public function getMahasiswaByID($id)
        {
            return $this->db->get_where('mahasiswa',['id' => $id])->row_array();
        }

        public function editdatamhs()
        {
            $data=[
                "nama" => $this->input->post('nama',true),
                "nim" => $this->input->post('nim',true),
                "email" => $this->input->post('email',true),
                "jurusan" => $this->input->post('jurusan',true)
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('mahasiswa', $data);
        }

        public function cariDataMahasiswa()
        {
            $key=$this->input->post('key');
            $this->db->like('nama', $key);
            $this->db->or_like('nim', $key);
            $this->db->or_like('jurusan', $key);
            return $this->db->get('mahasiswa')->result_array();
        }
    }
    
    /* End of file mahasiswa_model.php */
    
?>