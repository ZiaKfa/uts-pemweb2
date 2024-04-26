<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PasienModel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert($data){
        return $this->db->insert('pasien', $data);
    }

    public function update($data, $id){
        return $this->db->update('pasien', $data, ['id' => $id]);
    }

    public function delete($id){
        return $this->db->delete('pasien', ['id' => $id]);
    }

    public function getAll(){
        return $this->db->get('pasien')->result_array();
    }

    public function getById($id){
        return $this->db->get_where('pasien', ['id' => $id])->row_array();
    }

    public function getByNama($nama){
        return $this->db->get_where('pasien', ['nama' => $nama])->row_array();
    }

}