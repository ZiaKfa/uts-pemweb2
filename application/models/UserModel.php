<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getByUsername($username){
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    public function insert($data){
        return $this->db->insert('user', $data);
    }

    public function update($data, $id){
        return $this->db->update('user', $data, ['id' => $id]);
    }

    public function delete($id){
        return $this->db->delete('user', ['id' => $id]);
    }

    public function getAll(){
        return $this->db->get('user')->result_array();
    }

    public function getById($id){
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }


}