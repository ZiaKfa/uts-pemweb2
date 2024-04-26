<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DokterModel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert($data){
        return $this->db->insert('dokter', $data);
    }

    public function update($data, $id){
        return $this->db->update('dokter', $data, ['id' => $id]);
    }

    public function delete($id){
        return $this->db->delete('dokter', ['id' => $id]);
    }

    public function getAll(){
        return $this->db->get('dokter')->result_array();
    }

    public function getById($id){
        return $this->db->get_where('dokter', ['id' => $id])->row_array();
    }

    public function getByNama($nama){
        return $this->db->get_where('dokter', ['nama' => $nama])->row_array();
    }

}